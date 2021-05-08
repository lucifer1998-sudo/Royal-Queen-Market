@extends('tailwind-ui.add-product')

@if(request() -> is('profile/vendor/product/edit/*'))
    @section('product-title', 'Edit product - '. $basicProduct -> name)
@else
    @section('product-title', 'Add ' . session('product_type') . ' product')
@endif

@section('product-images-form')
    @include('tailwind-ui.product.includes.images-form')
@endsection
