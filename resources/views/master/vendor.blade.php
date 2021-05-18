@extends('master.main')

@section('title','Vendor - ' . $vendor -> username )

@section('bg')
        @include('master.navbar')
        @include('includes.jswarning')
@endsection

@section('content')
    {{-- Breadcrumbs --}}
    <div class="row">
        <div class="col-md-12 profile-bg {{$vendor->vendor->getProfileBg()}} rounded pt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">asdasdas
                    @include('includes.vendor.card')
                </div>
            </div>
        </div>
    </div>

    @include('includes.vendor.stats')
    @yield('vendor-content')
@stop