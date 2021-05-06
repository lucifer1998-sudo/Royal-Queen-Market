<div class="row my-2">

    <div class="col-md-3 col-sm-4 col-12">
        <img class="rounded img-thumbnail mw-100" src="{{ asset('storage/'  . $product -> frontImage() -> image) }}"
             alt="{{ $product -> name }}">
    </div>

    <div class="col-md-9 col-sm-8 col-12">
        <div class="row pb-2 mb-2 border-bottom border-light">
            <div class="col-md-8">
                <a href="{{ route('product.show', $product) }}"><h3 class="mb-0">{{ $product -> name }}</h3></a>
            </div>
            <div class="col-md-4">
                <h5 class="mb-0 text-right text-white">Posted by <a href="{{ route('vendor.show', $product -> user) }}"
                                             class="badge badge-info">{{ $product -> user -> username }}</a></h5>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7 text-white">
                From: <strong>@include('includes.currency', ['usdValue' => $product -> price_from ])</strong>
                <br>
                <span class="mr-2">Category:</span>
                @foreach($product -> category -> parents() as $ancestor)
                    <a href="{{ route('category.show', $ancestor) }}">{{ $ancestor -> name }}</a>
                    <i class="fas fa-chevron-right"></i>
                @endforeach
                <a href="{{ route('category.show', $product -> category) }}">{{ $product -> category -> name }}</a>
                <br>
                <span class="badge badge-info">{{ ucfirst($product -> type) }}</span> type
                <br>
                <strong>{{ $product -> quantity }}</strong> left / <strong>{{ $product -> orders }}</strong>
                sold
            </div>

            <div class="col-md-5">
                <p class="text-muted">
                    {{ $product -> short_description }}
                </p>
                <p class="text-white">
                    Payment coins:
                    @foreach($product -> getCoins() as $coin)
                        <span class="badge badge-info">{{ strtoupper(\App\Purchase::coinDisplayName($coin)) }}</span>
                    @endforeach
                </p>
                <a href="{{ route('product.show', $product) }}" class="btn btn-primary d-block">
                    <i class="fas fa-shopping-cart mr-2"></i>
                    Buy now
                </a>
            </div>

        </div>

    </div>

    <div class="card-body">
        <p class="card-subtitle"></p>
        <p class="card-text">
        </p>
    </div>


</div>