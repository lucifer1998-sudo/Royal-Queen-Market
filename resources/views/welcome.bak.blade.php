@extends('master.main')

@section('title','Home Page')

@section('bg')
<div id="bg" style="background-image: url('{{URL::asset('/media/rqm-bg.jpg')}}');">
        @include('master.navbar')
        @include('includes.jswarning')
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-12 text-center title-margin-top mb-4">
                    <img src="{{URL::asset('/media/royal-queen-logo.png')}}" class="img-fluid" alt="">
                </div>
                <div class="col-1 d-md-none"></div>
                <div class="col-xl-6 offset-xl-3 col-md-6 col-md-3 col-12 text-center">
                    <h1 class="home-title">Your Royal Luxury</h1>
                </div>
            </div>
        </div>
</div>
@endsection

@section('content')

    {{--@include('includes.search')--}}

        <div class="">
            <div class="row">

                <div class="col-md-1 text-lg-right text-white">
                    @include('includes.viewpicker')
                </div>
            </div>
            <hr>

            @if($productsView == 'list')
                @foreach($products as $product)
                    <div class="u--bounce">
                    @include('includes.product.card-home', ['product' => $product])
                    </div>
                @endforeach
            @else
                @foreach($products->chunk(3) as $chunks)
                    <div class="row mt-3">
                        @foreach($chunks as $product)
                            <div class="col-md-4 my-md-0 my-2 col-12 u--bounce">
                                @include('includes.product.card', ['product' => $product])
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @endif

            {{ $products -> links('includes.paginate') }}
        </div>
<!--     <div class="container-fluid featured-area page-bg-color p-3">
        <div class="row">
            <div class="col-xl-2 offset-xl-5 text-center mb-3 mt-4">
                <img src="{{URL::asset('/media/top-separator.png')}}" class="img-fluid" alt="">
            </div>
            <div class="col-xl-12 text-center">
                <h2 class="text-uppercase text-white">Featured Items</h2>
            </div>
        </div>

    </div> -->


    @include('footer')

@stop