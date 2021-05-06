<div class="relative bg-rqm-dark flex flex-wrap justify-center rounded shadow w-full h-full">
    <div class="absolute inset-0 bg-repeat h-full opacity-10 w-full" style="background-image: url({{URL::asset('/media/bg.cleaned.png')}})">
        <span></span>
    </div>
    <div class="z-20 p-10 w-full">
        <table class="table-auto w-full">
            <thead class="border-b border-rqm-yellow-dark">
            <tr>
                <th class="px-2 text-center text-left text-rqm-yellow">User</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Type</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Description</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Performed on</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Time</th>
            </tr>
            </thead>
            <tbody>
            @foreach($logs as $index => $log)
                <tr class="@if(!($index % 2)) bg-rqm-light @endif">
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        <div class="flex">
                            <a href="{{route('admin.users.view',$log->user->id)}}" class="underline">
                                {{$log->user->username}}
                            </a>
                        </div>
                    </td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        <div class="flex">
                            {{$log->type}}
                        </div>
                    </td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        {{$log->description}}
                    </td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        <div class="flex">
                            <a href="{{$log->performedOn()['link']}}" class="underline">
                                {{$log->performedOn()['text']}}
                            </a>
                        </div>
                    </td>
                    <td class="border-gray-600 px-2 py-2 text-gray-400">
                        {{$log->created_at}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $logs -> links('tailwind-ui.includes.paginate') }}
    </div>
</div>
