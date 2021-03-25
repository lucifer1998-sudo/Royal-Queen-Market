<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <title>Vendors ✨ Royal Queen Market</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- CSS -->
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/app.css">
    <link href="{{ URL::asset('css/rqm-app.css') }}" rel="stylesheet" type="text/css">
    <link rel="icon" href="{{URL::asset('/media/rqm-icon.png')}}" type="image/png" sizes="16x16">

</head>

<body id="main">

    @include('master.navbar')

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 offset-xl-4 text-center mb-3 mt-4">
                <img src="{{URL::asset('/media/top-separator-long.png')}}" class="img-fluid" alt="">
            </div>
            <div class="col-xl-4"></div>
            <div class="col-xl-2">


            </div>
            <div class="col-xl-8">

                <div class="col-xl-12 text-center mb-4">
                    <h1 class="text-warning">Vendors</h1>
                </div>


                <div class="row">

<!--                     <?php $pl=0; while( $pl <= 11) { ?>

             
                    <div class="col-xl-3 p-2">
                        <div class="border p-4 rounded-3">
                            <div class="row">

                                <div class="col-md-10 text-white">
                                    <h3 class="mb-0 h4"><span class="text-info"><i class="fas fa-angle-right"></i>
                                        </span><span class="text-warning">Salvatorre...</span>
                                    </h3>
                                </div>
                                <div class="col-md-1 text-info"><i class="far fa-times-circle"></i></div>

                                <div class="col-md-12 text-white text-center mt-2">
                                    <p><span class="fw-bold">Last Seen:</span> November 5, 2020</p>
                                    <div class="row">

                                        <div class="col-md-4">
                                            <h6 class="text-info"><i class="far fa-thumbs-up"></i> 546</h6>
                                        </div>
                                        <div class="col-md-4">
                                            <h6 class="text-pinky"><i class="far fa-thumbs-down"></i> 11</h6>
                                        </div>
                                        <div class="col-md-4">
                                            <h6 class="text-warning"><i class="fas fa-shopping-cart"></i> 250</h6>
                                        </div>
                                    </div>

                                    <button class=" mt-2 btn btn-info text-white rounded-pill">VIEW
                                        ALL PRODUCTS</button>

                                </div>

                            </div>
                        </div>
                    </div>
                 

                    <?php $pl++; } ?> -->

                    @foreach ($vendors as $vendor)
                    <div class="col-xl-3 p-2">
                        <div class="border p-4 rounded-3">
                            <div class="row">

                                <div class="col-md-10 text-white">
                                    <h3 class="mb-0 h4"><span class="text-info"><i class="fas fa-angle-right"></i>
                                        </span><span class="text-warning">{{ $vendor->username}}</span>
                                    </h3>
                                </div>
                                <div class="col-md-1 text-info"><i class="far fa-times-circle"></i></div>

                                <div class="col-md-12 text-white text-center mt-2">
                                    <p><span class="fw-bold">Last Seen:</span> {{ $vendor->last_seen }}</p>
                                    <div class="row">

                                        <div class="col-md-4">
                                            @if($vendor->feedback == null || $vendor->feedback == '')
                                            <h6 class="text-info"><i class="far fa-thumbs-up"></i> 0</h6>
                                            @else
                                            <h6 class="text-info"><i class="far fa-thumbs-up"></i> {{$vendor->feedback}}</h6>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            @if($vendor->feedback == null || $vendor->feedback == '')
                                            <h6 class="text-pinky"><i class="far fa-thumbs-down"></i> 0</h6>
                                            @else
                                            <h6 class="text-pinky"><i class="far fa-thumbs-down"></i> {{$vendor->feedback}}</h6>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <h6 class="text-warning"><i class="fas fa-shopping-cart"></i> {{ $vendor->products->count() }}</h6>
                                        </div>
                                    </div>

                                    <a class=" mt-2 btn btn-info text-white rounded-pill" href="{{route('search',['user'=>$vendor->username])}}">VIEW
                                        ALL PRODUCTS</a>

                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach


                    <div class="col-xl-2 offset-xl-5 mt-4">
                        <div class="d-grid">
                            <button class="btn btn-outline-warning btn-lg rounded-pill">MORE</button>
                        </div>
                    </div>

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


</html>
