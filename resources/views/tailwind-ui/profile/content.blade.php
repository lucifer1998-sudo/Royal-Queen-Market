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
        </div>
    </div>
</div>
