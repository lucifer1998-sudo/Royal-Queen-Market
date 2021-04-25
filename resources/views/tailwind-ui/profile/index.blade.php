@extends('tailwind-ui.master.main')

@section('title', 'Profile settings')

@section('content')
    <div class="flex">
        @include('tailwind-ui.profile.menu')
        @if(\Route::currentRouteName() == 'profile.index')
            @include('tailwind-ui.profile.settings-content')
        @elseif(\Route::currentRouteName() == 'profile.pgp')
            @include('tailwind-ui.profile.pgp-key-content')
        @elseif(\Route::currentRouteName() == 'profile.vendor')
            @include('tailwind-ui.profile.vendor-content')
        @endif
    </div>
@endsection
