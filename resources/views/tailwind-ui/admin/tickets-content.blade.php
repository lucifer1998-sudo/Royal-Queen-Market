<div class="relative bg-rqm-dark flex flex-wrap justify-center rounded shadow w-full h-full">
    <div class="absolute inset-0 bg-repeat h-full opacity-10 w-full" style="background-image: url({{URL::asset('/media/bg.cleaned.png')}})">
        <span></span>
    </div>
    <div class="z-20 p-10 w-full">
        <div class="pb-10 w-full">
            <form action="{{route('admin.tickets.remove')}}"  method="POST" class="flex w-full">
                {{ csrf_field() }}
                <div class="grid grid-flow-col grid-cols-3 grid-rows-1 gap-4 w-full">
                    <div class="flex">
                        <input type="number" name="days" class="bg-rqm-dark border border-rqm-yellow-darkest p-2 rounded text-rqm-yellow w-1/2 w-full" placeholder="Older than" aria-label="Days">
                        <button name="type" value="orlder_than_days" type="submit" class="bg-rqm-yellow-dark font-extrabold ml-1 mr-5 p-2 rounded-sm text-base text-rqm-dark w-1/2 w-full">
                            Remove
                        </button>
                    </div>
                    <div>
                        <button name="type" value="solved" type="submit" class="bg-rqm-yellow-dark font-extrabold p-2 rounded-sm text-rqm-dark text-base w-full">
                            Remove solved tickets
                        </button>
                    </div>
                    <div>
                        <button name="type" value="all" type="submit" class="bg-rqm-yellow-dark font-extrabold p-2 rounded-sm text-rqm-dark text-base w-full">
                            Remove all tickets
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <table class="table-auto w-full">
            <thead class="border-b border-rqm-yellow-dark">
            <tr>
                <th class="px-2 text-center text-left text-rqm-yellow">Title</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Opened by</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Time</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tickets as $index => $ticket)
                <tr class="@if(!($index % 2)) bg-rqm-light @endif">
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        <a href="{{ route('admin.tickets.view', $ticket) }}" class="">
                            {{ $ticket -> title }}
                        </a>
                        @if($ticket -> solved)
                            <span class="bg-rqm-yellow-darkest font-black ml-3 px-2 rounded-full text-rqm-dark text-xs">Solved</span>
                        @else
                            @if($ticket -> answered)
                                <span class="bg-rqm-yellow-dark font-black ml-3 px-2 rounded-full text-rqm-dark text-xs">Answered</span>
                            @endif
                        @endif
                    </td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        {{ $ticket -> user -> username }}
                    </td>
                    <td class="border-gray-600 px-2 py-2 text-gray-400 text-center">
                        {{ $ticket -> time_passed }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $tickets -> links('tailwind-ui.includes.paginate') }}
    </div>
</div>
