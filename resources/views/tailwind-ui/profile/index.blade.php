@extends('tailwind-ui.master.main')

@section('title', 'Profile settings')

@section('content')
    <div class="flex">
        @include('tailwind-ui.profile.menu')
        @include('tailwind-ui.profile.content')
    </div>
@endsection
