@extends('master.admin')

@section('bg')
        @include('master.navbar')
        @include('includes.jswarning')
@endsection

@section('admin-content')
	
	<div class="text-white">
    @isModuleEnabled('FeaturedProducts')
        @include('featuredproducts::featuredproductsview')
    @endisModuleEnabled
	</div>

@stop