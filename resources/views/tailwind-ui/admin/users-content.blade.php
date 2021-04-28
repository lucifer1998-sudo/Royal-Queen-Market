<div class="relative bg-rqm-dark flex flex-wrap justify-center rounded shadow w-full h-full">
    <div class="absolute inset-0 bg-repeat h-full opacity-10 w-full" style="background-image: url({{URL::asset('/media/bg.cleaned.png')}})">
        <span></span>
    </div>
    <div class="z-20 p-10 w-full">
        <div class="pb-10 w-full">
            <form action="{{route('admin.users.query')}}"  method="POST" class="flex w-full">
                {{ csrf_field() }}
                <div class="grid grid-flow-col grid-cols-4 grid-rows-1 gap-4 w-full">
                    <div>
                        <input type="text" name="username" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" placeholder="Username of the user">
                    </div>
                    <div>
                        <select name="order_by" id="" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" title="Order by">
                            <option value="newest"
                                    @if(app('request')->input('order_by') =='newest') selected @endif>Newest
                            </option>
                            <option value="oldest"
                                    @if(app('request')->input('order_by') =='oldest') selected @endif>Oldest
                            </option>
                        </select>
                    </div>
                    <div>
                        <select name="display_group" id="" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" title="Display group">
                            <option value="everyone"
                                    @if(request('display_group') =='everyone') selected @endif>
                                Everyone
                            </option>
                            <option value="administrators"
                                    @if(request('display_group') =='administrators') selected @endif>
                                Administrators
                            </option>
                            <option value="vendors"
                                    @if(request('display_group') =='vendors') selected @endif>Vendors
                            </option>
                            <option value="moderators"
                                    @if(request('display_group') =='moderators') selected @endif>Moderators
                            </option>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="bg-rqm-yellow-dark font-extrabold p-2 rounded-sm text-rqm-dark text-base w-full">
                            Apply Filter
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <table class="table-auto w-full">
            <thead class="border-b border-rqm-yellow-dark">
            <tr>
                <th class="px-2 text-center text-left text-rqm-yellow">Username</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Group</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Last Login</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Registration Date</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $index => $user)
                <tr class="@if(!($index % 2)) bg-rqm-light @endif">
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        {{$user->username}}
                    </td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        {{$user->getUserGroup()['name']}}
                    </td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        {{$user->lastSeenForHumans()}}
                    </td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        {{$user->created_at}}
                    </td>
                    <td class="border-gray-600 px-2 py-2 text-gray-400 text-center">
                        <a href="{{route('admin.users.view',['user'=>$user->id])}}" class="">
                            <button type="button" class="bg-rqm-yellow-dark font-extrabold px-2 py-1 rounded-sm text-rqm-dark text-sm">
                                View
                            </button>
                        </a>
                        @if($user->getUserGroup()['name'] == 'User')
                            <a href="{{route('admin.invite.create')}}?username={{$user->username}}" class="">
                                <button type="button" class="bg-rqm-yellow-dark font-extrabold px-2 py-1 rounded-sm text-rqm-dark text-sm">
                                    Invite
                                </button>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users -> links('tailwind-ui.includes.paginate') }}
    </div>
</div>
