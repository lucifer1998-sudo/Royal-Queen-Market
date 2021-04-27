@extends('tailwind-ui.master.main')

@section('title', 'Profile settings')

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
            @if(\Route::currentRouteName() == 'profile.index')
                @include('tailwind-ui.profile.settings-content')
            @elseif(\Route::currentRouteName() == 'profile.pgp')
                @include('tailwind-ui.profile.pgp-key-content')
            @elseif(\Route::currentRouteName() == 'profile.vendor')
                @include('tailwind-ui.profile.vendor-content')
            @elseif(\Route::currentRouteName() == 'profile.sales')
                @include('tailwind-ui.profile.sales-content')
            @elseif(\Route::currentRouteName() == 'profile.wishlist')
                @include('tailwind-ui.profile.wishlist-content')
            @elseif(\Route::currentRouteName() == 'profile.messages.decrypt.show')
                @include('tailwind-ui.profile.messages-decrypt-content')
            @elseif(\Route::currentRouteName() == 'profile.messages')
                @include('tailwind-ui.profile.messages-content')
            @elseif(\Route::currentRouteName() == 'profile.notifications')
                @include('tailwind-ui.profile.notifications-content')
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
