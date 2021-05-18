@extends('tailwind-ui.master.main')

@section('title','Vendors')

@section('content')
    <div class="w-full flex">
        <div class="bg-rqm-lighter pb-10 px-2 px-7 rounded shadow w-1/5">
            <div class="py-3 text-2xl text-rqm-yellow">Categories</div>
            @include('tailwind-ui.shops-listcategories', ['categories' => $categories])

            <div class="pt-3 text-2xl text-rqm-yellow">Advance Search</div>
            <div>
                <form action="{{route('search')}}" method="post">
                    {{csrf_field()}}
                    <div>
                        <label for="search" class="text-rqm-yellow-darkest block">Search Terms</label>
                        <input type="text" name="search" id="search" value="{{app('request')->input('query')}}"
                               class="px-2 text-rqm-yellow bg-rqm-lighter border rounded w-full">
                    </div>
                    <div>
                        <label for="user" class="text-rqm-yellow-darkest block">User</label>
                        <input type="text" name="user" id="user" value="{{app('request')->input('user')}}"
                               class="px-2 text-rqm-yellow bg-rqm-lighter border rounded w-full">
                    </div>
                    <div>
                        <label for="category" class="text-rqm-yellow-darkest block">Category</label>
                        <select id="category" name="category"
                                class="bg-rqm-light border py-0.5 rounded text-rqm-yellow-dark w-full">
                            <option selected value="any">Any</option>
                            @foreach($categories as $category)
                                <option value="{{$category->name}}"
                                        @if(app('request')->input('category') == $category->name) selected @endif>{{$category->name}}</option>
                                @if($category -> children -> isNotEmpty())
                                    @foreach($category->children as $child)
                                        <option value="{{$child->name}}"
                                                @if(app('request')->input('category') == $child->name) selected @endif>
                                            > {{$child->name}}</option>
                                        @if($child -> children -> isNotEmpty())
                                            @foreach($child->children as $subChild)
                                                <option value="{{$subChild->name}}"
                                                        @if(app('request')->input('category') == $subChild->name) selected @endif>
                                                    >> {{$subChild->name}}</option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="text-rqm-yellow-darkest block">Price Range</label>
                        <input type="number" name="minimum_price" id="" value="{{app('request')->input('price_min')}}"
                               step="0.01" placeholder="Minimum price USD"
                               class="px-2 text-rqm-yellow bg-rqm-lighter border rounded w-full">
                        <input type="number" name="maximum_price" id="" value="{{app('request')->input('price_max')}}"
                               step="0.01" placeholder="Maximum price USD"
                               class="px-2 text-rqm-yellow mt-0.5 bg-rqm-lighter border rounded w-full">
                    </div>
                    <div>
                        <label for="order_by" class="text-rqm-yellow-darkest block">Order By</label>
                        <select id="order_by" name="order_by"
                                class="bg-rqm-light border py-0.5 rounded text-rqm-yellow-dark w-full">
                            <option
                                @if(app('request')->input('order_by') == 'price_asc' ||app('request')->input('order_by') == null) selected
                                @endif value="price_asc">Price: Low to High
                            </option>
                            <option @if(app('request')->input('order_by') == 'price_desc') selected
                                    @endif value="price_desc">Price: High to Low
                            </option>
                            <option @if(app('request')->input('order_by') == 'newest') selected @endif value="newest">
                                Newest
                            </option>
                        </select>
                    </div>
                    <div class="p-2">
                        <button type="submit" class="bg-rqm-yellow-dark font-semibold rounded text-rqm-dark w-full">
                            Search
                        </button>
                    </div>
                </form>
            </div>

        </div>


        <div class="bg-rqm-dark w-4/5 relative left-8">
            <div class="absolute inset-0 bg-repeat h-full opacity-10 w-full bg-rqm-lighter"
                 style="background-image: url({{URL::asset('/media/bg.cleaned.png')}})">
                <span></span>
            </div>
            <div class="gap-7 grid custom-grid-col pt-5 pb-5 px-28 mr-52">
                @foreach ($vendors as $vendor)

                    <div class="border border-gray-500 flex flex-col px-9 py-5 rounded-2xl shadow-md relative">
                        <div class="bg-gray-500 bg-opacity-25 items-center justify-center py-1 -mx-9">
                            <div class="text-center text-rqm-yellow w-full font-black">{{ $vendor->username }}</div>
                        </div>
                        <div class="text-center pt-1 text-rqm-white text-xs">Last
                            Seen: {{ $vendor->last_seen ?? 'n/a' }}</div>
                        {{--                <div class="absolute bottom-0 mr-2 right-0 text-rqm-white text-xs">Last Seen: {{ $vendor->last_seen ?? 'n/a' }}</div>--}}
                        <div class="flex justify-center bottom-16 left-7 py-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 text-rqm-yellow w-6" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                            </svg>
                            <span
                                class="px-1 text-rqm-white">{{$vendor->feedback == null || $vendor->feedback == '' ? 0 : $vendor->feedback}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 text-rqm-yellow w-6" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5"/>
                            </svg>
                            <span
                                class="px-1 text-rqm-white">{{$vendor->feedback == null || $vendor->feedback == '' ? 0 : $vendor->feedback}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 text-rqm-yellow w-6" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            <span class="px-1 text-rqm-white">{{ $vendor->products->count() }}</span>

                        </div>
                        <div class="flex bottom-4 justify-center py-1 mt-2">
                            <a href="{{route('search',['user'=>$vendor->username])}}">
                                <button
                                    class="bg-rqm-yellow-dark flex font-extrabold px-5 py-1 rounded-3xl text-rqm-dark object-center">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </span>
                                    <span class="px-2">View Store</span>
                                </button>
                            </a>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>


    </div>

    {{ $vendors -> links('tailwind-ui.includes.paginate') }}
@endsection
