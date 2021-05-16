<div class="pt-5">

    <table class="table-auto w-full">
        <thead class="border-b border-rqm-yellow-dark">
        <tr>
            <th class="px-2 text-center text-left text-rqm-yellow">Name</th>
            <th class="px-2 text-center text-left text-rqm-yellow">Price ({{ \App\Marketplace\Utility\CurrencyConverter::getLocalSymbol() }})</th>
            <th class="px-2 text-center text-left text-rqm-yellow">Duration</th>
            <th class="px-2 text-center text-left text-rqm-yellow">Minimum quantity</th>
            <th class="px-2 text-center text-left text-rqm-yellow">Maximum quantity</th>
            <th class="px-2 text-center text-left text-rqm-yellow"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($productsShipping as $index => $shipping)
            <tr class="@if(!($index % 2)) bg-rqm-light @endif">
                <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                    {{ $shipping -> name }}
                </td>
                <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                    {{ $shipping -> local_value }}
                </td>
                <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                    {{ $shipping -> from_quantity }}
                </td>
                <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                    {{ $shipping -> to_quantity }}
                </td>
                <td class="border-gray-600 px-2 py-2 text-gray-400 text-center">
                    @if($shipping -> exists)
                        <a href="{{ route('profile.vendor.product.delivery.remove', [$shipping -> id, $physicalProduct] ) }}" class="underline">Remove</a>
                    @else
                        <a href="{{ route('profile.vendor.product.delivery.remove', $index) }}" class="underline">Remove</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="flex pt-5">
        <span class="text-2xl text-rqm-yellow">Delivery Option</span>
    </div>
    <form method="POST" action="{{ route('profile.vendor.product.delivery.new', $physicalProduct -> product) }}">
        {{ csrf_field() }}
        <div class="flex pt-5">
            <div class="pr-2 w-1/3">
                <span class="block text-rqm-yellow">Name</span>
                <input type="text" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" maxlength="10" name="name" value="{{ old('name') }}" placeholder="Name">
            </div>
            <div class="pl-2 w-1/3">
                <span class="block text-rqm-yellow">Price in {{ \App\Marketplace\Utility\CurrencyConverter::getLocalSymbol() }}</span>
                <input type="number" step=".01" min="0.01" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" name="price" value="{{ old('price') }}" placeholder="(Ex. 15.99)">
            </div>
            <div class="pl-2 w-1/3">
                <span class="block text-rqm-yellow">Duration</span>
                <input type="text" maxlength="30" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" name="duration" value="{{ old('duration') }}" placeholder="(Ex. 1-2 weeks)">
            </div>

        </div>
        <div class="flex">
            <div class="w-1/3">
                <span class="block text-rqm-yellow">Minimum quantity</span>
                <input type="number" step="1" min="1" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" name="from_quantity" value="{{ old('from_quantity') }}" placeholder="Minimum quantity">
            </div>
            <div class="pl-2 w-1/3">
                <span class="block text-rqm-yellow">Maximum quantity</span>
                <input type="number" step="1" min="1" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" name="to_quantity" value="{{ old('to_quantity') }}" placeholder="Maximum quantity">
            </div>
            <div class="pl-2 w-1/3 relative">
                <button type="submit" class="absolute bg-rqm-yellow-dark bottom-0 p-2 rounded-sm text-base text-rqm-dark w-1/6 w-full">
                    Add shipping
                </button>
            </div>
        </div>
    </form>

    <div class="flex pt-5">
        <span class="text-2xl text-rqm-yellow">Shipping Countries</span>
    </div>

    <form method="POST" action="{{ route('profile.vendor.product.delivery.options', $physicalProduct) }}">
        {{ csrf_field() }}
        <div class="flex pt-5">
            <div class="pr-2 w-1/2">
                <span class="block text-rqm-yellow">Ships to</span>
                <select name="countries_option" id="countries_option" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" title="Ships to">
                    @foreach(\App\PhysicalProduct::$countriesOptions as $short => $optionName)
                        <option value="{{ $short }}" @if($short == $physicalProduct -> countries_option) selected @endif>{{ $optionName }}</option>
                    @endforeach
                </select>
            </div>
            <div class="pl-2 w-1/2">
                <span class="block text-rqm-yellow">Country from</span>
                <select name="country_from" id="country_from" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" title="Country from">
                    @foreach(config('countries') as $countryShort => $countryName)
                        <option value="{{ $countryShort }}" @if($countryShort == $physicalProduct-> country_from) selected @endif>{{ $countryName }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="flex pt-5">
            <div class="w-full">
                <span class="block text-rqm-yellow">Included/excluded countries</span>
                <select name="countries[]" multiple class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" title="Included/excluded countries">
                    @foreach(config('countries') as $countryShort => $countryName)
                        <option value="{{ $countryShort }}" @if(in_array($countryShort, $physicalProduct-> countriesArray())) selected @endif>{{ $countryName }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    <div class="pt-5 flex justify-end">
        @if(request() -> is('profile/vendor/product/edit/*'))
            <button type="submit" class="bg-rqm-yellow-dark ml-2 p-2 rounded-sm text-base text-rqm-dark w-1/6">
                Save
            </button>
            <a href="{{ route('profile.vendor.product.edit', [$basicProduct, 'images']) }}" class="w-1/6">
                <button type="button" class="bg-rqm-yellow-dark ml-2 p-2 rounded-sm text-base text-rqm-dark w-full">
                    Next
                </button>
            </a>
        @elseif(request() -> is('admin/product/*'))
            <button type="submit" class="bg-rqm-yellow-dark ml-2 p-2 rounded-sm text-base text-rqm-dark w-1/6">
                Save
            </button>
            <a href="{{ route('admin.product.edit', [$basicProduct, 'images']) }}" class="w-1/6">
                <button type="button" class="bg-rqm-yellow-dark ml-2 p-2 rounded-sm text-base text-rqm-dark w-full">
                    Next
                </button>
            </a>
        @else
            <button type="submit" class="bg-rqm-yellow-dark ml-2 p-2 rounded-sm text-base text-rqm-dark w-full">
                Next
            </button>
        @endif
    </div>
</div>
