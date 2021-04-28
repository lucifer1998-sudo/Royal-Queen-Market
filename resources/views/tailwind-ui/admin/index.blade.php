@extends('tailwind-ui.master.main')

@section('title', 'Admin Dashboard')

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

        @include('tailwind-ui.admin.menu')
        <div class="pl-10 w-5/6">
            @if(\Route::currentRouteName() == 'admin.index')
                @include('tailwind-ui.admin.dashboard-content')
            @elseif(\Route::currentRouteName() == 'admin.categories')
                @include('tailwind-ui.admin.categories-content')
            @endif
        </div>
    </div>
    <div class="flex justify-center w-full">
        <div class="pl-10 w-1/6 h-full">
            <span></span>
        </div>
        <div class="flex h-full justify-center pl-10 w-5/6">
            <img src="{{URL::asset('/media/bottom-separator-1.png')}}" class="h-1/3 transform w-2/4" alt="">
        </div>
    </div>
@endsection
