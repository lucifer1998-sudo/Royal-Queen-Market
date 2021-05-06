@foreach($categories as $cat)
<a href="{{ route('category.show', $cat) }}">
    <div class="flex mt-0.5 text-white px-2 @if($cat->isParent()) bg-gray-100 bg-opacity-5 @endif">{{ $cat -> name }}</div>
</a>
    @if($cat -> children -> isNotEmpty())
        @include('tailwind-ui.shops-listcategories', ['categories' => $cat -> children])
    @endif
@endforeach
