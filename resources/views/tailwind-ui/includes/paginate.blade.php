@if($paginator->hasPages())
    <nav class="flex pt-10 w-full">
        <ul class="flex justify-center space-x-10 text-rqm-yellow-dark w-full">
            <li class="disabled:opacity-50 @if($paginator->onFirstPage()) disabled @endif">
                <a class="disabled:opacity-50 @if($paginator->onFirstPage()) disabled @endif " href="{{ $paginator->previousPageUrl() }}" rel="prev" @if($paginator->onFirstPage()) tabindex="-1" @endif>
                    <i class="fa fa-angle-left"></i> Previous
                </a>
            </li>

            @foreach($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if(is_string($element))
                    <li class=""><a class="">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if(is_array($element))
                    @foreach ($element as $page => $url)
                        @if($page == $paginator->currentPage())
                            <li class="bg-rqm-yellow-dark px-2 rounded text-rqm-dark"><a class="" tabindex="-1">{{ $page }}</a></li>
                        @else
                            <li class=""><a class="" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            <li class=" @if(!$paginator->hasMorePages()) disabled @endif">
                <a class="" rel="next" href="{{ $paginator->nextPageUrl() }}">Next <i class="fa fa-angle-right"></i></a>
            </li>
        </ul>
    </nav>
@endif
