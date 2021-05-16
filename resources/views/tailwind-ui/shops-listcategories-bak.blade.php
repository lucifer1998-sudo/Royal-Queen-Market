@foreach($categories as $cat)
<a href="{{ route('category.show', $cat) }}">
    <div class="mt-0.5 bg-rqm-light px-2 rounded text-lg text-rqm-yellow-darkest">{{ $cat -> name }}</div>
</a>
    @if($cat -> children -> isNotEmpty())
    <div class="mt-0.5 pl-5 rounded text-lg text-rqm-yellow-darkest">
        @include('tailwind-ui.shops-listcategories', ['categories' => $cat -> children])
    </div>
    @endif
@endforeach
