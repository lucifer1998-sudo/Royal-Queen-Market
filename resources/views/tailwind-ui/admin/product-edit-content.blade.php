<div class="relative bg-rqm-dark flex flex-wrap justify-center rounded shadow w-full h-full">
    <div class="absolute inset-0 bg-repeat h-full opacity-10 w-full" style="background-image: url({{URL::asset('/media/bg.cleaned.png')}})">
        <span></span>
    </div>
    <div class="z-20 p-10 w-full">
        <div class="bg-rqm-dark h-full p-5 rounded w-full">
            <div class="flex justify-center text-2xl text-rqm-yellow">
                Editing product {{$basicProduct->name}}
            </div>
            @include('tailwind-ui.admin.product-basic-content', ['basicProduct' => $basicProduct])
        </div>
    </div>
</div>
