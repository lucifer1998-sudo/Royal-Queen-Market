@extends('tailwind-ui.master.main')

@section('title', 'Contact Us')

@section('content')
    <div class="pt-20 w-full">
        <div class="w-full flex">
            <div class="bg-rqm-lighter pb-10 pt-6 px-2 px-7 rounded shadow w-1/5">
                <div class="w-full">
                    <a href="{{ route('profile.tickets') }}">
                        <div class="@if(!$ticket) bg-rqm-yellow font-black text-rqm-dark @else bg-rqm-light text-rqm-yellow @endif px-3 py-1 rounded">
                            New ticket
                        </div>
                    </a>
                    @if(auth() -> user() -> tickets() -> exists())
                        @foreach(auth() -> user() -> tickets as $currTicket)
                            <a href="{{ route('profile.tickets', $currTicket) }}">
                                <div class="@if($currTicket == $ticket) bg-rqm-yellow font-black text-rqm-dark @else bg-rqm-light text-rqm-yellow @endif px-3 py-1 rounded my-2 text-sm">
                                    <span>{{ $currTicket -> title }}</span>
                                    <span class="bg-rqm-yellow-dark px-1 rounded text-rqm-dark shadow">solved</span>
                                    <span class="bg-rqm-yellow-dark px-1 rounded text-rqm-dark shadow">answered</span>
                                </div>
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="bg-rqm-dark ml-5 p-5 w-4/5">
                @if(! $ticket)
                <div class="py-2">
                    <span class="text-2xl text-rqm-yellow">Open new Support Ticket</span>
                </div>
                <div class="p-2">
                    <form action="{{ route('profile.tickets.new') }}" method="POST">
                        {{ csrf_field()  }}
                        <div>
                            <span class="block text-lg text-rqm-yellow">Title</span>
                            <input type="text" name="title" class="bg-rqm-light px-2 py-2 rounded text-rqm-yellow w-full" id="title" aria-describedby="title" placeholder="Enter ticket title">
                        </div>
                        <div>
                            <span class="block text-lg text-rqm-yellow">Message</span>
                            <textarea class="bg-rqm-light px-2 py-2 rounded text-rqm-yellow w-full" name="message" id="title" rows="5" placeholder="Enter ticket content"></textarea>
                            <small class="text-rqm-yellow-darkest">Describe your problem with the market!</small>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-rqm-yellow font-black p-2 rounded text-rqm-dark">
                                Open ticket
                            </button>
                        </div>
                    </form>
                </div>
                @else
                    @include('tailwind-ui.admin.ticket-view-content')
                @endif
            </div>
        </div>
    </div>
@endsection
