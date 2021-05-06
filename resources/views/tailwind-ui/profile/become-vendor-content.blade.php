<div class="bg-rqm-lighter flex flex-wrap justify-center p-10 rounded shadow w-full h-full">
    <table class="table-auto pl-10 w-5/6">
        <thead>
            <tr>
                <th>Coin</th>
                <th>Address</th>
                <th>Vendor Fee</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            @foreach($depositAddresses as $depositAddress)
            <tr class="justify-center">
                <td>
                    <span class="">{{ strtoupper($depositAddress -> coin) }}</span>
                </td>
                <td>
                    <input type="text" readonly class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow" value="{{ $depositAddress -> address }}"/>
                </td>
                <td class="text-right">
                    <span class="">{{ $depositAddress -> target }}</span>
                </td>
                <td class="text-right">
                    @if($depositAddress -> isEnough())
                        <span class="">Enough funds</span>
                    @endif
                    <span class="">{{ $depositAddress -> balance }}</span>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    <div class="flex items-center justify-center w-full">

        <form action="{{ route('profile.vendor.become') }}" class="">
            @csrf
            @if(session()->has('success'))
                @include('tailwind-ui.includes.success', ['strongMessage' => 'Success', 'message' => session()->get('success')])
            @elseif(session()->has('error'))
                @include('tailwind-ui.includes.warning', ['strongMessage' => 'Warning', 'message' => session()->get('error')])
            @elseif(session()->has('errormessage'))
                @include('tailwind-ui.includes.warning', ['strongMessage' => 'Warning', 'message' => session()->get('errormessage')])
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    @include('tailwind-ui.includes.warning', ['strongMessage' => 'Warning', 'message' => $error])
                @endforeach
            @endif
            <div class="flex justify-center">
                <button type="submit" class="bg-rqm-yellow-dark font-extrabold px-3 py-3 rounded-sm text-rqm-dark">
                    Become a vendor
                </button>
            </div>
        </form>
    </div>
    <div class="flex justify-center py-5 text-lg text-rqm-yellow w-full">OR</div>
    <div class="text-rqm-yellow text-sm">
        <form action="{{ route('profile.become.fromcode') }}" method="POST">
            {{ csrf_field() }}
            <input name="code" type="text" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow" placeholder="Invite Code">
            <button type="submit" class="bg-rqm-yellow-dark font-extrabold px-3 py-2 rounded-sm text-rqm-dark">
                Submit Code
            </button>
        </form>
    </div>
</div>
