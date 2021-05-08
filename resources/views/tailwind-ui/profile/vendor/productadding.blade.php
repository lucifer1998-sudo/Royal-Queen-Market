@extends('tailwind-ui.master.main')

@section('title', 'Products')

@section('content')
    <div class="flex justify-center w-full">
        <div class="pl-10 w-1/6 h-full">
            <span></span>
        </div>
        <div class="flex h-full justify-center pl-10 w-5/6">
            <img src="{{URL::asset('/media/bottom-separator-1.png')}}" class="h-1/3 rotate-180 transform w-2/4" alt="">
        </div>
    </div>
    <div class="flex">
        @include('tailwind-ui.profile.menu')
        <div class="pl-10 w-5/6">
            <div class="h-full">
                @include('includes.flash.success')
                @include('includes.flash.error')
                @include('includes.validation')
                <div class="bg-rqm-lighter p-5 rounded shadow w-full text-center">
                    <span class="text-2xl text-gray-400 block text-rqm-yellow">@yield('product-title')</span>
                </div>
                @vendor
                <div class="accordion mb-3" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <div class="bg-rqm-lighter p-5 rounded shadow w-full">
                                @if(request() -> is('profile/vendor/product/edit/*'))
                                    <a class="text-2xl text-gray-400 block text-rqm-yellow"
                                       href="{{ route('profile.vendor.product.edit', $basicProduct) }}">
                                        @else
                                            <a class="text-2xl text-gray-400 block text-rqm-yellow"
                                               href="{{ route('profile.vendor.product.add', session('product_type')) }}">
                                                @endif
                                                <h3>
                                                    <i class="fas fa-info-circle"></i>
                                                    Basic information
                                                </h3>
                                            </a>
                            </div>
                        </div>


                        @yield('product-basic-form')
                    </div>
                    <div class="card my-2">
                        <div class="card-header">
                            <div class="bg-rqm-lighter p-5 rounded shadow w-full">
                                @if(request() -> is('profile/vendor/product/edit/*'))
                                    <div class="text-2xl text-gray-400 block text-rqm-yellow"
                                         href="{{ route('profile.vendor.product.edit', [$basicProduct, 'offers']) }}">
                                        @else
                                            <a class="text-2xl text-gray-400 block text-rqm-yellow" href="{{ route('profile.vendor.product.offers') }}">
                                                @endif
                                                <h3>
                                                    <i class="fas fa-money-check-alt"></i>
                                                    Price and offers
                                                </h3>
                                            </a>
                                    </div>
                            </div>

                            @yield('product-offers-form')
                        </div>
                        @php
                            if(empty($type))
                                $type = session('product_type');
                        @endphp
                        @if($type == 'physical')
                            <div class="card my-2">
                                <div class="card-header">
                                    <div class="bg-rqm-lighter p-5 rounded shadow w-full">
                                    @if(request() -> is('profile/vendor/product/edit/*'))
                                        <div class="text-2xl text-gray-400 block text-rqm-yellow"
                                           href="{{ route('profile.vendor.product.edit', [$basicProduct, 'delivery']) }}">
                                            @else
                                                <a class="text-2xl text-gray-400 block text-rqm-yellow" href="{{ route('profile.vendor.product.delivery') }}">
                                                    @endif
                                                    <h3>
                                                        <i class="fas fa-truck"></i>
                                                        Delivery options
                                                    </h3>
                                                </a>
                                        </div>
                                </div>

                                @yield('product-delivery-form')
                            </div>
                        @else
                            <div class="card">
                                <div class="card-header">
                                    @if(request() -> is('profile/vendor/product/edit/*'))
                                        <a class="btn"
                                           href="{{ route('profile.vendor.product.edit', [$basicProduct, 'digital']) }}">
                                            @else
                                                <a class="btn" href="{{ route('profile.vendor.product.digital') }}">
                                                    @endif
                                                    <h3>
                                                        <i class="fas fa-desktop"></i>
                                                        Digital options
                                                    </h3>
                                                </a>
                                </div>

                                @yield('product-digital-form')
                            </div>
                        @endif
                        <div class="card my-2">
                            <div class="card-header">
                                <div class="bg-rqm-lighter p-5 rounded shadow w-full ">
                                @if(request() -> is('profile/vendor/product/edit/*'))
                                    <div class="text-2xl text-gray-400 block text-rqm-yellow"
                                       href="{{ route('profile.vendor.product.edit', [$basicProduct, 'images']) }}">
                                        @else
                                            <a class="text-2xl text-gray-400 block text-rqm-yellow" href="{{ route('profile.vendor.product.images') }}">
                                                @endif
                                                <h3>
                                                    <i class="fas fa-images"></i>
                                                    Images
                                                </h3>
                                            </a>
                                    </div>
                            </div>

                            @yield('product-images-form')
                        </div>
                    </div>

                    @if(!request() -> is('profile/vendor/product/edit/*'))
                        <form method="POST" action="{{ route("profile.vendor.product.post") }}"
                              class="text-center my-2">
                            {{ csrf_field() }}
                            <button class="bg-rqm-yellow-dark font-extrabold px-5 py-1 rounded-3xl text-rqm-dark text-center mb-4">
                                Add product
                            </button>
                        </form>
                    @endif

                    @endvendor
                </div>
            </div>
            <hr>

        </div>
@stop
