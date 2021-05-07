@extends('master.main')


@section('title','Mnemonic')

@section('content')

    <div class="flex justify-center text-center py-7 ">
        <div class="text-white text-center w-3/5">
            <h4 class="text-rqm-yellow text-4xl">Mnemonic</h4>
            <div class="mt-3 text-center">
                <div class="form-group">
                    <p>
                        We have created your mnemonic key for your added security.
                        Please save and keep it in a safe place.
                        You will need this to recover your account, in case you forget password.
                        if you lose this, no one can help you recover you account and funds may be lost.
                    </p>
                </div>
                <div class="form-group py-4">
                    <textarea name="" id="" cols="70" rows="10" readonly class="form-control text-rqm-dark ">{{$mnemonic}}testsdasd</textarea>
                </div>
{{--                <div class="form-group text-center">--}}
{{--                    <a href="{{route('auth.signin')}}" class="btn btn-warning bg-rqm-yellow font-black py-2 text-rqm-dark w-full">Proceed to Sign In</a>--}}
{{--                </div>--}}
                <div class="flex justify-center text-lg text-rqm-yellow">
                    <a href="{{route('auth.signin')}}" value="Log In" class="bg-rqm-yellow font-bold py-2 text-rqm-dark w-full">Proceed to Sign In</a>
                </div>
            </div>

        </div>
    </div>

@stop
