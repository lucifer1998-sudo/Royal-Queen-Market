@extends('tailwind-ui.master.main')

@section('title','Vendors')

@section('content')
    <div class="pt-20 w-full">
        <div class="w-full">
            <div class="text-2xl text-rqm-yellow">
                Total @include('includes.currency', ['usdValue' => $totalSum])
            </div>
            <div></div>
        </div>
        @foreach($items as $productId => $item)
        <form action="{{ route('profile.cart.add', \App\Product::find($productId)) }}" method="POST" class="my-2">
            {{ csrf_field() }}
            <div class="bg-rqm-dark p-5 rounded shadow">
                <div class="grid grid-cols-5 gap-4">
                    <div>
                        <div class="text-2xl text-rqm-yellow-dark">
                            <a href="{{ route('product.show', $item -> offer -> product) }}">{{ $item -> offer -> product -> name }}</a>
                        </div>
                        <div class="text-rqm-yellow-dark text-sm">by {{ $item -> vendor -> user -> username }}</div>
                        <span class="font-semibold text-rqm-yellow">@include('includes.currency', ['usdValue' => $item -> offer -> price]) per item</span>
                    </div>
                    <div class="items-center text-rqm-yellow">
                        <span class="flex">Coin</span>
                        @if(count($item -> offer -> product -> getCoins()) > 1)
                            <select name="coin" id="coin" class="bg-rqm-light px-1 py-1 w-full rounded">
                                @foreach($item -> offer -> product -> getCoins() as $coin)
                                    <option value="{{ $coin }}" {{ $coin == $item -> coin_name ? 'selected' : ''}} >{{ strtoupper(\App\Purchase::coinDisplayName($coin)) }}</option>
                                @endforeach
                            </select>
                        @elseif(count($item -> offer -> product -> getCoins()) == 1)
                            <input type="hidden" name="coin" value="{{ $item -> offer -> product -> getCoins()[0] }}">
                            <input type="text" value="{{ strtoupper(\App\Purchase::coinDisplayName($item -> offer -> product -> getCoins()[0])) }}" class="bg-rqm-light p-1 rounded w-full" disabled>
                        @endif
                        <div class="flex py-1">
                            <input type="text" name="coupon_code" class="bg-rqm-light p-1 rounded w-full" placeholder="Coupon Code">
                            <button type="submit" value="coupon_btn" class="text-xs" name="submit">Add Coupon</button>
                        </div>
                    </div>
                    <div class="text-rqm-yellow">
                        <span class="flex">Quantity</span>
                        <input type="number" class="bg-rqm-light p-1 rounded w-full" name="amount" id="amount" min="1" max="{{ $item -> offer -> product -> quantity }}" placeholder="Quantity" value="{{ $item -> quantity }}"/>
                    </div>
                    <div class="text-rqm-yellow">
                        <span class="flex">Delivery/Payment</span>
                        @if($item -> offer -> product -> isPhysical())
                            <select name="delivery" id="delivery" class="bg-rqm-light px-1 py-1 w-full rounded">
                                @foreach($item -> offer -> product -> specificProduct() -> shippings as $shipping)
                                    <option value="{{ $shipping -> id }}" @if($shipping -> id == $item -> shipping -> id) selected @endif>{{ $shipping -> long_name }}</option>
                                @endforeach
                            </select>
                        @else
                            <span>Digital delivery</span>
                        @endif
                        <br>
                        @if(count($item -> offer -> product -> getTypes()) > 1)
                            <select name="type" id="type" class="bg-rqm-light px-1 py-1 w-full rounded">
                                @foreach($item -> offer -> product -> getTypes() as $type)
                                    <option value="{{ $type }}" {{ $type == $item -> type ? 'selected' : ''}} >{{ \App\Purchase::$types[$type] }}</option>
                                @endforeach
                            </select>
                        @elseif(count($item -> offer -> product -> getTypes()) == 1)
                            <input type="hidden" name="type" value="{{ $item -> offer -> product -> getTypes()[0] }}">
                            {{ \App\Purchase::$types[$item -> offer -> product -> getTypes()[0]]  }}
                        @endif
                    </div>
                    <div class="text-rqm-yellow">
                        <span class="flex">Message</span>
                        <textarea name="message" id="message" rows="3" class="bg-rqm-light p-1 rounded w-full" placeholder="Message will be encrypted">{{ $item -> message }}</textarea>
                    </div>
                </div>
                <div class="w-full flex justify-end">
                    <div>
                        <button type="submit" class="rounded bg-rqm-yellow flex font-extrabold items-center px-2 py-1 text-rqm-dark" value="edit" name="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 mx-1 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
                            </svg>
                            Update
                        </button>
                    </div>
                    <div class="ml-2">
                        <a href="{{ route('profile.cart.remove', $productId) }}" class="rounded bg-rqm-yellow flex font-extrabold items-center px-2 py-1 text-rqm-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 mx-1 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Remove
                        </a>
                    </div>
                </div>
            </div>
        </form>
        @endforeach
    </div>
@endsection
