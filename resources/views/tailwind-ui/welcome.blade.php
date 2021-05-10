@extends('tailwind-ui.master.main')

@section('title', 'Home')

@section('content')
    <div class="flex justify-center w-full">
        <div class="pl-10 w-1/6 h-full">
            <span></span>
        </div>
        <div class="flex h-full justify-center pl-10 w-5/6">
            <img src="{{URL::asset('/media/bottom-separator-1.png')}}" class="h-1/3 rotate-180 transform w-2/4" alt="">
        </div>
    </div>
    <div class="w-full flex">
        <div class="bg-rqm-lighter pb-10 px-2 px-7 rounded shadow w-1/5">
            <div class="py-3 text-2xl text-rqm-yellow">Categories</div>
            @include('tailwind-ui.shops-listcategories', ['categories' => $categories])

            <div class="pt-3 text-2xl text-rqm-yellow">Advance Search</div>
            <div>
                <form action="{{route('search')}}" method="post">
                    {{csrf_field()}}
                    <div>
                        <label for="search" class="text-rqm-yellow-darkest block">Search Terms</label>
                        <input type="text" name="search" id="search" value="{{app('request')->input('query')}}" class="px-2 text-rqm-yellow bg-rqm-lighter border rounded w-full">
                    </div>
                    <div>
                        <label for="user" class="text-rqm-yellow-darkest block">User</label>
                        <input type="text" name="user" id="user" value="{{app('request')->input('user')}}" class="px-2 text-rqm-yellow bg-rqm-lighter border rounded w-full">
                    </div>
                    <div>
                        <label for="category" class="text-rqm-yellow-darkest block">Category</label>
                        <select id="category" name="category" class="bg-rqm-light border py-0.5 rounded text-rqm-yellow-dark w-full">
                            <option selected value="any">Any</option>
                            @foreach($categories as $category)
                                <option value="{{$category->name}}" @if(app('request')->input('category') == $category->name) selected @endif>{{$category->name}}</option>
                                @if($category -> children -> isNotEmpty())
                                    @foreach($category->children as $child)
                                        <option value="{{$child->name}}" @if(app('request')->input('category') == $child->name) selected @endif> > {{$child->name}}</option>
                                        @if($child -> children -> isNotEmpty())
                                            @foreach($child->children as $subChild)
                                                <option value="{{$subChild->name}}" @if(app('request')->input('category') == $subChild->name) selected @endif> >> {{$subChild->name}}</option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="product_type" class="text-rqm-yellow-darkest block">Type</label>
                        <select id="product_type" name="product_type" class="bg-rqm-light border py-0.5 rounded text-rqm-yellow-dark w-full">
                            <option selected value="all">All</option>
                            <!-- <option value="digital" @if(app('request')->input('type') == 'digital') selected @endif>Digital</option> -->
                            <option value="physical" @if(app('request')->input('type') == 'physical') selected @endif>Physical</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-rqm-yellow-darkest block">Price Range</label>
                        <input type="number" name="minimum_price" id="" value="{{app('request')->input('price_min')}}" step="0.01" placeholder="Minimum price USD" class="px-2 text-rqm-yellow bg-rqm-lighter border rounded w-full">
                        <input type="number" name="maximum_price" id="" value="{{app('request')->input('price_max')}}" step="0.01" placeholder="Maximum price USD" class="px-2 text-rqm-yellow mt-0.5 bg-rqm-lighter border rounded w-full">
                    </div>
                    <div>
                        <label for="order_by" class="text-rqm-yellow-darkest block">Order By</label>
                        <select id="order_by" name="order_by" class="bg-rqm-light border py-0.5 rounded text-rqm-yellow-dark w-full">
                            <option @if(app('request')->input('order_by') == 'price_asc' ||app('request')->input('order_by') == null) selected @endif value="price_asc">Price: Low to High</option>
                            <option @if(app('request')->input('order_by') == 'price_desc') selected @endif value="price_desc">Price: High to Low</option>
                            <option @if(app('request')->input('order_by') == 'newest') selected @endif value="newest">Newest</option>
                        </select>
                    </div>
                    <div class="p-2">
                        <button type="submit" class="bg-rqm-yellow-dark font-semibold rounded text-rqm-dark w-full">Search</button>
                    </div>
                </form>
            </div>

        </div>
        <div class="bg-rqm-dark w-4/5 relative">
            <div class="absolute inset-0 bg-repeat h-full opacity-10 w-full" style="background-image: url({{URL::asset('/media/bg.cleaned.png')}})">
                <span></span>
            </div>
            <div class="bg-rqm-dark my-5 opacity-95 shadow">
                <div class="w-full px-4 py-2">
                    <div class="bg-rqm-dark p-2">
                        <details class="mb-4" open>
                            <summary class="flex items-center justify-between text-rqm-yellow text-sm">
                                    <span class="mr-5">
                                        Welcome to Royal Queen Cannabis Market
                                    </span>
                                <hr class="flex-grow">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </summary>
                            <div class="m-2 text-justify text-sm text-white">
                                Welcome and we hope you enjoy your Cannabis sourcing experience with the House of Cannabis, Royal Queen Market.
                            </div>
                        </details>
                    </div>
                </div>
            </div>
            <div class="bg-rqm-dark my-5 opacity-95 shadow">
                <div class="w-full px-4 py-2">
                    <div class="bg-rqm-dark p-2">
                        <details class="mb-4" open>
                            <summary class="flex items-center justify-between text-rqm-yellow text-sm">
                                    <span class="mr-5">
                                        Announcement
                                    </span>
                                <hr class="w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </summary>
                            <div class="m-2 text-justify text-sm text-white">
                                We stand by behind the idea that our Cannabis Market will stand for Security, Fairness and Prosperity for all. With this, we would like to let you know that we are implementing the latest and safest multisig checkout process for the safety of all. We currently accept BTC and XMR for orders checkout. If you have other Crypto coins you want to use on payments, there are non KYC exchanges available for this purpose.
                            </div>
                        </details>
                    </div>
                </div>
            </div>
            <div class="bg-rqm-dark my-5 opacity-95 shadow">
                <div class="w-full px-4 py-2">
                    <div class="bg-rqm-dark p-2">
                        <details class="mb-4" open>
                            <summary class="flex items-center justify-between text-rqm-yellow text-sm">
                                    <span class="mr-5">
                                        Announcement
                                    </span>
                                <hr class="w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </summary>
                            <div class="m-2 text-justify text-sm text-white">
                                Please feel free to place your orders from any our approved vendors.<br>
                                If you are interested to become a vendor, please read our FAQ. <br><br>

                                We are currently on soft launch and some details may still need to be changed and upgraded.<br><br>

                                Feel free to drop us a message for any suggestions or ideas to make Royal Queen Market a better market for you and we will look into it.
                            </div>
                        </details>
                    </div>
                </div>
            </div>
            <div class="p-5">
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
                {{ $products -> links('tailwind-ui.includes.paginate') }}
            </div>
        </div>
    </div>
    <div class="flex justify-center w-full">
        <div class="pl-10 w-1/6 h-full">
            <span></span>
        </div>
        <div class="flex h-full justify-center pl-10 w-5/6">
            <img src="{{URL::asset('/media/bottom-separator-1.png')}}" class="h-1/3 transform w-2/4" alt="">
        </div>
    </div>
@endsection
