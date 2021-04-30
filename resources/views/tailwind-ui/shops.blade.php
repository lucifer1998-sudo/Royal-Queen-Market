@extends('tailwind-ui.master.main')

@section('title','Vendors')

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
                </form>
            </div>
        </div>
        <div class="bg-rqm-dark ml-5 p-5 w-4/5">content</div>
    </div>
@endsection
