<div class="pt-5">
    <form action="{{ route('profile.vendor.product.images.post', $basicProduct) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="flex">
            <div class="pr-2 w-1/3">
                <span class="block text-rqm-yellow">Product Image</span>
                <input type="file" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" name="picture" id="picture" />
            </div>
            <div class="flex items-center pr-2 w-1/3">
                <input type="checkbox" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-1/4" name="first" id="defaultcheck" value="1" />
                <label class="block text-rqm-yellow" for="defaultcheck">Default product Image</label>
            </div>
            <div class="pl-2 relative w-1/3">
                <button type="submit" class="absolute bg-rqm-yellow-dark bottom-0 inset-x-0 p-2 rounded-sm text-base text-rqm-dark w-full">
                    Add image
                </button>
            </div>
        </div>
    </form>

    <div class="mt-5">
        <div class="grid grid-flow-col grid-cols-4 grid-rows-{{ceil(count($productsImages) / 4)}} gap-4">
            @foreach($productsImages as $image)
            <div class="relative">
                <img src="{{ asset('storage/' . $image -> image) }}" alt="Product image">
                @if(!$image -> first)
                    <div class="absolute flex inset-x-0 justify-center px-3 rounded-3xl text-rqm-dark top-4">
                        <a href="{{ route('profile.vendor.product.images.default', $image -> id) }}" class="bg-rqm-yellow-darkest px-2 rounded text-sm">Make default</a>
                    </div>
                    <div class="absolute flex inset-x-0 justify-center px-3 rounded-3xl text-rqm-dark top-1/4">
                        <a href="{{ route('profile.vendor.product.images.default', $image -> id) }}" class="bg-rqm-yellow-darkest px-2 rounded text-sm">Remove</a>
                    </div>
                @else
                    <div class="absolute flex inset-x-0 justify-center px-3 rounded-3xl text-rqm-dark top-4">
                        <span class="bg-rqm-yellow px-2 rounded text-sm">Default Image</span>
                    </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
