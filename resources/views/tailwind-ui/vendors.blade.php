@extends('tailwind-ui.master.main')

@section('title','Vendors')

@section('content')
    <div class="grid grid-flow-col grid-cols-4 grid-rows-{{ceil(count($vendors) / 4)}} gap-7">
    @foreach ($vendors as $vendor)
            <div class="bg-rqm-light p-5 rounded shadow relative">
                <div class="flex pb-5">
                    <div class="w-2/3">
                        <div class="">
                            <span class="block text-2xl text-rqm-yellow-dark truncate">{{ $vendor->username}}</span>
                        </div>
                        <div class="flex justify-start">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 text-gray-400 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                </svg>
                                <span class="px-1">{{$vendor->feedback == null || $vendor->feedback == '' ? 0 : $vendor->feedback}}</span>
                            </div>
                            <div class="flex mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 text-gray-400 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5" />
                                </svg>
                                <span class="px-1">{{$vendor->feedback == null || $vendor->feedback == '' ? 0 : $vendor->feedback}}</span>
                            </div>
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 text-gray-400 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span class="px-1">{{ $vendor->products->count() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-rqm-dark flex hover:bg-rqm-light hover:grow hover:shadow-md items-center shadow text-justify text-rqm-yellow-darkest text-sm">
                        <button>View all products</button>
                    </div>
                </div>
                <div class="absolute bottom-0 mr-2 right-0 text-gray-500 text-xs">Last Seen: {{ $vendor->last_seen ?? 'n/a' }}</div>
            </div>
    @endforeach
    </div>

    {{ $vendors -> links('tailwind-ui.includes.paginate') }}
@endsection
