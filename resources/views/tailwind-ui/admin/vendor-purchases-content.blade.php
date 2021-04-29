<div class="relative bg-rqm-dark flex flex-wrap justify-center rounded shadow w-full h-full">
    <div class="absolute inset-0 bg-repeat h-full opacity-10 w-full" style="background-image: url({{URL::asset('/media/bg.cleaned.png')}})">
        <span></span>
    </div>
    <div class="z-20 p-10 w-full">
        <table class="table-auto w-full">
            <thead class="border-b border-rqm-yellow-dark">
            <tr>
                <th class="px-2 text-center text-left text-rqm-yellow">Vendor</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Coin</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Amount</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Address</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Paid at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($vendors as $vendor)
                @foreach($vendor->user->vendorPurchases as $index => $vendorPurchase)
                    <tr class="@if(!($index % 2)) bg-rqm-light @endif">
                        <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                            <div class="flex">
                                {{$vendor->user->username}}
                            </div>
                        </td>
                        <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                            <div class="flex">
                                {{ strtoupper($vendorPurchase -> coin) }}
                            </div>
                        </td>
                        <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                            <div class="flex">
                                {{ $vendorPurchase -> amount }}
                            </div>
                        </td>
                        <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                            <div class="flex">
                                {{ $vendorPurchase -> address }}
                            </div>
                        </td>
                        <td class="border-gray-600 px-2 py-2 text-gray-400">
                            {{ $vendorPurchase -> updated_at -> diffForHumans() }}
                        </td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
        {{ $vendors -> links('tailwind-ui.includes.paginate') }}
    </div>
</div>
