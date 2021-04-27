<div class="bg-rqm-dark @if(count($sales) == 0) content-center @endif flex flex-wrap justify-center p-10 rounded shadow w-full h-full">
    @if(count($sales) == 0)
    <div class="flex items-center justify-center w-full">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <span>You don't have any sales.</span>
    </div>
    @else
        <div class="w-full">
            <div class="mb-5">
                <div class="grid grid-flow-col grid-cols-5 grid-rows-1 gap-4">
                    <div class="flex justify-center p-2">
                        <a href="{{ route('profile.sales') }}" class="bg-rqm-yellow flex justify-center md:w-4/5 py-1 rounded-full text-rqm-dark text-white w-2/3">
                            <button>All ({{ auth() -> user() -> vendor -> salesCount() }})</button>
                        </a>
                    </div>
                    <div class="flex justify-center p-2">
                        <a href="{{ route('profile.sales', 'purchased') }}" class="border border-rqm-yellow flex justify-center md:w-4/5 py-1 rounded-full text-white w-2/3">
                            <button>Purchased ({{ auth() -> user() -> vendor -> salesCount('purchased') }})</button>
                        </a>
                    </div>
                    <div class="flex justify-center p-2">
                        <a href="{{ route('profile.sales', 'sent') }}" class="border border-rqm-yellow flex justify-center md:w-4/5 py-1 rounded-full text-white w-2/3">
                            <button>Sent ({{ auth() -> user() -> vendor -> salesCount('sent') }})</button>
                        </a>
                    </div>
                    <div class="flex justify-center p-2">
                        <a href="{{ route('profile.sales', 'delivered') }}" class="border border-rqm-yellow flex justify-center md:w-4/5 py-1 rounded-full text-white w-2/3">
                            <button>Delivered ({{ auth() -> user() -> vendor -> salesCount('delivered') }})</button>
                        </a>
                    </div>
                    <div class="flex justify-center p-2">
                        <a href="{{ route('profile.sales', 'disputed') }}" class="border border-rqm-yellow flex justify-center md:w-4/5 py-1 rounded-full text-white w-2/3">
                            <button>Disputed ({{ auth() -> user() -> vendor -> salesCount('disputed') }})</button>
                        </a>
                    </div>
                </div>
            </div>
            <table class="table-auto w-full">
                <thead class="border-b border-rqm-yellow-dark">
                <tr>
                    <th class="px-2 text-center text-left text-rqm-yellow">Product</th>
                    <th class="px-2 text-center text-left text-rqm-yellow">Quantity</th>
                    <th class="px-2 text-center text-left text-rqm-yellow">Buyer</th>
                    <th class="px-2 text-center text-left text-rqm-yellow">Shipping</th>
                    <th class="px-2 text-center text-left text-rqm-yellow">Total</th>
                    <th class="px-2 text-center text-left text-rqm-yellow">Address</th>
                    <th class="px-2 text-center text-left text-rqm-yellow">ID</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sales as $index => $purchase)
                    <tr class="@if(!($index % 2)) bg-rqm-light @endif">
                        <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                            <div class="flex">
                                <a href="{{ route('product.show', $purchase -> offer -> product) }}" class="underline">
                                    {{ $purchase -> offer -> product -> name }}
                                </a>
                                @if($purchase -> isDisputed() && $purchase -> dispute -> isResolved())
                                    <span class="flex items-center px-3 text-green-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td class="border-gray-600 border-r px-2 py-2 text-gray-400">{{ $purchase -> quantity }}</td>
                        <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                            <div class="flex">
                                @if($purchase -> buyer)
                                    {{ $purchase -> buyer -> username }}
                                @else
                                    <span class="text-gray-500">User deleted account!</span>
                                    <span class="flex items-center px-3 text-yellow-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                            @if($purchase -> shipping)
                                {{ $purchase -> shipping -> name }} - @include('includes.currency', ['usdValue' => $purchase -> shipping -> price])
                            @else
                                Digital delivery
                            @endif
                        </td>
                        <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                            @include('includes.currency', ['usdValue' => $purchase -> value_sum])
                        </td>
                        <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                            <div><p class="truncate w-40">{{ $purchase -> address }}</p></div>
                        </td>
                        <td class="border-gray-600 px-2 py-2 text-gray-400">
                            <div>
                                <a href="{{ route('profile.sales.single', $purchase) }}" class="underline">
                                    @if($purchase->isCanceled()) <em>Canceled</em> @else {{ $purchase -> short_id }} @endif
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
