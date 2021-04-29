<div class="pt-5">

    <table class="table-auto w-full">
        <thead class="border-b border-rqm-yellow-dark">
        <tr>
            <th class="px-2 text-center text-left text-rqm-yellow">Price ({{ \App\Marketplace\Utility\CurrencyConverter::getLocalSymbol() }})</th>
            <th class="px-2 text-center text-left text-rqm-yellow">Minimum quantity</th>
            <th class="px-2 text-center text-left text-rqm-yellow"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($productsOffers as $index => $offer)
            <tr class="@if(!($index % 2)) bg-rqm-light @endif">
                <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                    {{ $offer -> local_price }}
                </td>
                <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                    {{ $offer -> min_quantity }}
                </td>
                <td class="border-gray-600 px-2 py-2 text-gray-400 text-center">
                    <a href="{{ route('profile.vendor.product.offers.remove', [ $offer -> min_quantity, $basicProduct]) }}" class="underline">Remove</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <form method="POST" action="{{ route('profile.vendor.product.offers.add', $basicProduct) }}">
        {{ csrf_field() }}
        <div class="flex pt-5">
            <div class="pr-2 w-1/3">
                <span class="block text-rqm-yellow">Price in {{ \App\Marketplace\Utility\CurrencyConverter::getLocalSymbol() }}</span>
                <input type="number" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" step=".01" min="0.01" name="price" value="{{ old('price') }}" placeholder="Price in {{ \App\Marketplace\Utility\CurrencyConverter::getLocalSymbol() }}">
            </div>
            <div class="pl-2 w-1/3">
                <span class="block text-rqm-yellow">Minimum quantity for this price</span>
                <input type="number" step="1" min="1" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" name="min_quantity" value="{{ old('min_quantity') }}" placeholder="Minimum quantity for this price">
            </div>
            <div class="pl-2 w-1/3 relative">
                <button type="submit" class="absolute bg-rqm-yellow-dark bottom-0 p-2 rounded-sm text-base text-rqm-dark w-1/6 w-full">
                    Add Offer
                </button>
            </div>
        </div>
    </form>

    <div class="pt-5 flex justify-end">
        @if(request() -> is('profile/vendor/product/edit/*'))
            <a href="{{ route('profile.vendor.product.edit', [$basicProduct, $basicProduct -> afterOffers()]) }}" class="w-1/6">
                <button type="button" class="bg-rqm-yellow-dark ml-2 p-2 rounded-sm text-base text-rqm-dark w-full">
                    Next
                </button>
            </a>
        @elseif(request() -> is('admin/product/*'))
            <a href="{{ route('admin.product.edit', [$basicProduct, $basicProduct -> afterOffers()]) }}" class="w-1/6">
                <button type="button" class="bg-rqm-yellow-dark ml-2 p-2 rounded-sm text-base text-rqm-dark w-full">
                    Next
                </button>
            </a>
        @else
            <a href="{{ route('profile.vendor.product.' . ( session('product_type') == 'physical' ? 'delivery' : 'digital' ) ) }}" class="w-1/6">
                <button type="button" class="bg-rqm-yellow-dark ml-2 p-2 rounded-sm text-base text-rqm-dark w-full">
                    Next
                </button>
            </a>
        @endif
    </div>
</div>
