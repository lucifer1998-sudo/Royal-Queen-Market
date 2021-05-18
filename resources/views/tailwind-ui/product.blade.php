@extends('tailwind-ui.master.main')

@section('title', 'Product')

@section('content')
    <div class="pt-10 px-40 w-full rounded">
        <div class="bg-rqm-light px-2 py-2 shadow text-rqm-yellow">
            <a href="{{ route('home') }}"><span>Products</span></a> /
            @foreach($product -> category -> parents() as $ancestor)
                <a href="{{ route('category.show', $ancestor) }}"><span>{{ $ancestor -> name }}</span></a> /
            @endforeach
            <a href="{{ route('category.show', $product -> category) }}"><span>{{ $product -> category -> name }}</span></a>
        </div>
        <div class="bg-rqm-light flex px-2 py-2 shadow text-rqm-yellow">
                <div class="w-1/3">
                    <div class="h-80 overflow-x-hidden overflow-y-hidden rounded w-80">
                        @php $i = 1; @endphp
                        @foreach($product -> images() -> orderBy('first', 'desc') -> get() as $image)
                            <div id="slide-{{ $i++ }}" class="h-full w-full">
                                <img class="h-full object-cover w-full" src="{{ asset('storage/' . $image -> image) }}">
                            </div>
                        @endforeach
                    </div>
                    <div class="flex justify-center py-3 w-80">
                        @php $i = 1; @endphp
                        @foreach($product -> images as $image)
                            <a href="#slide-{{ $i }}">
                                <span class="bg-rqm-dark items-center mx-2 px-2 rounded-full shadow text-center">{{ $i++ }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
                <form action="{{ route('profile.cart.add', $product) }}"  method="POST" class="w-2/3">
                    {{ csrf_field() }}
                    <div class="flex w-full">
                        <div class="w-1/2">
                            <div>
                                <div class="w-full">
                                    @if(session()->has('success'))
                                        @include('tailwind-ui.includes.success', ['strongMessage' => 'Success', 'message' => session()->get('success')])
                                    @elseif(session()->has('error'))
                                        @include('tailwind-ui.includes.warning', ['strongMessage' => 'Warning', 'message' => session()->get('error')])
                                    @elseif(session()->has('errormessage'))
                                        @include('tailwind-ui.includes.warning', ['strongMessage' => 'Warning', 'message' => session()->get('errormessage')])
                                    @endif
                                </div>
                                <div class="text-2xl w-full">{{ $product -> name }}</div>
                                <small class="flex items-center w-full">
                                    <div class="text-rqm-white">Rating</div>
                                    @php
                                        $stars = (int) $product->avgRate('quality_rate');
                                    @endphp
                                    @for($i = 1; $i<= $stars; $i++)
                                        <div class="mx-1 text-rqm-white">
                                            <div class="overflow-hidden text-rqm-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            </div>
                                        </div>
                                    @endfor
                                    {{--half star--}}
                                    @if(($stars - round($stars, 0)) != 0)
                                        <div class="mx-1">
                                            <div class="overflow-hidden w-1/2 text-rqm-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            </div>
                                        </div>
                                    @endif
                                    {{--line star--}}
                                    @for($i = 1; $i<= 5 -$stars; $i++)
                                        <div class="mx-1">
                                            <div class="overflow-hidden text-rqm-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                                </svg>
                                            </div>
                                        </div>
                                    @endfor
                                </small>
                            
                                <small class="flex items-center w-full text-rqm-white">
                                    @if($product->user->vendor->experience < 0)
                                        This Vendor has currently been rated Negatively by its Buyers.. Please deal with this vendor with Caution!
                                    @elseif($product->user->vendor->experience == 0)
                                        This Vendor has no "Completed" orders yet. 
                                    @endif
                                </small>
                                <div class="py-2">
                                    <div class="text-rqm-yellow">Listing Prices</div>
                                    <div>
                                        <ul class="px-2 text-rqm-white">
                                            @foreach($product -> offers as $offer)
                                                <li>
                                                    <strong>@include('includes.currency', ['usdValue' => $offer -> dollars])</strong> per {{ str_plural($product -> mesure, 1) }},
                                                    for at least {{ $offer -> min_quantity }} {{ str_plural('product', $offer -> min_quantity) }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <div>Crypto Accepted</div>
                                    <div class="px-2 text-rqm-white">
                                        @foreach($product -> getCoins() as $coin)
                                            <span class="">{{ strtoupper(\App\Purchase::coinDisplayName($coin)) }}</span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="py-2">
                                    <div>Units Available</div>
                                    <div class="px-2 text-rqm-white">
                                        {{ $product -> quantity }} {{ str_plural($product -> mesure, $product -> quantity) }}
                                    </div>
                                </div>
                                <div class="py-2">
                                    <div>Completed Orders</div>
                                    <div class="px-2 text-rqm-white">
                                        {{ $product -> numberOfPurchases() }} {{ str_plural($product -> mesure, $product -> orders) }}
                                    </div>
                                </div>
                                <div class="py-2">
                                    <div>Shipping Options</div>
                                    <div class="px-2 text-rqm-white">
                                        <select name="delivery" id="delivery"
                                                class="bg-rqm-dark py-1 rounded w-full">
                                            @foreach($product -> specificProduct() -> shippings as $shipping)
                                                <option value="{{ $shipping -> id }}">{{ $shipping -> long_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <div>Pay with Coin</div>
                                    <div class="px-2 text-rqm-white">
                                        @if(count($product -> getCoins()) > 1)
                                            <select name="coin" id="coin" class="bg-rqm-dark form-control form-control-sm py-1 rounded w-full">
                                                @foreach($product -> getCoins() as $coin)
                                                    <option value="{{ $coin }}">{{ strtoupper(\App\Purchase::coinDisplayName($coin)) }}</option>
                                                @endforeach
                                            </select>
                                        @elseif(count($product -> getCoins()) == 1)
                                            <span>{{ strtoupper(\App\Purchase::coinDisplayName($product -> getCoins()[0])) }}</span>
                                            <input type="hidden" name="coin" value="{{ $product -> getCoins()[0] }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="py-2">
                                    <div>Purchase Type</div>
                                    <div class="px-2 text-rqm-white">
                                        @if(count($product -> getTypes()) > 1)
                                            <select name="type" id="type" class="bg-rqm-dark form-control form-control-sm py-1 rounded w-full">
                                                @foreach($product -> getTypes() as $type)
                                                    <option value="{{ $type }}">{{ \App\Purchase::$types[$type] }}</option>
                                                @endforeach
                                            </select>
                                        @elseif(count($product -> getTypes()) == 1)
                                            <span>{{ \App\Purchase::$types[$product -> getTypes()[0]] }}</span>
                                            <input type="hidden" name="type" value="{{ $product -> getTypes()[0] }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="py-2 ">
                                    <div>Quantity</div>
                                    <div class="px-2 text-rqm-white">
                                        <input type="number" min="1" name="amount" id="amount"
                                               value="1"
                                               max="{{ $product -> quantity }}"
                                               class="bg-rqm-dark px-2 py-1 rounded w-full"
                                               placeholder="Amount of {{ str_plural($product -> mesure) }}"/>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <div class="flex">
                                        <button type="submit" class="bg-rqm-yellow font-black px-2 py-1 rounded text-rqm-dark">
                                            Add to Cart
                                        </button>
                                        @auth
                                            @if(auth() -> user() -> isWhishing($product))
                                                <a href="{{ route('profile.wishlist.add', $product) }}"
                                                   class="bg-rqm-yellow font-black px-2 py-1 rounded text-rqm-dark mx-2">
                                                    Remove from Wishlist
                                                </a>
                                            @else
                                                <a href="{{ route('profile.wishlist.add', $product) }}"
                                                   class="bg-rqm-yellow font-black px-2 py-1 rounded text-rqm-dark mx-2">
                                                    Add to Wishlist
                                                </a>
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-1/2">
                            <div class="py-2">
                                <span>Vendor Information</span>
                                <div class="px-4 text-rqm-white">
                                    <a href="{{ route('vendor.show', $product -> user) }}" class="flex">
                                        {{ $product -> user -> username }} lvl. {{$product->user->vendor->getLevel()}}
                                    </a>
                                    @php
                                        $vendor = $product->user;
                                    @endphp

                                    <div class="flex">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                            </svg>
                                            <a href="{{ route('profile.messages').'?otherParty='.$product -> user ->username}}" class="px-2 text-sm text-rqm-yellow-darkest">Message Vendor</a>
                                        </div>
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <a href="{{route('search',['user'=>$product->user->username])}}" class="px-2 text-sm text-rqm-yellow-darkest">View Store ({{$product -> user ->products()->count()}})</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <div style='border-bottom: 2px solid #eaeaea'>
                            <ul class='flex cursor-pointer'>
                                <a href="{{ route('product.show', $product) }}#productsmenu">
                                    <li class="@isroute('product.show') bg-rqm-dark @endisroute @isnotroute('product.show') bg-gray-200 text-rqm-dark bg-white @endisnotroute px-6 py-2 rounded-t-lg">Details</li>
                                </a>
                                <a href="{{ route('product.rules', $product) }}#productsmenu">
                                    <li class="@isroute('product.rules') bg-rqm-dark @endisroute @isnotroute('product.rules') bg-gray-200 text-rqm-dark bg-white @endisnotroute px-6 py-2 rounded-t-lg">Payment rules</li>
                                </a>
                                <a href="{{ route('product.feedback', $product) }}#productsmenu">
                                    <li class="@isroute('product.feedback') bg-rqm-dark @endisroute @isnotroute('product.feedback') bg-gray-200 text-rqm-dark bg-white @endisnotroute px-6 py-2 rounded-t-lg">Feedback</li>
                                </a>
                                @if($product -> isPhysical())
                                <a href="{{ route('product.delivery', $product) }}#productsmenu">
                                    <li class="@isroute('product.delivery') bg-rqm-dark @endisroute @isnotroute('product.delivery') bg-gray-200 text-rqm-dark bg-white @endisnotroute px-6 py-2 rounded-t-lg">Delivery</li>
                                </a>
                                @endif
                                @if(Auth::user()->id == $product->user->id)
                                    <a href="{{ route('product.coupon', $product) }}#productsmenu">
                                        <li class="@isroute('product.coupon') bg-rqm-dark @endisroute @isnotroute('product.coupon') bg-gray-200 text-rqm-dark bg-white @endisnotroute px-6 py-2 rounded-t-lg">Coupons</li>
                                    </a>
                                @endif
                            </ul>
                        </div>
                        <div class="px-4 py-10 w-full text-rqm-white">
                            @isroute('product.show')
                            {!! $product -> description !!}
                            @endisroute

                            @isroute('product.rules')
                            {!! $product -> rules !!}
                            @endisroute

                            @isroute('product.feedback')
                            @if($product -> hasFeedback())
                                <h3 class="mb-3">Feedback ({{ count($product -> feedback) }})</h3>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Quality rate ({{ $product -> avgRate('quality_rate') }})</th>
                                        <th>Communication rate ({{ $product -> avgRate('communication_rate') }})</th>
                                        <th>Shipping rate ({{ $product -> avgRate('shipping_rate') }})</th>
                                        <th>Comment</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($product -> feedback as $feedback)
                                        <tr>
                                            <td>
                                                @include('includes.purchases.stars', ['stars' => $feedback -> quality_rate])
                                            </td>
                                            <td>
                                                @include('includes.purchases.stars', ['stars' => $feedback -> communication_rate])
                                            </td>
                                            <td>
                                                @include('includes.purchases.stars', ['stars' => $feedback -> shipping_rate])
                                            </td>
                                            <td>
                                                {{ $feedback -> comment }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            @else
                                <div class="alert alert-warning">There is no available feedback for this product, yet.</div>
                            @endif
                            @endisroute

                            @isroute('product.delivery')
                            <p class="text-white">Ships {{ $product -> specificProduct() -> shipsTo() }}: <em>{{ $product -> specificProduct() -> countriesLong() }}</em></p>
                            <p class="text-white">Ships from <strong>{{ $product -> specificProduct() -> shipsFrom() }}</p></strong>
                            <table class="table-auto w-full">
                                <thead>
                                <tr>
                                    <th class="px-2 text-left text-rqm-yellow">Delivery name</th>
                                    <th class="px-2 text-left text-rqm-yellow">Duration</th>
                                    <th class="px-2 text-left text-rqm-yellow">Price</th>
                                    <th class="px-2 text-left text-rqm-yellow">Quantity</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product -> specificProduct() -> shippings as $shipping)
                                    <tr>
                                        <td class="border-gray-600 border-r px-2 py-2 text-gray-400">{{ $shipping -> name }}</td>
                                        <td class="border-gray-600 border-r px-2 py-2 text-gray-400">{{ $shipping -> duration }}</td>
                                        <td class="border-gray-600 border-r px-2 py-2 text-gray-400">@include('includes.currency', ['usdValue' => $shipping -> dollars ])</td>
                                        <td class="border-gray-600 px-2 py-2 text-gray-400">{{ $shipping -> from_quantity }} to {{ $shipping -> to_quantity }} {{ str_plural($product -> mesure) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @endisroute

                            @isroute('product.coupon')
                            <table class="table table-hover table-striped text-white">
                                <thead>
                                <tr>
                                    <th scope="col">Code</th>
                                    <th scope="col">Discount Price</th>
                                    <th scope="col">Expiration Date</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($coupon as $c)
                                    <tr>
                                        <td>{{ $c-> code }}</td>
                                        <td>@include('includes.currency', ['usdValue' => $c -> data -> get ('price') ])</td>
                                        <td>{{ $c -> expires_at }}</td>

                                    </tr>
                                @endforeach
                                <tr>
                                    <form method="POST" action="{{ route('product.coupon.generate', $product) }}">
                                        @csrf
                                        <td><input type="text" name="cValue" class="form-control" placeholder="Discount in {{ \App\Marketplace\Utility\CurrencyConverter::getLocalSymbol() }}"></td>
                                        <td><input type="number" step="1" min="1" class="form-control" name="qty" placeholder="Quantity"></td>
                                        <td><input type="number" class="form-control" name="duration" placeholder="Duration in days"></td>
                                        <td><button type="submit" class="btn btn-outline-success">Generate Coupon</button></td>
                                    </form>
                                </tr>
                                </tbody>
                            </table>
                            @endisroute
                        </div>
                    </div>
                </form>
        </div>
    </div>
@endsection
