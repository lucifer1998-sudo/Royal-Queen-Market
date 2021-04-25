<div class="pl-10 w-5/6">
    <div class="bg-rqm-dark p-5 rounded shadow w-full text-center">
        <span class="text-2xl text-gray-400 block">Welcome, {{ auth()->user()->username }}</span>
        <span class="block">Manage your info, privacy and security to make Royal Queen Market work better for you.</span>
    </div>
    <div class="mt-9 w-full">
        <div class="grid gap-4 grid-cols-2">
            <div class="bg-rqm-dark p-5 rounded shadow w-full">
                <div class="pb-3 text-2xl text-rqm-yellow-darkest">Change password</div>
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
                        <div class="text-gray-400 w-1/3">Old password</div>
                        <input type="password" class="w-2/3 rounded" id="old_password" name="old_password">
                    </div>
                    <div class="flex py-1">
                        <div class="text-gray-400 w-1/3">New password</div>
                        <input type="password" class="w-2/3 rounded" id="new_password" name="new_password">
                    </div>
                    <div class="flex py-1">
                        <div class="text-gray-400 w-1/3">Confirm password</div>
                        <input type="password" class="w-2/3 rounded" id="new_password_confirmation" name="new_password_confirmation">
                    </div>
                    <div class="flex py-1 justify-end">
                        <button type="submit" class="bg-rqm-yellow-dark font-extrabold px-3 py-1 rounded-sm text-rqm-dark">
                            Change password
                        </button>
                    </div>
                </form>
            </div>
            <div class="bg-rqm-dark p-5 rounded shadow w-full">
                <div class="pb-3 text-2xl text-center text-rqm-yellow-darkest">Two Factor Authentication</div>
                @if ($errors->any())
                    <div class="bg-rqm-light my-2 p-1.5">

                        @foreach ($errors->all() as $error)
                            <span class="text-base text-rqm-yellow-darkest block">{{$error}}</span>
                        @endforeach

                    </div>
                @endif
                <divclass="flex justify-center">
                    {{ csrf_field() }}
                    <div class="flex justify-center py-1 py-12">
                        <a href="{{ route('profile.2fa.change', (int) !auth() -> user() -> login_2fa) }}">
                            <button type="submit" class="@if(auth() -> user() -> login_2fa == true) bg-rqm-yellow-dark @else bg-gray-500 @endif  font-extrabold px-4 py-3 rounded-sm text-rqm-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    @if(auth() -> user() -> login_2fa == true)
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    @else
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                    @endif
                                </svg>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
