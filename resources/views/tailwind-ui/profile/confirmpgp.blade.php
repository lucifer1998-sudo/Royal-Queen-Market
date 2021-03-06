@extends('tailwind-ui.master.profile')

@section('profile-content')

    @include('includes.flash.error')
<div class="flex">
    <div class="w-full">
        <h1 class="mt-5 mb-3 text-rqm-yellow-dark text-2xl">2FA PGP challenge:</h1>
        <hr class="my-2">
{{--        <div class="form-group">--}}
            <label for="decrypt_message" class="text-white my-2">The Secret Message:</label>
            <textarea name="decrypt_message" id="decrypt_message" class=" my-2 bg-rqm-dark border border-rqm-yellow-darkest p-3 text-rqm-white w-full rounded"
                      rows="10" readonly>{{{ session() -> get(\App\Marketplace\PGP::NEW_PGP_ENCRYPTED_MESSAGE) }}}</textarea>
            <p class="text-white text-xl my-2">Decrypt this and post the SECRET CODE below to confirm your new PGP key.</p>
{{--        </div>--}}
        <form method="POST" action="{{ route('profile.pgp.store') }}" class="form-inline">
            {{ csrf_field() }}
            <label class="text-white text-xl my-2">SECRET CODE:</label>
            <input type="number" class="bg-rqm-dark border border-rqm-yellow-darkest p-3 text-rqm-white w-full rounded" required name="validation_number" id="validation_number"/>
            <button class="bg-rqm-yellow-dark font-extrabold px-3 py-2 rounded-sm text-rqm-dark my-2">Enter SECRET CODE</button>

        </form>
    </div>
</div>

@stop
