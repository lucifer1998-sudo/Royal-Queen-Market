<div class="bg-rqm-lighter content-center flex flex-wrap h-full justify-center p-5 rounded shadow w-full">
    <div class="w-full">
        @if(auth() -> user() -> hasPGP())
            <p class="mb-5 text-base text-rqm-yellow-darkest text-white">Your PGP key is:</p>
            <div class="border border-rqm-yellow-darkest p-3 shadow-2xl"><p>{!! nl2br(auth() -> user() -> pgp_key) !!}</p></div>
        @else
            <span class="text-2xl text-gray-400 block">You don't have PGP key yet. </span>
            <span class="block">Please set the PGP key in the form below.</span>
        @endif
    </div>
    <div class="flex justify-center py-9 w-full">
        <div class="w-full">
            <p class="mb-5 text-base text-rqm-yellow-darkest text-white w-full">Set new PGP </p>
            @if ($errors->any())
                <div class="bg-rqm-light my-2 p-1.5">

                    @foreach ($errors->all() as $error)
                        <span class="text-base text-rqm-yellow-darkest block">{{$error}}</span>
                    @endforeach

                </div>
            @endif
            <form class="w-full" method="POST" action="{{ route('profile.pgp.post') }}">
                {{ csrf_field() }}
                <textarea name="newpgp" id="newpgp" style="resize: none" rows="10" class="bg-rqm-dark border border-rqm-yellow-darkest p-3 text-rqm-yellow w-full" placeholder="Paste here.."></textarea>
                <small class="text-rqm-yellow-dark">Paste your key here and later you'll need to confirm.</small>
                <div class="flex py-1 justify-end">
                    <button type="submit" class="bg-rqm-yellow-dark font-extrabold px-3 py-1 rounded-sm text-rqm-dark">
                        {{auth() -> user() -> hasPGP() ? 'Change PGP' : 'Add PGP'}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
