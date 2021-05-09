<hr class="my-4">
<div class="flex">
    <div class="w-full p-4 my-2">
        <label class="text-4xl text-gray-400 block text-rqm-yellow">
            Items for sale <a href="{{route('search',['user'=>$vendor->username])}}">({{$vendor->products()->count()}})</a>
        </label>
    </div>
    <div class="w-full p-4 my-2  text-right">
        <a class="bg-rqm-yellow-dark font-extrabold px-5 py-1 rounded-3xl text-rqm-dark" href="{{route('search',['user'=>$vendor->username])}}">See all items</a>
    </div>
</div>

<div class="grid gap-6 grid-cols-4">
    @foreach($vendor->recentProducts(4) as $product)
        <div class="col-md-3 col-sm-6 mb-2">
            @include('includes.product.card',$product)
        </div>
    @endforeach
</div>
