<div class="relative bg-rqm-dark flex flex-wrap justify-center rounded shadow w-full h-full">
    <div class="absolute inset-0 bg-repeat h-full opacity-10 w-full" style="background-image: url({{URL::asset('/media/bg.cleaned.png')}})">
        <span></span>
    </div>
    <div class="z-20 p-10 w-full">
        <div class="pb-10 w-full">
            <form action="{{route('admin.products.query')}}"  method="POST" class="flex w-full">
                {{ csrf_field() }}
                <div class="grid grid-flow-col grid-cols-4 grid-rows-1 gap-4 w-full">
                    <div>
                        <input type="text" value="{{ request('product') ?? '' }}" name="product" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" placeholder="Display name's products">
                    </div>
                    <div>
                        <input type="text" value="@if(app('request')->input('user') !== null) {{app('request')->input('user')}}  @endif" name="user" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" placeholder="Display user's products">
                    </div>
                    <div>
                        <select name="order_by" id="" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-full" title="Display group">
                            <option value="newest"
                                    @if(app('request')->input('order_by') =='newest') selected @endif>Newest
                            </option>
                            <option value="oldest"
                                    @if(app('request')->input('order_by') =='oldest') selected @endif>Oldest
                            </option>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="bg-rqm-yellow-dark font-extrabold p-2 rounded-sm text-rqm-dark text-base w-full">
                            Apply Filter
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <table class="table-auto w-full">
            <thead class="border-b border-rqm-yellow-dark">
            <tr>
                <th class="px-2 text-center text-left text-rqm-yellow">Title</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Category</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Price (best)</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Type</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Vendor</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $index => $product)
                <tr class="@if(!($index % 2)) bg-rqm-light @endif">
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        {{$product->name}}
                    </td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        {{$product->category->name}}
                    </td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        @include('includes.currency', ['usdValue' => $product->price_from])
                    </td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        {{$product->type}}
                    </td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        @if(! empty($product->user) )
                            <a href="{{route('admin.users.view',['user'=>$product->user->id])}}">{{$product->user->username}}</a>
                        @else
                            <span class="text-gray-500">User deleted account!</span>
                            <span class="flex items-center px-3 text-yellow-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </span>
                        @endif
                    </td>
                    <td class="border-gray-600 flex justify-around px-2 py-2 text-center text-gray-400">
                        @isModuleEnabled('FeaturedProducts')
                            @include('featuredproducts::tailwind-ui.markasfeatured')
                        @endisModuleEnabled
                        <a href="{{ route('admin.product.edit', $product -> id) }}" class="">
                            <button type="button" class="bg-rqm-yellow-dark font-extrabold px-2 py-1 rounded-sm text-rqm-dark text-sm">
                                Edit
                            </button>
                        </a>
                        <form action="{{route('admin.product.delete')}}" method="post">
                            {{csrf_field()}}
                            <input name="product_id" type="hidden" value="{{$product->id}}">
                            <button type="button" class="bg-rqm-yellow-dark font-extrabold px-2 py-1 rounded-sm text-rqm-dark text-sm">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products -> links('tailwind-ui.includes.paginate') }}
    </div>
</div>
