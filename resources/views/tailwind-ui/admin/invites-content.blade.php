<div class="relative bg-rqm-dark flex flex-wrap justify-center rounded shadow w-full h-full">
    <div class="absolute inset-0 bg-repeat h-full opacity-10 w-full" style="background-image: url({{URL::asset('/media/bg.cleaned.png')}})">
        <span></span>
    </div>
    <div class="z-20 p-10 w-full">
        @if(Session::has('code'))
            @include('tailwind-ui.includes.success', ['message' => Session::get('code'), 'strongMessage' => 'Generated Code is'])
        @endif

        @if(Session::has('outside_code'))
            @include('tailwind-ui.includes.success', ['message' => Session::get('outside_code'), 'strongMessage' => 'Generated Code link is'])
        @endif

        @if(Session::has('outside_vendor'))
            @include('tailwind-ui.includes.warning', ['message' => 'is a vendor outside the platform. Please add PGP key to continue..', 'strongMessage' => Session::get('outside_vendor')])
        @endif

        @if(!Session::has('outside_vendor') && !Session::has('code'))
        <form action="{{ route('admin.invite.store') }}" method="POST" class="mb-7">
            {{ csrf_field() }}
            <div class="grid grid-flow-col grid-cols-2 grid-rows-1 gap-4 w-full">
                <div>
                    <input value="{{$username}}" type="text" name="vendor_username" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" placeholder="Vendor Username">
                </div>
                <div>
                    <button type="submit" class="bg-rqm-yellow-dark font-extrabold p-2 rounded-sm text-rqm-dark text-base w-full">
                        Generate Code
                    </button>
                </div>
            </div>
        </form>
        @endif

        @if(Session::has('code'))
        <form action="{{ route('admin.messages.usersend') }}" method="POST" class="w-full mb-7">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{Session::get('user')->id}}" />
            <textarea name="message" id="message" rows="10" class="bg-rqm-dark border border-rqm-yellow-darkest p-3 text-rqm-yellow w-full" placeholder="Message for {{Session::get('user')->username}}..."></textarea>
            <button type="submit" class="bg-rqm-yellow-dark font-extrabold p-2 rounded-sm text-rqm-dark text-base w-full">
                Send message
            </button>
        </form>
        @endif

        @if(Session::has('outside_vendor'))
            <form action="{{ route('admin.invite.outside.store') }}" method="POST" class="w-full mb-7">
                {{ csrf_field() }}
                <input type="hidden" name="vendor_username" value="{{Session::get('outside_vendor')}}" />
                <textarea name="newpgp" id="newpgp" rows="10" class="bg-rqm-dark border border-rqm-yellow-darkest p-3 text-rqm-yellow w-full" placeholder="Paste PGP key for {{Session::get('outside_vendor')}} here..."></textarea>
                <button type="submit" class="bg-rqm-yellow-dark font-extrabold p-2 rounded-sm text-rqm-dark text-base w-full">
                    Generate Invite Now
                </button>
            </form>
        @endif

        <table class="table-auto w-full">
            <thead class="border-b border-rqm-yellow-dark">
            <tr>
                <th class="px-2 text-center text-left text-rqm-yellow">Code</th>
                <th class="px-2 text-center text-left text-rqm-yellow">User</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Status</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Date Created</th>
            </tr>
            </thead>
            <tbody>
            @foreach($invites as $index => $invite)
                <tr class="@if(!($index % 2)) bg-rqm-light @endif">
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        <div class="flex">
                            {{$invite->code}}
                        </div>
                    </td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        <div class="flex">
                            {{$invite->user ? $invite->user->username : 'n/a'}}
                        </div>
                    </td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        <div class="flex">
                            {{$invite->is_claimed ? 'Claimed' : 'Not yet claimed'}}
                        </div>
                    </td>
                    <td class="border-gray-600 px-2 py-2 text-gray-400">
                        {{$invite->created_at}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $invites -> links('tailwind-ui.includes.paginate') }}
    </div>
</div>
