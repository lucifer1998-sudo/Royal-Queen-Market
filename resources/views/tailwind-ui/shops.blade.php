@extends('tailwind-ui.master.main')

@section('title', 'Shops')

@section('content')
    <div class="w-full flex">
        <div class="bg-rqm-dark pb-10 px-2 px-7 rounded shadow w-1/5">
            <div class="py-3 text-2xl text-rqm-yellow">Categories</div>
            @include('tailwind-ui.shops-listcategories', ['categories' => $categories])

            <div class="pt-3 text-2xl text-rqm-yellow">Advance Search</div>
            <div>
                <form action="{{route('search')}}" method="post">
                    {{csrf_field()}}
                    <div>
                        <label for="search" class="text-rqm-yellow-darkest block">Search Terms</label>
                        <input type="text" name="search" id="search" value="{{app('request')->input('query')}}" class="px-2 text-rqm-yellow bg-rqm-lighter border rounded w-full">
                    </div>
                    <div>
                        <label for="user" class="text-rqm-yellow-darkest block">User</label>
                        <input type="text" name="user" id="user" value="{{app('request')->input('user')}}" class="px-2 text-rqm-yellow bg-rqm-lighter border rounded w-full">
                    </div>
                    <div>
                        <label for="category" class="text-rqm-yellow-darkest block">Category</label>
                        <select id="category" name="category" class="bg-rqm-light border py-0.5 rounded text-rqm-yellow-dark w-full">
                            <option selected value="any">Any</option>
                            @foreach($categories as $category)
                                <option value="{{$category->name}}" @if(app('request')->input('category') == $category->name) selected @endif>{{$category->name}}</option>
                                @if($category -> children -> isNotEmpty())
                                    @foreach($category->children as $child)
                                        <option value="{{$child->name}}" @if(app('request')->input('category') == $child->name) selected @endif> > {{$child->name}}</option>
                                        @if($child -> children -> isNotEmpty())
                                            @foreach($child->children as $subChild)
                                                <option value="{{$subChild->name}}" @if(app('request')->input('category') == $subChild->name) selected @endif> >> {{$subChild->name}}</option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="product_type" class="text-rqm-yellow-darkest block">Type</label>
                        <select id="product_type" name="product_type" class="bg-rqm-light border py-0.5 rounded text-rqm-yellow-dark w-full">
                            <option selected value="all">All</option>
                            <option value="digital" @if(app('request')->input('type') == 'digital') selected @endif>Digital</option>
                            <option value="physical" @if(app('request')->input('type') == 'physical') selected @endif>Physical</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-rqm-yellow-darkest block">Price Range</label>
                        <input type="number" name="minimum_price" id="" value="{{app('request')->input('price_min')}}" step="0.01" placeholder="Minimum price USD" class="px-2 text-rqm-yellow bg-rqm-lighter border rounded w-full">
                        <input type="number" name="maximum_price" id="" value="{{app('request')->input('price_max')}}" step="0.01" placeholder="Maximum price USD" class="px-2 text-rqm-yellow mt-0.5 bg-rqm-lighter border rounded w-full">
                    </div>
                    <div>
                        <label for="order_by" class="text-rqm-yellow-darkest block">Order By</label>
                        <select id="order_by" name="order_by" class="bg-rqm-light border py-0.5 rounded text-rqm-yellow-dark w-full">
                            <option @if(app('request')->input('order_by') == 'price_asc' ||app('request')->input('order_by') == null) selected @endif value="price_asc">Price: Low to High</option>
                            <option @if(app('request')->input('order_by') == 'price_desc') selected @endif value="price_desc">Price: High to Low</option>
                            <option @if(app('request')->input('order_by') == 'newest') selected @endif value="newest">Newest</option>
                        </select>
                    </div>
                    <div class="p-2">
                        <button type="submit" class="bg-rqm-yellow-dark font-semibold rounded text-rqm-dark w-full">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="bg-rqm-dark ml-5 p-5 w-4/5">
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
            {{ $products -> links('tailwind-ui.includes.paginate') }}
        </div>
    </div>
@endsection
