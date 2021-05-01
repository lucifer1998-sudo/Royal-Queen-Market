@extends('tailwind-ui.master.main')

@section('title','Home Page')

@section('hero')

@endsection

@section('content')
    <div class="bg-rqm-light flex shadow-md">
        <div class="w-1/2 flex">
            <div class="pl-14 my-auto">
                <div>
                    <span class="text-5xl text-rqm-yellow-darkest w-10/12">Royal Queen Market</span>
                </div>
                <div class="pt-8">
                    <p class="text-gray-400 w-10/12 text-justify">
                        Lorem ipsum dolor sit amet, enim pertinax sea an. Ea dissentias quaerendum cum, sed mundi atomorum eu. Vix nisl cetero eu, oblique blandit mel ei. An propriae eleifend concludaturque sea. Probo viris docendi ne eos, an cibo accusamus ullamcorper ius, omnes scripta quo te. Decore periculis expetendis has at.
                    </p>
                </div>
                <div class="pt-10">
                    <a href="{{URL('shop')}}">
                        <button class="bg-rqm-yellow-dark font-extrabold px-5 py-2 rounded-sm text-rqm-dark">
                            Shop Now
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="w-1/2">
            <img src="{{URL::asset('/media/cover3.png')}}">
        </div>
    </div>

    <div class="mt-14 w-full">
        <div class="p-10 relative">
            <div class="absolute inset-0 bg-repeat h-full opacity-10 w-full" style="background-image: url({{URL::asset('/media/bg.cleaned.png')}})">
                <span></span>
            </div>
            <div class="grid gap-6 grid-cols-4">
                @foreach($products as $product)
                    <div class="border border-gray-500 flex flex-col py-7 rounded-2xl shadow-md w-full relative">
                        <div class="flex justify-center pb-5">
                            <div class="break-words justify-center text-center text-white w-1/2 font-black">{{$product->name}}</div>
                        </div>
                        <a href="{{ route('product.show', $product) }}">
                            <div class="w-full px-7">
                                <img class="rounded-2xl hover:grow hover:shadow-lg w-full" src="{{ asset('storage/'  . $product -> frontImage() -> image) }}" alt="{{$product->name}}">
                            </div>
                            <div class="flex items-center justify-center py-3">
                                <p class="font-black pt-1 text-2xl text-white">@include('includes.currency', ['usdValue' => $product -> price_from ])</p>
                            </div>
                            <div class="bg-gray-500 bg-opacity-25 flex items-center justify-between px-6 py-3">
                                <div class="text-rqm-yellow">
                                    {{ $product -> user -> username }}
                                </div>
                                <div class="flex">
                                    @foreach($product -> getCoins() as $coin)
                                        <span class="px-1 text-white">{{ strtoupper(\App\Purchase::coinDisplayName($coin)) }}</span>
                                    @endforeach
                                </div>
                            </div>
                            @if($product -> type != 'digital')
                            <div class="flex items-center justify-center pb-14 pt-3 px-6">
                                <div class="">
                                    <div class="px-1 text-center text-white">
                                        Ships from {{ $product -> specificProduct() -> shipsFrom() }}
                                    </div>
                                    <div class="px-1 text-center text-white">
                                        Ships to {{ $product -> specificProduct() -> shipsTo() }} @if(! empty($product -> specificProduct() -> countriesLong())) : <em>{{ $product -> specificProduct() -> countriesLong() }}</em> @endif
                                    </div>

                                </div>
                            </div>
                            @else
                                <div class="flex items-center justify-center pb-14 pt-3 px-6">
                                    <div class="">
                                        <div class="px-1 text-center text-white">
                                            Digital Product
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="absolute bottom-7 flex inset-x-0 items-end justify-center">
                                <button class="bg-rqm-yellow-dark flex font-extrabold px-6 py-1 rounded-3xl text-rqm-dark">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </span>
                                    <span class="px-2">Buy Now</span>
                                </button>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
