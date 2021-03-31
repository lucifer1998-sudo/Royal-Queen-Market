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

    <div class="row text-white">
        <div class="col-md-3 col-sm-12" style="margin-top:2.3em">
            @include('includes.categories')
        </div>
        <div class="col-md-9 col-sm-12 mt-3 ">

            <div class="row">
                <div class="col">
                    <h1 class="col-10">Welcome to {{config('app.name')}}</h1>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, aliquid cupiditate dolore enim et
                    eveniet fugiat illum ipsum itaque minus molestias nihil optio porro quisquam quo saepe sunt velit
                    veritatis.
                </div>
            </div>
            <div class="row mt-5">

                <div class="col-md-4">
                    <h4><i class="fa fa-money-bill-wave-alt text-info"></i> No deposit</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid dolorem hic nisi
                        ratione repellendus suscipit totam vitae!
                    </p>
                </div>

                <div class="col-md-4">
                    <h4><i class="fa fa-shield-alt text-info"></i> Escrow</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid dolorem hic nisi
                        ratione repellendus suscipit totam vitae!
                    </p>
                </div>

                <div class="col-md-4">
                    <h4><i class="fa fa-coins text-info"></i> Multiple-Coins</h4>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquid dolorem hic nisi
                        ratione repellendus suscipit totam vitae!
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>
            @isModuleEnabled('FeaturedProducts')
                @include('featuredproducts::frontpagedisplay')
            @endisModuleEnabled

            <div class="row mt-4">

                <div class="col-md-4">
                    <h4>
                        Top Vendors
                    </h4>
                    <hr>
                    @foreach(\App\Vendor::topVendors() as $vendor)
                        <table class="table table-borderless table-hover">
                            <tr>
                                <td>
                                    <a href="{{route('vendor.show',$vendor)}}"
                                       style="text-decoration: none; color:#212529">{{$vendor->user->username}}</a>
                                </td>
                                <td class="text-right">
                                    <span class="btn btn-sm @if($vendor->vendor->experience >= 0) btn-primary @else btn-danger @endif active"
                                          style="cursor:default">Level {{$vendor->getLevel()}}</span>

                                </td>
                            </tr>
                        </table>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <h4>
                        Latest orders
                    </h4>
                    <hr>
                    @foreach(\App\Purchase::latestOrders() as $order)
                        <table class="table table-borderless table-hover">
                            <tr>
                                <td>
                                    <img class="img-fluid" height="23px" width="23px"
                                         src="{{ asset('storage/'  . $order->offer->product->frontImage()->image) }}"
                                         alt="{{ $order->offer->product->name }}">
                                </td>
                                <td>
                                    {{str_limit($order->offer->product->name,50,'...')}}
                                </td>
                                <td class="text-right">
                                    {{$order->getSumLocalCurrency()}} {{$order->getLocalSymbol()}}
                                </td>
                            </tr>
                        </table>
                    @endforeach
                </div>

                <div class="col-md-4">
                    <h4>
                        Rising vendors
                    </h4>
                    <hr>
                    @foreach(\App\Vendor::risingVendors() as $vendor)
                        <table class="table table-borderless table-hover">
                            <tr>
                                <td>
                                    <a href="{{route('vendor.show',$vendor)}}"
                                       style="text-decoration: none; color:#212529">{{$vendor->user->username}}</a>
                                </td>
                                <td class="text-right">
                                    <span class="btn btn-sm @if($vendor->vendor->experience >= 0) btn-primary @else btn-danger @endif active"
                                          style="cursor:default">Level {{$vendor->getLevel()}}</span>
                                </td>
                            </tr>
                        </table>
                    @endforeach
                </div>


            </div>


        </div>

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