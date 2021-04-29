<div class="relative bg-rqm-dark flex flex-wrap justify-center rounded shadow w-full h-full">
    <div class="absolute inset-0 bg-repeat h-full opacity-10 w-full" style="background-image: url({{URL::asset('/media/bg.cleaned.png')}})">
        <span></span>
    </div>
    <div class="z-20 p-10 w-full">
        <div class="bg-rqm-dark h-full p-5 rounded w-full">
            <div class="flex justify-center text-2xl text-rqm-yellow">
                Editing product {{$basicProduct->name}}
            </div>

            <div class="flex py-5">
                <div class="gap-4 grid grid-cols-4 grid-flow-col grid-rows-1 w-full">
                    <a href="{{ route('admin.product.edit', $basicProduct) }}">
                        <div class="@if($section == 'basic') bg-rqm-yellow text-rqm-dark @else text-rqm-yellow-dark  bg-rqm-light @endif p-3 rounded ">Basic Information</div>
                    </a>
                    <a href="{{ route('admin.product.edit', [$basicProduct, 'offers']) }}">
                        <div class="@if($section == 'offers') bg-rqm-yellow text-rqm-dark @else text-rqm-yellow-dark  bg-rqm-light @endif p-3 rounded ">Price and Offers</div>
                    </a>
                    @php
                        if(empty($type))
                            $type = session('product_type');
                    @endphp
                    @if($type == 'physical')
                        <a href="{{ route('admin.product.edit', [$basicProduct, 'delivery']) }}">
                            <div class="@if($section == 'delivery') bg-rqm-yellow text-rqm-dark @else text-rqm-yellow-dark  bg-rqm-light @endif p-3 rounded">Delivery Options</div>
                        </a>
                    @else
                        <a href="{{ route('admin.product.edit', [$basicProduct, 'digital']) }}">
                            <div class="@if($section == 'digital') bg-rqm-yellow text-rqm-dark @else text-rqm-yellow-dark  bg-rqm-light @endif p-3 rounded">Digital options</div>
                        </a>
                    @endif
                    <a href="{{ route('admin.product.edit', [$basicProduct, 'images']) }}">
                        <div class="@if($section == 'images') bg-rqm-yellow text-rqm-dark @else text-rqm-yellow-dark  bg-rqm-light @endif p-3 rounded">Images</div>
                    </a>
                </div>
            </div>

            @if($section == 'basic')
                @include('tailwind-ui.admin.product-basic-content', ['basicProduct' => $basicProduct])
            @elseif($section == 'offers')
                @include('tailwind-ui.admin.product-offers-content', ['productsOffers' => $productsOffers])
            @elseif($section == 'delivery')
                @include('tailwind-ui.admin.product-delivery-content', ['physicalProduct' => $physicalProduct])
            @elseif($section == 'images')
                @include('tailwind-ui.admin.product-images-content', ['productsImages' => $productsImages])
            @endif
        </div>
    </div>
</div>
