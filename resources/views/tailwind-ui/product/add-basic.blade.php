@extends('tailwind-ui.add-product')

@if(request() -> is('profile/vendor/product/edit/*'))
    @section('product-title', 'Edit product - '. $basicProduct -> name)
@else
    @section('product-title', 'Add ' . $type . ' product')
@endif

@section('product-basic-form')
    @include('tailwind-ui.product.includes.basic-form')
@endsection
