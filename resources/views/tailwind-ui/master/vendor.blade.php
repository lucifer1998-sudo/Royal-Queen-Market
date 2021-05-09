@extends('tailwind-ui.master.main')

@section('title','Vendor - ' . $vendor -> username )

@section('bg')
        @include('master.navbar')
        @include('includes.jswarning')
@endsection

@section('content')
    {{-- Breadcrumbs --}}
    <nav class="container">
        <ol class="list-reset py-4 pl-4 rounded flex bg-rqm-lighter text-white text-lg">
            <li class="px-2">{{ config('app.name') }}</li>
            <li>/</li>
            <li class="px-2">Vendor</li>
            <li>/</li>
            <li class="px-2">{{ $vendor -> username }}</li>
        </ol>
    </nav>
    <div class="flex {{$vendor->vendor->getProfileBg()}} text-center justify-content-center">
{{--        <div class="col-md-12 profile-bg {{$vendor->vendor->getProfileBg()}} rounded pt-5">--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-md-8">--}}
                    @include('tailwind-ui.includes.vendor.card')
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

    @include('includes.vendor.stats')
    @yield('vendor-content')
@stop
