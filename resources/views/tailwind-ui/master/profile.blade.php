@extends('tailwind-ui.master.main')

@section('title', 'Profile settings')

@section('bg')
		@include('master.navbar')
        @include('includes.jswarning')
@endsection

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
                @yield("profile-content")
            </div>
        </div>
    </div>
@stop
