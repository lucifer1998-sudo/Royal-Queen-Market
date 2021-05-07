@extends('tailwind-ui.master.main')

@section('title','Vendors')

@section('content')
    <div class="gap-4 grid grid-cols-4 pt-20 px-40">
        @foreach ($vendors as $vendor)
            <div class="border border-gray-500 flex flex-col py-7 rounded-2xl shadow-md relative">
                <div class="bg-gray-500 bg-opacity-25 flex items-center justify-center px-6 py-3">
                    <div class="break-words text-center text-rqm-yellow w-1/2 font-black">{{ $vendor->username }}</div>
                </div>
                <div class="flex ml-2 mt-2 justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 text-rqm-yellow w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                    </svg>
                    <span class="px-1 text-rqm-white">{{$vendor->feedback == null || $vendor->feedback == '' ? 0 : $vendor->feedback}}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 text-rqm-yellow w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5" />
                    </svg>
                    <span class="px-1 text-rqm-white">{{$vendor->feedback == null || $vendor->feedback == '' ? 0 : $vendor->feedback}}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 text-rqm-yellow w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span class="px-1 text-rqm-white">{{ $vendor->products->count() }}</span>

                </div>
                <div class="flex ml-2 mt-2 justify-center">
                    <a href="{{route('search',['user'=>$vendor->username])}}">
                        <button class="bg-rqm-yellow-dark flex font-extrabold px-6 py-1 rounded-3xl text-rqm-dark">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </span>
                            <span class="px-2 text-rqm-white">View All Products</span>
                        </button>
                    </a>
                </div>
                <div class="absolute bottom-0 mr-2 right-0 text-rqm-white text-xs">Last Seen: {{ $vendor->last_seen ?? 'n/a' }}</div>

            </div>

        @endforeach
    </div>

    {{ $vendors -> links('tailwind-ui.includes.paginate') }}
@endsection
