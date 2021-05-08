@extends('tailwind-ui.master.main')

@section('title', 'Home')

@section('content')
    @include('includes.flash.success')
    @include('includes.flash.error')
    @include('includes.validation')
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
                <div class="bg-rqm-lighter p-5 rounded shadow w-full text-center">
                    <h1 class="mb-3 text-white">
                        @yield('product-title')
                    </h1>
                    <span class="text-2xl text-gray-400 block text-rqm-yellow">Add Physical Product</span>
                </div>
                <div class="mt-9 w-full">
                    <div class="grid gap-4 grid-cols-1">
                        <div class="bg-rqm-lighter p-5 rounded shadow w-full ">
                                @if(request() -> is('profile/vendor/product/edit/*'))
                                    <a class="text-2xl text-gray-400 block text-rqm-yellow" href="{{ route('profile.vendor.product.edit', $basicProduct) }}">
                                        Add Basic Information
                                    </a>
                                @else
                                    <a class="text-2xl text-gray-400 block text-rqm-yellow" href="{{ route('profile.vendor.product.add', session('product_type')) }}">
                                        Add Basic Information
                                    </a>
                                @endif
                        </div>
                    </div>
                </div>

                <div class="mt-9 w-full">
                    <div class="grid gap-0 grid-cols-1">
                        <div class="bg-rqm-lighter p-5 rounded shadow w-full ">
                            <form class="w-full max-w-6xl">
                                @yield('product-basic-form')
                                <div class="flex flex-wrap -mx-3 mb-6 text-center">
                                    <div class="w-full px-3">
                                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                            Next
                                        </button>
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3">
                                        <div class="bg-rqm-lighter p-5 rounded shadow w-full ">
                                            @if(request() -> is('profile/vendor/product/edit/*'))
                                                <a class="text-2xl text-gray-400 block text-rqm-yellow" href="{{ route('profile.vendor.product.edit', [$basicProduct, 'offers']) }}">
                                                    Price & Offers
                                                </a>
                                            @else
                                                <a class="text-2xl text-gray-400 block text-rqm-yellow" href="{{ route('profile.vendor.product.offers') }}">
                                                    Price & Offers
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3">
                                        <div class="bg-rqm-lighter p-5 rounded shadow w-full ">
                                            @if(request() -> is('profile/vendor/product/edit/*'))
                                                <a class="text-2xl text-gray-400 block text-rqm-yellow" href="{{ route('profile.vendor.product.edit', [$basicProduct, 'delivery']) }}">
                                                    Delivery Options
                                                </a>
                                            @else
                                                <a class="text-2xl text-gray-400 block text-rqm-yellow" href="{{ route('profile.vendor.product.delivery') }}">
                                                    Delivery Options
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3">
                                        <div class="bg-rqm-lighter p-5 rounded shadow w-full ">
                                            @if(request() -> is('profile/vendor/product/edit/*'))
                                                <a class="text-2xl text-gray-400 block text-rqm-yellow" href="{{ route('profile.vendor.product.edit', [$basicProduct, 'digital']) }}">
                                                    Digital Options
                                                </a>
                                            @else
                                                <a class="text-2xl text-gray-400 block text-rqm-yellow" href="{{ route('profile.vendor.product.digital') }}">
                                                    Digital Options
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3">
                                        <div class="bg-rqm-lighter p-5 rounded shadow w-full ">
                                            @if(request() -> is('profile/vendor/product/edit/*'))
                                                <a class="text-2xl text-gray-400 block text-rqm-yellow" href="{{ route('profile.vendor.product.edit', [$basicProduct, 'images']) }}">
                                                    Images
                                                </a>
                                            @else
                                                <a class="text-2xl text-gray-400 block text-rqm-yellow" href="{{ route('profile.vendor.product.images') }}">
                                                            Images
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6 text-center">
                                    <div class="w-full px-3">
                                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-900 hover:border-transparent rounded">
                                            Add Product
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
