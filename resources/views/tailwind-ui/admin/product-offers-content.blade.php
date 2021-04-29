<div class="pt-5">
    <form method="POST" action="{{ route('profile.vendor.product.add.post', optional($basicProduct) -> exists ? $basicProduct : null) }}">
        {{ csrf_field() }}
        <div class="flex">
            <div class="pr-2 w-1/2">
                <span class="block text-rqm-yellow">Product Name</span>
                <input type="text" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" id="name" name="name" placeholder="Product name" value="{{ optional($basicProduct) -> name }}" maxlength="100">
            </div>
            <div class="pl-2 w-1/2">
                <span class="block text-rqm-yellow">Category</span>
                <select name="category_id" id="category_id" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" title="Category">
                    @foreach($allCategories as $category)
                        <option value="{{ $category -> id }}" @if($category -> id == optional($basicProduct) -> category_id) selected @endif>{{ $category -> name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="pt-5">
            <span class="block text-rqm-yellow w-full">Description</span>
            <textarea name="description" id="description"
                      class="bg-rqm-dark border border-rqm-yellow-darkest p-3 text-rqm-yellow w-full" rows="20"
                      placeholder="Details about the product">{{ optional($basicProduct) -> description }}</textarea>
            <small class="text-rqm-yellow">Styling with Markdown is supported.</small>
        </div>
        <div class="pt-5">
            <span class="block text-rqm-yellow w-full">Payment rules</span>
            <textarea name="rules" id="rules"
                      class="bg-rqm-dark border border-rqm-yellow-darkest p-3 text-rqm-yellow w-full" rows="10"
                      placeholder="Rules of conducting business">{{ optional($basicProduct) -> rules }}</textarea>
            <small class="text-rqm-yellow">Styling with Markdown is supported.</small>
        </div>
        <div class="pt-5">
            <div class="w-full">
                <span class="block text-rqm-yellow">Supported types</span>
                <select name="types[]" id="types" multiple class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" title="Supported types">
                    @foreach(\App\Purchase::$types as $type => $typeLongName)
                        <option value="{{ $type }}" {{ optional($basicProduct) -> supportsType($type) ? 'selected' : '' }}>{{ $typeLongName }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="pt-5">
            <div class="w-full">
                <span class="block text-rqm-yellow">Supported coins</span>
                <select name="coins[]" id="coins" multiple class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" title="Supported types">
                    @foreach(config('coins.coin_list') as $coin => $instance)
                        <option value="{{ $coin }}" {{ optional($basicProduct) -> supportsCoin($coin) ? 'selected' : '' }}>{{ strtoupper(\App\Purchase::coinDisplayName($coin)) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="pt-5 flex">
            <div class="pr-2 w-1/2">
                <span class="block text-rqm-yellow">Quantity</span>
                <input type="number" @if(optional($basicProduct) -> isAutodelivery()) readonly @endif class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" name="quantity" id="quantity" min="1" placeholder="Number of products" value="{{ optional($basicProduct) -> quantity }}">
                @if(optional($basicProduct) -> isAutodelivery())
                <small class="text-rqm-yellow">The product is marked as autodelivery, you can't change quantity manually.</small>
                @endif
            </div>
            <div class="pl-2 w-1/2">
                <span class="block text-rqm-yellow">Measure</span>
                <input type="text" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" id="mesure" name="mesure" placeholder="Unit of mesure(item, gram)" value="{{ optional($basicProduct) -> mesure }}" maxlength="10">
            </div>
        </div>
        <div class="pt-5 flex justify-end">
            @if(request() -> is('profile/vendor/product/edit/*'))
                <button type="submit" class="bg-rqm-yellow-dark mx-2 p-2 rounded-sm text-base text-rqm-dark w-1/6">
                    Save
                </button>
                <a href="{{ route('profile.vendor.product.edit', [$basicProduct, 'offers']) }}" class="w-1/6">
                    <button type="submit" class="bg-rqm-yellow-dark ml-2 p-2 rounded-sm text-base text-rqm-dark w-full">
                        Next
                    </button>
                </a>
            @elseif(request() -> is('admin/product/*'))
                <button type="submit" class="bg-rqm-yellow-dark mx-2 p-2 rounded-sm text-base text-rqm-dark w-1/6">
                    Save
                </button>
                <a href="{{ route('admin.product.edit', [$basicProduct, 'offers']) }}" class="w-1/6">
                    <button type="submit" class="bg-rqm-yellow-dark ml-2 p-2 rounded-sm text-base text-rqm-dark w-full">
                        Next
                    </button>
                </a>
            @else
                <button type="submit" class="bg-rqm-yellow-dark mx-2 p-2 rounded-sm text-base text-rqm-dark w-1/6">
                    Next
                </button>
            @endif
        </div>
    </form>
</div>
