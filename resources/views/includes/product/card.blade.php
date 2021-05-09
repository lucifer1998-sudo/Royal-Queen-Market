<div class="border border-gray-500 flex flex-col py-7 rounded-2xl shadow-md w-full relative">
    <div class="flex justify-center pb-5">
        <div class="break-words justify-center text-center text-white w-1/2 font-black">
            <a href="{{ route('product.show', $product) }}">
                {{ $product -> name }}
            </a>
        </div>
    </div>
    <a href="{{ route('product.show', $product) }}">
        <div class="flex items-center justify-center py-3">
            <p class="font-black pt-1 text-2xl text-white">
                From:
                <strong>{{ $product->getLocalPriceFrom() }} {{ \App\Marketplace\Utility\CurrencyConverter::getLocalSymbol() }}</strong>
            </p>
        </div>
        <div class="bg-gray-500 bg-opacity-25 flex items-center justify-center py-3">
            <p class="font-black pt-1 text-2xl text-rqm-yellow-dark uppercase">
                {{ $product -> category -> name }} -  {{ $product -> type }}
            </p>
        </div>
        <div class="flex items-center justify-center pb-14 pt-3 px-6">
            <div class="">
                <div class="px-1 text-center text-white">
                    Posted by <a href="{{ route('vendor.show', $product -> user) }}" class="badge badge-info">
                        {{ $product -> user -> username }}
                    </a>, <strong>{{ $product -> quantity }}</strong> left
                </div>
            </div>
        </div>
        <div class="absolute bottom-7 flex inset-x-0 items-end justify-center">
            <span class="bg-rqm-yellow-dark flex font-extrabold px-6 py-1 rounded-3xl text-rqm-dark">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    </span>
                <span class="px-2"><a href="{{ route('product.show', $product) }}"> Buy now</a></span>
            </span>
        </div>
    </a>
</div>
{{--<div class="card">--}}
{{--    <img class="card-img-top" src="{{ asset('storage/'  . $product -> frontImage() -> image) }}" alt="{{ $product -> name }}">--}}
{{--    <div class="card-body">--}}
{{--        <a href="{{ route('product.show', $product) }}"><h4 class="card-title" style="color: black;">--}}
{{--{{ $product -> name }}</h4></a>--}}
{{--        <p class="card-subtitle" style="color: black;">--}}
{{--            From: <strong>--}}
{{--                {{ $product->getLocalPriceFrom() }} {{ \App\Marketplace\Utility\CurrencyConverter::getLocalSymbol() }}--}}
{{--            </strong>  - {{ $product -> category -> name }} - <span class="badge badge-info">{{ $product -> type }}</span></p>--}}
{{--        <p class="card-text " style="color: black;">--}}
{{--            Posted by <a href="{{ route('vendor.show', $product -> user) }}" class="badge badge-info">--}}
{{--                {{ $product -> user -> username }}--}}
{{--            </a>, --}}
{{--            <strong>{{ $product -> quantity }}</strong> left--}}
{{--        </p>--}}
{{--        <a href="{{ route('product.show', $product) }}" class="btn btn-primary d-block">Buy now</a>--}}
{{--    </div>--}}
{{--</div>--}}
