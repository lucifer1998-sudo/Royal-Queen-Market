
<div class="row">
    @foreach($featuredProducts as $product)
        <div class="col-md-4 my-md-0 my-2 col-12">
            @include('includes.product.card', ['product' => $product])
        </div>
    @endforeach
</div>