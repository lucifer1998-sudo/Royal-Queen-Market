@extends('tailwind-ui.master.main')

@section('title','Home Page')

@section('hero')

@endsection

@section('content')
    <div class="bg-rqm-light flex shadow-md">
        <div class="w-1/2 flex">
            <div class="pl-14 my-auto">
                <div>
                    <span class="text-5xl text-rqm-yellow-darkest w-10/12">Royal Queen Market</span>
                </div>
                <div class="pt-8">
                    <p class="text-gray-400 w-10/12 text-justify">
                        Lorem ipsum dolor sit amet, enim pertinax sea an. Ea dissentias quaerendum cum, sed mundi atomorum eu. Vix nisl cetero eu, oblique blandit mel ei. An propriae eleifend concludaturque sea. Probo viris docendi ne eos, an cibo accusamus ullamcorper ius, omnes scripta quo te. Decore periculis expetendis has at.
                    </p>
                </div>
                <div class="pt-10">
                    <a href="{{URL('shop')}}">
                        <button class="bg-rqm-yellow-dark font-extrabold px-5 py-2 rounded-sm text-rqm-dark">
                            Shop Now
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="w-1/2">
            <img src="{{URL::asset('/media/cover3.png')}}">
        </div>
    </div>

    <div class="mt-14 w-full">
        <div class="grid gap-4 grid-cols-4">
            @foreach($products as $product)
                <div class="w-full p-6 flex flex-col bg-rqm-light shadow-md">
                    <a href="{{ route('product.show', $product) }}">
                        <img class="rounded-md hover:grow hover:shadow-lg w-full" src="{{ asset('storage/'  . $product -> frontImage() -> image) }}" alt="{{$product->name}}">
                        <div class="pt-3 flex items-center justify-between">
                            <p class="text-rqm-yellow-dark">{{$product->name}}</p>
                            <svg class="h-6 w-6 fill-current text-rqm-yellow-darkest hover:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                            </svg>
                        </div>
                        <p class="pt-1 text-rqm-yellow-dark">@include('includes.currency', ['usdValue' => $product -> price_from ])</p>
                        <div class="flex items-end justify-between">
                            <small class="text-gray-400">Posted by {{ $product -> user -> username }}</small>
                            <button class="bg-rqm-yellow-dark font-extrabold px-3 py-1 rounded-sm text-rqm-dark">
                                Buy Now
                            </button>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
