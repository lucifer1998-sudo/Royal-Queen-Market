

@extends('tailwind-ui.master.main')

@section('title','Vendors')

@section('content')
    <div class="pt-20 w-full">
        <div class="w-full">
            @if(session()->has('success'))
                @include('tailwind-ui.includes.success', ['strongMessage' => 'Success', 'message' => session()->get('success')])
            @elseif(session()->has('error'))
                @include('tailwind-ui.includes.warning', ['strongMessage' => 'Warning', 'message' => session()->get('error')])
            @elseif(session()->has('errormessage'))
                @include('tailwind-ui.includes.warning', ['strongMessage' => 'Warning', 'message' => session()->get('errormessage')])
            @endif
            <div class="text-2xl text-rqm-yellow">
                Total @include('includes.currency', ['usdValue' => $totalSum])
            </div>
            <div class="py-2">
                <div class="flex">
                    <a href="{{ route('profile.cart') }}" class="bg-rqm-yellow font-black mr-2 px-2 py-2 rounded text-rqm-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <form action="{{ route('profile.cart.make.purchases') }}">
                        {{--<input type="hidden" name="cointype" value="btc">--}}
                        <button type="submit" class="bg-rqm-yellow font-black px-4 py-2 rounded text-rqm-dark">
                            Purchase
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <table class="table-auto w-full">
            <thead class="border-b border-rqm-yellow-dark">
            <tr>
                <th class="px-2 text-left text-rqm-yellow">Product</th>
                <th class="px-2 text-left text-rqm-yellow">Quantity</th>
                <th class="px-2 text-left text-rqm-yellow">Price</th>
                <th class="px-2 text-left text-rqm-yellow">Paying with</th>
                <th class="px-2 text-left text-rqm-yellow">Payment type & Shipping</th>
                <th class="px-2 text-left text-rqm-yellow">Total</th>
                <th class="px-2 text-left text-rqm-yellow">Message</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $productId => $item)
                <tr class="bg-rqm-light">
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        <div class="flex">
                            <a href="{{ route('product.show', $productId) }}">{{ $item -> offer -> product -> name }}</a>
                        </div>
                    </td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">{{ $item -> quantity }}</td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">@include('includes.currency', ['usdValue' => $item -> offer -> price])</td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">{{ strtoupper(\App\Purchase::coinDisplayName($item -> coin_name)) }}</td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        <span>{{ \App\Purchase::$types[$item->type] }}</span>
                        @if($item -> shipping)
                            {{ $item -> shipping -> name }} -
                            @include('includes.currency', ['usdValue' => $item -> shipping -> price])
                        @else
                            <span>Digital delivery</span>
                        @endif
                    </td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        <div class="flex">
                            @include('includes.currency', ['usdValue' => $item -> value_sum])
                        </div>
                    </td>
                    <td class="border-gray-600 px-2 py-2 text-gray-400">
                        @if($item -> message)
                            @if(\App\Message::messageEncrypted($item -> message))
                                <textarea class="form-control"  readonly rows="5">{{ $item -> message }}</textarea>
                            @else
                                <p class="text-muted">
                                    {{ $item -> message }}
                                </p>

                            @endif
                        @else
                            <span class="badge badge-info">No message</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
