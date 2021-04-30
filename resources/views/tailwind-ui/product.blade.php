@extends('tailwind-ui.master.main')

@section('title','Vendors')

@section('content')
    <div class="pt-10 px-40 w-full">
        <div class="bg-rqm-light px-2 py-2 shadow text-rqm-yellow">
            <a href="{{ route('home') }}"><span>Products</span></a> /
            @foreach($product -> category -> parents() as $ancestor)
                <a href="{{ route('category.show', $ancestor) }}"><span>{{ $ancestor -> name }}</span></a> /
            @endforeach
            <a href="{{ route('category.show', $product -> category) }}"><span>{{ $product -> category -> name }}</span></a>
        </div>
        <div class="bg-rqm-light flex px-2 py-2 shadow text-rqm-yellow">
            <div class="w-1/3">
                <div class="h-80 overflow-x-hidden overflow-y-hidden rounded w-80">
                    @php $i = 1; @endphp
                    @foreach($product -> images() -> orderBy('first', 'desc') -> get() as $image)
                        <div id="slide-{{ $i++ }}" class="h-full w-full">
                            <img class="h-full object-cover w-full" src="{{ asset('storage/' . $image -> image) }}">
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-center py-3 w-80">
                    @php $i = 1; @endphp
                    @foreach($product -> images as $image)
                        <a href="#slide-{{ $i }}">
                            <span class="bg-rqm-dark items-center mx-2 px-2 rounded-full shadow text-center">{{ $i++ }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="w-2/3">content</div>
        </div>
    </div>
@endsection
