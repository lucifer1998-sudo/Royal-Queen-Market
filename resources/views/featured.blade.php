@extends('master.main')

@section('title','Featured Items')

@section('bg')
		@include('master.navbar')
        @include('includes.jswarning')
@endsection

@section('content')
<div id="featured"></div>
    <div class="container-fluid featured-area page-bg-color p-3">
        <div class="row">
            <div class="col-xl-2 offset-xl-5 text-center mb-3 mt-4">
                <img src="{{URL::asset('/media/top-separator.png')}}" class="img-fluid" alt="">
            </div>
            <div class="col-xl-12 text-center">
                <h2 class="text-uppercase text-white">Featured Items</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">

<!--                 <?php $pl=0; while( $pl <= 7) { ?>

 
                <div class="col-xl-3 p-2">
                    <div class="border p-4 rounded-3 text-center">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <img src="{{URL::asset('/media/sample-product.jpg')}}" class="img-fluid" alt="">
                            </div>
                            <div class="col-md-12 text-white">
                                <h3 class="mb-0">VAPE PIERRE</h3>
                                <p class="items-price mb-0">EUR 90.00</p>
                                <p class="items-price-mini mt-0 mb-1">EUR 14.00/g - 15.00/g </p>
                                <div class="row text-center">
                                    <div class="col-3 d-md-none"></div>
                                    <div class="col-md-2 offset-md-3 col-2"><img
                                            src="{{URL::asset('/media/c-bitcoin.png')}}" class="img-fluid" alt=""></div>
                                    <div class="col-md-2 col-2"><img
                                            src="{{URL::asset('/media/c-ethereum.png')}}" class="img-fluid" alt=""></div>
                                    <div class="col-md-2 col-2"><img src="{{URL::asset('/media/c-monero.png')}}"
                                            class="img-fluid" alt=""></div>
                                </div>
                                <p class="mt-1 mb-3">SHIPS TO GB, EU</p>
                                <button class="btn btn-outline-warning">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                </div>
                 / Product Loops 

                <?php $pl++; } ?> -->
           
			@isModuleEnabled('FeaturedProducts')
                @include('featuredproducts::frontpagedisplay')
            @endisModuleEnabled



          

            </div>
        </div>


    </div>


    @include('footer')
@endsection