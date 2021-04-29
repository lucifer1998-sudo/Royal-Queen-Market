<div class="relative bg-rqm-dark flex flex-wrap justify-center rounded shadow w-full h-full">
    <div class="absolute inset-0 bg-repeat h-full opacity-10 w-full" style="background-image: url({{URL::asset('/media/bg.cleaned.png')}})">
        <span></span>
    </div>
    <div class="z-20 p-10 w-full">
        @if($ticket -> solved)
            <div class="bg-rqm-lighter justify-around p-10 rounded-2xl text-2xl text-rqm-yellow">
            <div class="flex justify-center w-full">This ticket is solved.</div>
            <div class="flex justify-center pt-5 text-2xl text-base text-rqm-yellow-darkest w-full">{{ $ticket -> title }}</div>
            <div class="flex justify-center pt-5 text-base text-rqm-yellow-darkest w-full">
                <a href="{{ route('admin.tickets.solve', $ticket) }}">
                    <button type="submit" class="bg-rqm-yellow-dark font-extrabold p-2 rounded-sm text-rqm-dark text-base">
                        Re-open
                    </button>
                </a>
            </div>
        </div>
        @else
            <div class="bg-rqm-lighter justify-center mt-2 py-5 rounded-2xl text-base text-center text-rqm-yellow-darkest w-full">
                <div class="flex justify-center pt-5 text-2xl text-base text-rqm-yellow-darkest w-full">{{ $ticket -> title }}</div>
                <form method="POST" action="{{ route('profile.tickets.message.new', $ticket) }}" class="p-5">
                    {{ csrf_field() }}

                    <textarea class="bg-rqm-dark border border-rqm-yellow-darkest p-3 text-rqm-yellow w-full" name="message" id="title" rows="5" placeholder="Enter ticket reply"></textarea>

                    <div class="flex justify-end">
                        <a href="{{ route('admin.tickets.solve', $ticket) }}" class="mx-2">
                            <button type="button" class="bg-rqm-yellow-dark font-extrabold px-3 py-1 rounded-sm text-rqm-dark">
                                Close ticket
                            </button>
                        </a>
                        <button type="submit" class="bg-rqm-yellow-dark font-extrabold px-3 py-1 rounded-sm text-rqm-dark">
                            Post message
                        </button>
                    </div>
                </form>
            </div>
        @endif
            @foreach($replies as $reply)
                <div class="bg-rqm-lighter justify-center mt-2 py-5 rounded-2xl text-base text-center text-rqm-yellow-darkest w-full">
                    <div class="justify-center text-rqm-yellow w-full">{{ $reply -> text }}</div>
                    <div class="text-xs w-full justify-center">by {{ $reply -> user -> username }}, {{ $reply -> time_passed }}</div>
                </div>
            @endforeach
    </div>
</div>
