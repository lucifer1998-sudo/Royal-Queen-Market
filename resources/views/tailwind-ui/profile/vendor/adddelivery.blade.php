@extends('tailwind-ui.profile.vendor.productadding')

@if(request() -> is('profile/vendor/product/edit/*'))
    @section('product-title', 'Edit product - '. $physicalProduct -> product -> name)
@else
    @section('product-title', 'Add new product')
@endif

@section('product-delivery-form')
    @include('tailwind-ui.includes.profile.deliveryform')
@endsection
