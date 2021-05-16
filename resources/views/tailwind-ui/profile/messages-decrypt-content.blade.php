<div class="h-full">
    <div class="bg-rqm-lighter h-full p-40 rounded shadow text-center w-full">
        <span class="block text-2xl text-gray-400 text-rqm-yellow">Decrypt your messages</span>
        <span class="block text-rqm-white">All your messages are encrypted. Please enter your password to unlock your decryption key and make messages viewable.</span>
        <form action="{{route('profile.messages.decrypt.post')}}" method="post">
            {{csrf_field()}}
            <div class="mt-3">
                <label class="mt-3 text-rqm-white">Your Account Password</label>
            </div>
            <input type="password" name="password" class="bg-rqm-dark border border-rqm-yellow-darkest p-3 text-rqm-yellow w-full rounded" />
            <div class="flex py-1 justify-end">
                <button type="submit" class="bg-rqm-yellow-dark font-extrabold px-3 py-1 rounded-sm text-rqm-dark">
                    Decrypt
                </button>
            </div>
        </form>
    </div>
</div>
