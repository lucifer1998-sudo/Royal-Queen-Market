@extends('tailwind-ui.master.main')

@section('title','Vendors')

@section('content')
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
@endsection
