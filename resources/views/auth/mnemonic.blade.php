@extends('master.main')


@section('title','Mnemonic')

@section('content')

    <div class="flex ml-34rm py-7">
        <div class="text-white text-center w-2/5">
            <h4 class="text-rqm-yellow text-4xl">Mnemonic</h4>
            <div class="mt-3 text-center">
                <div class="form-group">
                    <p>
                        This is your mnemonik key. It consists out of {{config('marketplace.mnemonic_length')}} words.
                        Please write
                        them down. This is the only time they will be shown to you, and without them you cannot recover
                        your account
                        in case you lose password.
                    </p>
                </div>
                <div class="form-group py-4">
                    <textarea name="" id="" cols="30" rows="10" readonly class="form-control">{{$mnemonic}}</textarea>
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
