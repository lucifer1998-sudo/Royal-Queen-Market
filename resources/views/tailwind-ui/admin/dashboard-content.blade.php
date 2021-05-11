<div class="relative bg-rqm-dark flex flex-wrap justify-center rounded shadow w-full h-full">
    <div class="absolute inset-0 bg-repeat h-full opacity-10 w-full" style="background-image: url({{URL::asset('/media/bg.cleaned.png')}})">
        <span></span>
    </div>
    <div class="z-20 gap-4 grid grid-cols-3 p-10 w-full">
        <div class="bg-rqm-light hover:bg-rqm-dark hover:grow rounded-2xl shadow-2xl">
            <div class="flex font-bold h-1/3 justify-center py-10 text-2xl text-center text-white">Total Products in the Market</div>
            <div class="flex font-bold h-2/3 items-center justify-center text-5xl text-center text-rqm-yellow-dark">{{ $total_products }}</div>
        </div>
        <div class="bg-rqm-light hover:bg-rqm-dark hover:grow rounded-2xl shadow-2xl">
            <div class="flex font-bold h-1/3 justify-center py-10 text-2xl text-center text-white">Total Vendors in the Market</div>
            <div class="flex font-bold h-2/3 items-center justify-center text-5xl text-center text-rqm-yellow-dark">{{ $total_vendors }}</div>
        </div>
        <div class="bg-rqm-light hover:bg-rqm-dark hover:grow rounded-2xl shadow-2xl">
            <div class="flex font-bold h-1/3 justify-center py-10 text-2xl text-center text-white">Last 24h Purchases</div>
            <div class="flex font-bold h-2/3 items-center justify-center text-5xl text-center text-rqm-yellow-dark">{{ $total_daily_purchases }}</div>
        </div>
        <div class="bg-rqm-light hover:bg-rqm-dark hover:grow rounded-2xl shadow-2xl">
            <div class="flex font-bold h-1/3 justify-center py-10 text-2xl text-center text-white">Total Purchases </div>
            <div class="flex font-bold h-2/3 items-center justify-center text-5xl text-center text-rqm-yellow-dark">{{ $total_purchases }}</div>
        </div>
        <div class="bg-rqm-light hover:bg-rqm-dark hover:grow rounded-2xl shadow-2xl">
            <div class="flex font-bold h-1/3 justify-center py-10 text-2xl text-center text-white">Average Price </div>
            <div class="flex font-bold h-2/3 items-center justify-center text-5xl text-center text-rqm-yellow-dark">@include('includes.currency', ['usdValue' => round($avg_product_price,2)])</div>
        </div>
        <div class="bg-rqm-light hover:bg-rqm-dark hover:grow rounded-2xl shadow-2xl">
            <div class="flex font-bold h-1/3 justify-center py-10 text-2xl text-center text-white">Online Users </div>
            <div class="flex font-bold h-2/3 items-center justify-center text-5xl text-center text-rqm-yellow-dark">{{ $online_users }}</div>
        </div>
        <div class="bg-rqm-light hover:bg-rqm-dark hover:grow rounded-2xl shadow-2xl">
            <div class="flex font-bold h-1/3 justify-center py-10 text-2xl text-center text-white">Total Registered Users </div>
            <div class="flex font-bold h-2/3 items-center justify-center text-5xl text-center text-rqm-yellow-dark">{{ $total_users }}</div>
        </div>
        <div class="bg-rqm-light hover:bg-rqm-dark hover:grow rounded-2xl shadow-2xl">
            <div class="flex font-bold h-1/3 justify-center py-10 text-2xl text-center text-white">Total Earnings </div>
            <div class="flex font-bold h-2/3 items-center justify-center text-5xl text-center text-rqm-yellow-dark">@include('includes.currency', ['usdValue' => round($total_spent)])</div>
        </div>
        <div class="bg-rqm-light hover:bg-rqm-dark hover:grow rounded-2xl shadow-2xl">
            <div class="flex font-bold h-1/3 justify-center py-10 text-2xl text-center text-white">Total Earnings per Coin </div>
            <div class="flex font-bold h-2/3 items-center justify-center text-5xl text-center text-rqm-yellow-dark">
                @if(count($total_earnings_coin) == 0)
                    ---
                @endif
                <table>
                    @foreach($total_earnings_coin as $coin => $total_sum)
                        <tr>
                            <td><span class="badge badge-primary">{{ strtoupper(\App\Purchase::coinDisplayName($coin)) }}</span></td>
                            <td class="text-right">{{ number_format(round($total_sum, 8), 8) }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="bg-rqm-light hover:bg-rqm-dark hover:grow rounded-2xl shadow-2xl">
            <div class="flex font-bold h-1/3 justify-center py-10 text-2xl text-center text-white">Banned Users : </div>
            <div class="flex font-bold h-2/3 items-center justify-center text-5xl text-center text-rqm-yellow-dark">
                {{ $banned_users }}
            </div>
        </div>
        <div class="bg-rqm-light hover:bg-rqm-dark hover:grow rounded-2xl shadow-2xl">
            <div class="flex font-bold h-1/3 justify-center py-10 text-2xl text-center text-white">Inactive Vendors </div>
            <div class="flex font-bold h-2/3 items-center justify-center text-5xl text-center text-rqm-yellow-dark">
                {{ $inactive_vendors }}
            </div>
        </div>
    </div>
{{--    <div class="z-20 gap-4 grid grid-cols-3 grid-flow-col grid-rows-3 p-10 w-full">--}}
{{--        asdasjdjlsljdl--}}
{{--    </div>--}}
</div>
