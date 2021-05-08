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
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-white font-bold mb-2">
                                            Products Name
                                        </label>
                                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Product Name">
                                    </div>
                                    <div class="w-full md:w-1/2 px-3">
                                        <label class="block uppercase tracking-wide text-white font-bold mb-2">
                                            Products Category
                                        </label>
                                        <div class="relative">
                                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                                <option>Option 1</option>
                                                <option>option 2</option>
                                                <option>Option 3</option>
                                            </select>
                                            <div
                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3">
                                        <label class="block uppercase tracking-wide text-white font-bold mb-2">
                                            Products Description
                                        </label>
                                        <textarea class="resize-x border rounded-md w-full h-full">Product Description ...</textarea>
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3 py-5">
                                        <label class="block uppercase tracking-wide text-white font-bold mb-2">
                                            Payment Rules
                                        </label>
                                        <textarea class="resize-x border rounded-md w-full h-full">Payment Rules ...</textarea>
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3">
                                        <label class="block uppercase tracking-wide text-white font-bold mb-2">
                                            Supported types
                                        </label>
                                        <div class="relative">
                                            <select multiple class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                                <option>Option 1</option>
                                                <option>Option 2</option>
                                                <option>Option 3</option>
                                            </select>
                                            <div
                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3">
                                        <label class="block uppercase tracking-wide text-white font-bold mb-2">
                                            Supported coins
                                        </label>
                                        <div class="relative">
                                            <select multiple class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                                <option>Option 1</option>
                                                <option>Option 2</option>
                                                <option>Option 3</option>
                                            </select>
                                            <div
                                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                     viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label class="block uppercase tracking-wide text-white font-bold mb-2">
                                            Quantity
                                        </label>
                                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="number" placeholder="Quantity">
                                    </div>
                                    <div class="w-full md:w-1/2 px-3 ">
                                        <label class="block uppercase tracking-wide text-white  font-bold mb-2">
                                            Measure
                                        </label>
                                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Measure">
                                    </div>

                                </div>
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
