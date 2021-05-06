<div class="relative bg-rqm-dark flex flex-wrap justify-center rounded shadow w-full h-full">
    <div class="absolute inset-0 bg-repeat h-full opacity-10 w-full" style="background-image: url({{URL::asset('/media/bg.cleaned.png')}})">
        <span></span>
    </div>
    <div class="z-20 p-10 w-full">
        <table class="table-auto w-full">
            <thead class="border-b border-rqm-yellow-dark">
            <tr>
                <th class="px-2 text-center text-left text-rqm-yellow">ID</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Product</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Quantity</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Buyer</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Vendor</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Total</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Time</th>
            </tr>
            </thead>
            <tbody>
            @foreach($purchases as $index => $purchase)
                <tr class="@if(!($index % 2)) bg-rqm-light @endif">
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">{{ $purchase -> short_id }}</td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        <div class="flex">
                            <a href="{{ route('product.show', $purchase -> offer -> product) }}" class="underline">
                                {{ $purchase -> offer -> product -> name }}
                            </a>
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
                        <a href="{{route('admin.users.view',['user'=>$purchase->vendor->user->id])}}" class="underline">
                            @if($purchase->vendor->user)
                                {{$purchase->vendor->user->username}}
                            @else
                                <span class="text-gray-500">Vendor deleted account!</span>
                                <span class="flex items-center px-3 text-yellow-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </span>
                            @endif
                        </a>
                    </td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        @include('includes.currency', ['usdValue' => $purchase -> value_sum])
                    </td>
                    <td class="border-gray-600 px-2 py-2 text-gray-400">
                        {{ $purchase -> created_at -> diffForHumans() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $purchases -> links('tailwind-ui.includes.paginate') }}
    </div>
</div>
