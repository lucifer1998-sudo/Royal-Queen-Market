@extends('master.profile')

@section('title', 'Vendor Settings')

@section('profile-content')
    @include('includes.flash.success')
    @include('includes.flash.error')
    @include('includes.flash.invalid')

    <h1 class="mb-3 text-white">Vendor settings</h1>
    <hr>
    @vendor
        {{-- Vendor Display --}}

        @include('includes.profile.vendor.experience')

        @include('includes.profile.vendor.editprofile')

        @include('includes.profile.vendor.addproduct')

        @include('includes.profile.vendor.products')
    @else
        {{-- Non vendor display --}}
        <h3 class="text-white">Become vendor</h3>
        <hr>
        <div class="alert alert-warning text-center my-2 text-white">You don't have vendor status yet. Become vendor sell products
            on this store.
        </div>
        <div class="text-center">
            <a href="{{ route('profile.vendor.become') }}" class="btn btn-outline-success btn-md">Become vendor</a>
        </div>

    @endvendor
@stop