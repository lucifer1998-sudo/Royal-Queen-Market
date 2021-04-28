<div class="bg-rqm-dark @if(! auth() -> user() -> whishes -> isNotEmpty() ) content-center @endif flex flex-wrap justify-center p-10 rounded shadow w-full h-full">
    @if(! auth() -> user() -> whishes -> isNotEmpty() )
        <div class="flex items-center justify-center w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
            </svg>
            <span>You don't have any wishlist.</span>
        </div>
    @else
        <div class="w-full">
            <table class="table-auto w-full">
                <thead class="border-b border-rqm-yellow-dark">
                <tr>
                    <th class="px-2 text-center text-left text-rqm-yellow">Product</th>
                    <th class="px-2 text-center text-left text-rqm-yellow">Price</th>
                    <th class="px-2 text-center text-left text-rqm-yellow">Posted by</th>
                    <th class="px-2 text-center text-left text-rqm-yellow">Remaining</th>
                </tr>
                </thead>
                <tbody>
                @foreach(auth() -> user() -> whishes() ->orderByDesc('created_at') -> get() as $index => $wish)
                    <tr class="@if(!($index % 2)) bg-rqm-light @endif">
                        <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                            <div class="flex items-center">
                                <img class="w-10 h-10" src="{{ asset('storage/'  . $wish->product -> frontImage() -> image) }}" alt="{{ $wish->product -> name }}">
                                <span class="pl-5">{{ $wish->product->name }}</span>
                            </div>
                        </td>
                        <td class="border-gray-600 border-r px-2 py-2 text-gray-400 text-center">
                            {{ $wish->product->getLocalPriceFrom() }} {{ \App\Marketplace\Utility\CurrencyConverter::getLocalSymbol() }}
                        </td>
                        <td class="border-gray-600 border-r px-2 py-2 text-gray-400 text-center">
                            <a href="{{ route('vendor.show', $wish->product->user) }}">{{ $wish->product->user->username }}</a>
                        </td>
                        <td class="border-gray-600 px-2 py-2 text-gray-400 text-center">{{ $wish->product->quantity }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
