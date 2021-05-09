<div class="h-full">
    <div class="bg-rqm-lighter p-5 rounded shadow w-full text-center">
        <span class="text-2xl text-gray-400 block text-rqm-yellow">Welcome, {{ auth()->user()->username }}</span>
        <span class="block text-rqm-white">Manage your info, privacy and security to make Royal Queen Market work better for you.</span>
    </div>
    <div class="mt-9 w-full">
        <div class="grid gap-4 grid-cols-2">
            <div class="bg-rqm-lighter p-5 rounded shadow w-full">
                <div class="pb-3 text-2xl text-rqm-yellow">Change password</div>
                @if ($errors->any())
                    <div class="bg-rqm-light my-2 p-1.5">

                        @foreach ($errors->all() as $error)
                            <span class="text-base text-rqm-yellow-darkest block">{{$error}}</span>
                        @endforeach

                    </div>
                @endif
                <form action="{{ route('profile.password.change') }}" method="POST" class="">
                    {{ csrf_field() }}
                    <div class="flex py-1">
                        <div class="text-gray-400 w-1/3 text-rqm-white">Old password</div>
                        <input type="password" class="w-2/3 rounded" id="old_password" name="old_password">
                    </div>
                    <div class="flex py-1">
                        <div class="text-gray-400 w-1/3 text-rqm-white">New password</div>
                        <input type="password" class="w-2/3 rounded" id="new_password" name="new_password">
                    </div>
                    <div class="flex py-1">
                        <div class="text-gray-400 w-1/3 text-rqm-white">Confirm password</div>
                        <input type="password" class="w-2/3 rounded" id="new_password_confirmation"
                               name="new_password_confirmation">
                    </div>
                    <div class="flex py-1 justify-end">
                        <button type="submit"
                                class="bg-rqm-yellow-dark font-extrabold px-3 py-1 rounded-sm text-rqm-dark">
                            Change password
                        </button>
                    </div>
                </form>
            </div>
            <div class="bg-rqm-lighter p-5 rounded shadow w-full">
                <div class="pb-3 text-2xl text-center text-rqm-yellow">Two Factor Authentication</div>
                @if ($errors->any())
                    <div class="bg-rqm-light my-2 p-1.5">

                        @foreach ($errors->all() as $error)
                            <span class="text-base text-rqm-yellow-darkest block">{{$error}}</span>
                        @endforeach

                    </div>
                @endif
                <div class="flex justify-center">
                    <div class="flex justify-center py-1 py-12">
                        <a href="{{ route('profile.2fa.change', (int) !auth() -> user() -> login_2fa) }}">
                            <button type="submit"
                                    class="hover:grow @if(auth() -> user() -> login_2fa == true) bg-rqm-yellow-dark @else bg-gray-500 @endif  font-extrabold px-4 py-3 rounded-sm text-rqm-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    @if(auth() -> user() -> login_2fa == true)
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                              d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    @else
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"/>
                                    @endif
                                </svg>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="bg-rqm-lighter p-5 rounded shadow w-full">
                <div class="pb-3 text-2xl text-rqm-yellow">Referral link</div>
                @if ($errors->any())
                    <div class="bg-rqm-light my-2 p-1.5">

                        @foreach ($errors->all() as $error)
                            <span class="text-base text-rqm-yellow-darkest block">{{$error}}</span>
                        @endforeach

                    </div>
                @endif
                <div class="justify-center">
                    <div class="bg-rqm-lighter flex flex-1 justify-center py-3">
                        {{ route('auth.signup', auth() -> user() -> referral_code) }}
                    </div>
                    <small class="text-rqm-white">Paste this address to other users who wants to sign up on the
                        market!</small>
                </div>
            </div>
            <div class="bg-rqm-lighter p-5 rounded shadow w-full">
                <div class="pb-3 text-2xl text-rqm-yellow">Payment Addresses</div>
                @if ($errors->any())
                    <div class="bg-rqm-light my-2 p-1.5">

                        @foreach ($errors->all() as $error)
                            <span class="text-base text-rqm-yellow-darkest block">{{$error}}</span>
                        @endforeach

                    </div>
                @endif
                <form action="{{ route('profile.vendor.address') }}" method="POST" class="">
                    {{ csrf_field() }}
                    <div class="flex py-1">
                        <div class="text-gray-400 w-1/3 text-rqm-white">New address (pubkey)</div>
                        <input type="text" class="w-2/3 rounded" id="address" name="address">

                    </div>
                    <div class="flex py-1">
                        <div class="text-gray-400 w-1/3 text-rqm-white">Crypto</div>
                        <select name="coin" id="coin" class="w-2/3 rounded">
                            @foreach(config('coins.coin_list') as $supportedCoin => $instance)
                                <option
                                    value="{{ $supportedCoin }}">{{ strtoupper(\App\Address::label($supportedCoin)) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex py-1 justify-end">
                        <button type="submit"
                                class="bg-rqm-yellow-dark font-extrabold px-3 py-1 rounded-sm text-rqm-dark">
                            Change
                        </button>
                    </div>
                    <div class="flex py-1">
                        <small class=" text-justify text-rqm-white">On this address you will receive payments from
                            purchases! Funds will be sent to your most recent added address of coin!</small>
                    </div>
                </form>
            </div>
        </div>
        <div class="bg-rqm-lighter p-5 rounded shadow w-full mt-9">
            @if(auth() -> user() -> addresses -> isNotEmpty())
                <table class="table-auto w-full">
                    <thead class="border-b border-rqm-yellow-dark">
                    <tr>
                        <th class="px-2 text-center text-left text-rqm-yellow">Address</th>
                        <th class="px-2 text-center text-left text-rqm-yellow">Coin</th>
                        <th class="px-2 text-center text-left text-rqm-yellow">Added</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(auth() -> user() -> addresses as $address)
                        <tr>
                            <td class="border-gray-600 border-r px-2 py-2 text-gray-400 text-center">
                                <input type="text" readonly
                                       class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full"
                                       value="{{ $address -> address }}">
                            </td>
                            <td class="border-gray-600 border-r px-2 py-2 text-gray-400 text-center"><span
                                    class="text-rqm-white">{{ strtoupper($address -> coin) }}</span></td>
                            <td class="border-gray-600 border-r px-2 py-2 text-gray-400 text-center text-rqm-white">
                                {{ $address -> added_ago }}
                            </td>
                            <td class="border-gray-600 border-r px-2 py-2 text-gray-400 text-center"><a
                                    href="{{ route('profile.vendor.address.remove', $address) }}"
                                    class="text-rqm-white">Remove</a></td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            @else
                <div class="text-rqm-white text-center">You addresses list is empty!</div>
            @endif
        </div>
        <div class="bg-rqm-lighter p-5 rounded shadow w-full mt-9">
            <form action="{{ route('profile.vendor.currency') }}" method="POST">
                <div class="pb-3 text-2xl text-rqm-yellow">Currency</div>
                <div class="flex py-1">
                    {{ csrf_field() }}
                    <div class="text-gray-400 w-1/3 text-rqm-white">Select Currency</div>
                    <select name="currency" id="coin" class="w-2/3 rounded">
                        <option {{ auth() -> user() -> currency -> currency == 'usd' ? 'selected' : ''}} value="usd">USD</option>
                        <option {{ auth() -> user() -> currency -> currency == 'eur' ? 'selected' : ''}} value="eur">EUR</option>
                    </select>
                </div>
                <div class="flex py-1 justify-end">
                    <button type="submit" class="bg-rqm-yellow-dark font-extrabold px-3 py-1 rounded-sm text-rqm-dark">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
