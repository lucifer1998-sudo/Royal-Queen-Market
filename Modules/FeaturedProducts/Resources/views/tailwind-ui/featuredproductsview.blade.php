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
                <a href="{{route('admin.users.view',['user'=>$product->user->id])}}">{{$product->user->username}}</a>
            </td>
            <td class="border-gray-600 flex justify-around px-2 py-2 text-center text-gray-400">
                <a href="{{ route('admin.product.edit', $product -> id) }}" class="">
                    <button type="button" class="bg-rqm-yellow-dark font-extrabold px-2 py-1 rounded-sm text-rqm-dark text-sm">
                        Edit
                    </button>
                </a>
                <form action="{{route('admin.featuredproducts.remove')}}" method="post">
                    {{csrf_field()}}
                    <input name="product_id" type="hidden" value="{{$product->id}}">
                    <button type="button" class="bg-rqm-yellow-dark font-extrabold px-2 py-1 rounded-sm text-rqm-dark text-sm">
                        Remove from featured
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $products -> links('tailwind-ui.includes.paginate') }}
