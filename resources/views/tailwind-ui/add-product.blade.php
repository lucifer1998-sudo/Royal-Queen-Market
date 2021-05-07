@extends('tailwind-ui.master.main')

@section('title', 'Home')

@section('content')
    <div class="flex justify-center w-full">
        <div class="pl-10 w-1/6 h-full">
            <span></span>
        </div>
        <div class="flex h-full justify-center pl-10 w-5/6">
            <img src="{{URL::asset('/media/bottom-separator-1.png')}}" class="h-1/3 rotate-180 transform w-2/4" alt="">
        </div>
    </div>
    <div class="flex">
        @include('tailwind-ui.profile.menu')
        <div class="pl-10 w-5/6">
            <div class="h-full">
                <div class="bg-rqm-lighter p-5 rounded shadow w-full text-center">
                    <span class="text-2xl text-gray-400 block text-rqm-yellow">Add Physical Product</span>
                </div>
                <div class="mt-9 w-full">
                    <div class="grid gap-4 grid-cols-1">
                        <div class="bg-rqm-lighter p-5 rounded shadow w-full ">
                            <a href="#" class="text-2xl text-gray-400 block text-rqm-yellow">Add Basic Information</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
