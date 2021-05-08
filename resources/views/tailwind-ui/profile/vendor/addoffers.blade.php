@extends('tailwind-ui.profile.vendor.productadding')

@if(request() -> is('profile/vendor/product/edit/*'))
    @section('product-title', 'Edit product - '. $basicProduct -> name)
@else
    @section('product-title', 'Add new product')
@endif
@section('product-offers-form')
    @include('tailwind-ui.includes.profile.offersform')
@endsection
