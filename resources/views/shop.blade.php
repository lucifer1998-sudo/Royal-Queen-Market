<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <title>Shop ✨ Royal Queen Market</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/app.css">
    <link href="{{ URL::asset('css/rqm-app.css') }}" rel="stylesheet" type="text/css">
    <link rel="icon" href="{{URL::asset('/media/rqm-icon.png')}}" type="image/png" sizes="16x16">

</head>

<body id="main">

   		@include('master.navbar')
        @include('includes.jswarning')

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 offset-xl-4 text-center mb-3 mt-4">
                <img src="{{URL::asset('/media/top-separator-long.png')}}" class="img-fluid" alt="">
            </div>
            <div class="col-xl-4"></div>

            <div class="col-xl-2 text-white">
            	@include('includes.categories')
                <h1 class="h3 ">Refine Search</h1>
                
                @include('filter')

                
            </div>
            <div class="col-xl-8">
                <div class="row">

                    

                @foreach ($products as $product)
                <div class="col-xl-3 p-2">
                    <div class="border p-4 rounded-3 text-center">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                
                                <img class="img-fluid" src="{{ asset('storage/'  . $product -> frontImage() -> image) }}" alt="{{ $product -> name }}">
                                
                            </div>
                            <div class="col-md-12 text-white">
                                <h3 class="mb-0">{{ $product->name }}</h3>
                                <p class="card-subtitle text-white" style="color: black;">From: <strong>{{ $product->getLocalPriceFrom() }} {{ \App\Marketplace\Utility\CurrencyConverter::getLocalSymbol() }}</strong>  - {{ $product -> category -> name }} - <span class="badge badge-info">{{ $product -> type }}</span></p>
                                <p class="card-text text-white" >
            Posted by <a href="{{ route('vendor.show', $product -> user) }}" class="badge badge-info">{{ $product -> user -> username }}</a>, <strong>{{ $product -> quantity }}</strong> left
        </p>
         <!--                        <div class="row text-center">
                                    <div class="col-3 d-md-none"></div>
                                    <div class="col-md-2 offset-md-3 col-2"><img
                                            src="{{URL::asset('/media/c-bitcoin.png')}}" class="img-fluid" alt=""></div>
                                    <div class="col-md-2 col-2"></div>
                                    <div class="col-md-2 col-2"><img src="{{URL::asset('/media/c-monero.png')}}"
                                            class="img-fluid" alt=""></div>
                                </div> -->
                                <a class="btn btn-outline-warning" href="{{ route('product.show', $product) }}">BUY</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

              

                </div>

            </div>
        </div>
    </div>




    @include('footer')


</body>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
</script>
<!-- <script src="{{ URL::asset('js/rqm-scripts.js') }}"></script> -->

</html>
