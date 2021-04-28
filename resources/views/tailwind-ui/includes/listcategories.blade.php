@foreach($categories as $index => $category)
    <tr class="@if(!($counter % 2)) bg-rqm-light @else bg-rqm-light opacity-75 @endif">
        <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
            {{$category->name}}
        </td>
        <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
            @if(! empty($category->parent->name))
                {{$category->parent->name}}
            @endif
        </td>
        <td class="border-gray-600 px-2 py-2 text-center text-gray-400">
            <a href="{{ route('admin.categories.delete', $category -> id) }}">
                <button type="submit" class="bg-rqm-yellow-dark font-extrabold px-2 py-1 rounded-sm text-rqm-dark text-sm">
                    Delete
                </button>
            </a>
        </td>
    </tr>
    @php
        $counter++;
    @endphp
    @if($category -> children -> isNotEmpty())
        @include('tailwind-ui.includes.listcategories', ['categories' => $category -> children])
    @endif
@endforeach
