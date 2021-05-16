<div class="relative bg-rqm-dark flex flex-wrap justify-center rounded shadow w-full h-full">
    <div class="absolute inset-0 bg-repeat h-full opacity-10 w-full" style="background-image: url({{URL::asset('/media/bg.cleaned.png')}})">
        <span></span>
    </div>
    <div class="z-20 p-10 w-full">
        @isModuleEnabled('FeaturedProducts')
            @include('featuredproducts::tailwind-ui.featuredproductsview')
        @endisModuleEnabled
    </div>
</div>
