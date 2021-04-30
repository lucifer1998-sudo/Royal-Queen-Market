@extends('tailwind-ui.master.main')

@section('title','Vendors')

@section('content')
    <div class="pt-10 px-40 w-full">
        <div class="bg-rqm-light px-2 py-2 shadow text-rqm-yellow">
            <a href="{{ route('home') }}"><span>Products</span></a> /
            @foreach($product -> category -> parents() as $ancestor)
                <a href="{{ route('category.show', $ancestor) }}"><span>{{ $ancestor -> name }}</span></a> /
            @endforeach
            <a href="{{ route('category.show', $product -> category) }}"><span>{{ $product -> category -> name }}</span></a>
        </div>
        <div class="bg-rqm-light flex px-2 py-2 shadow text-rqm-yellow">

                {{ csrf_field() }}
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
                    <div class="flex w-full">
                        <div class="w-1/2">
                            <div>
                                <div class="text-2xl w-full">{{ $product -> name }}</div>
                                <small class="flex items-center w-full">
                                    <div>Quality</div>
                                    @php
                                        $stars = (int) $product->avgRate('quality_rate');
                                    @endphp
                                    @for($i = 1; $i<= $stars; $i++)
                                        <div class="mx-1">
                                            <div class="overflow-hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            </div>
                                        </div>
                                    @endfor
                                    {{--half star--}}
                                    @if(($stars - round($stars, 0)) != 0)
                                        <div class="mx-1">
                                            <div class="overflow-hidden w-1/2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            </div>
                                        </div>
                                    @endif
                                    {{--line star--}}
                                    @for($i = 1; $i<= 5 -$stars; $i++)
                                        <div class="mx-1">
                                            <div class="overflow-hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                                </svg>
                                            </div>
                                        </div>
                                    @endfor
                                </small>
                                <small class="bg-rqm-yellow-darkest font-black items-center px-1 rounded-2xl text-rqm-dark">
                                    {{ ucfirst($product -> type) }}
                                </small>
                                <small class="flex items-center w-full">
                                    @if($product->user->vendor->experience < 0)
                                        Vendor has Negative experience, trade with caution !
                                    @elseif($product->user->vendor->experience == 0)
                                        Vendor has no experience, trade with caution !
                                    @endif
                                </small>
                                <div class="py-2">
                                    <div>Offers</div>
                                    <div>
                                        <ul class="px-2">
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
                                    <div>Coins</div>
                                    <div class="px-2">
                                        @foreach($product -> getCoins() as $coin)
                                            <span class="">{{ strtoupper(\App\Purchase::coinDisplayName($coin)) }}</span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="py-2">
                                    <div>Available</div>
                                    <div class="px-2">
                                        {{ $product -> quantity }} {{ str_plural($product -> mesure, $product -> quantity) }}
                                    </div>
                                </div>
                                <div class="py-2">
                                    <div>Sold</div>
                                    <div class="px-2">
                                        {{ $product -> numberOfPurchases() }} {{ str_plural($product -> mesure, $product -> orders) }}
                                    </div>
                                </div>
                                <div class="py-2">
                                    <div>Delivery Method</div>
                                    <div class="px-2">
                                        <select name="delivery" id="delivery"
                                                class="bg-rqm-dark form-control form-control-sm py-1 rounded">
                                            @foreach($product -> specificProduct() -> shippings as $shipping)
                                                <option value="{{ $shipping -> id }}">{{ $shipping -> long_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-1/2">
                            <div>
                                <div class="flex text-rqm-yellow-darkest">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                    <span class="mx-2">Shop with confidence</span>
                                </div>
                                <div>
                                    <span>You are Escrow protected for each product in the market!</span>
                                </div>
                            </div>
                            <div class="py-2">
                                <span>Seller information</span>
                                <div class="px-4">
                                    <a href="{{ route('vendor.show', $product -> user) }}" class="flex">
                                        {{ $product -> user -> username }} lvl. {{$product->user->vendor->getLevel()}}
                                    </a>
                                    @php
                                        $vendor = $product->user;
                                    @endphp
                                    <div class="flex">
                                        <span class="bg-rqm-dark flex shadow text-xs" aria-label="Positive Feedback" aria-describedby="test">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 5c7.18 0 13 5.82 13 13M6 11a7 7 0 017 7m-6 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                            </svg>
                                            {{$vendor->vendor->countFeedbackByType('positive')}}
                                        </span>
                                        <span class="bg-rqm-dark flex mx-2 shadow text-gray-100 text-xs">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 5c7.18 0 13 5.82 13 13M6 11a7 7 0 017 7m-6 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                            </svg>
                                            {{$vendor->vendor->countFeedbackByType('neutral')}}
                                        </span>
                                        <span class="bg-rqm-dark flex shadow text-rqm-yellow-darkest text-xs">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 5c7.18 0 13 5.82 13 13M6 11a7 7 0 017 7m-6 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                            </svg>
                                            {{$vendor->vendor->countFeedbackByType('negative')}}
                                        </span>
                                    </div>
                                    <div class="flex">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                            </svg>
                                            <a href="{{ route('profile.messages').'?otherParty='.$product -> user ->username}}" class="px-2 text-sm">Send message</a>
                                        </div>
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <a href="{{route('search',['user'=>$product->user->username])}}" class="px-2 text-sm">Seller's products ({{$product -> user ->products()->count()}})</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
@endsection
