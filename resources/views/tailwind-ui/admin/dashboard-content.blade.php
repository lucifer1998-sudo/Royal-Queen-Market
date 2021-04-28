<div class="relative bg-rqm-dark flex flex-wrap justify-center rounded shadow w-full h-full">
    <div class="absolute inset-0 bg-repeat h-full opacity-10 w-full" style="background-image: url({{URL::asset('/media/bg.cleaned.png')}})">
        <span></span>
    </div>
    <div class="z-20 gap-4 grid grid-cols-3 grid-flow-col grid-rows-3 p-10 w-full">
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
        <div>1</div>
        <div>1</div>
        <div>1</div>
        <div>1</div>
        <div>1</div>
        <div>1</div>
    </div>
</div>
