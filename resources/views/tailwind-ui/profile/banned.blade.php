@extends('tailwind-ui.master.profile')

@section('profile-content')
    @include('includes.flash.error')
    @include('includes.flash.success')

    <div class="flex">
        <div class="w-full m-4 bg-rqm-lighter p-4">
            <h1 class="text-rqm-yellow-dark text-2xl">Banned account</h1>
        </div>
    </div>

    <div class="alert alert-danger text-center m-4">
        You are banned until {{ $until }}.
    </div>

@stop
