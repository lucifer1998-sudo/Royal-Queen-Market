<div class="bg-rqm-yellow flex justify-center my-3 py-1 rounded text-center text-rqm-dark w-full">
    @if(! empty($strongMessage))
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
        <strong class="px-2">{{$strongMessage}}</strong>
    @endif
    {{$message}}
</div>
