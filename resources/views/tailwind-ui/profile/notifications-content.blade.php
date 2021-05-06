<div class="bg-rqm-dark @if( empty($notifications) ) content-center @endif flex flex-wrap justify-center p-10 rounded shadow w-full h-full">
    @if( $notifications->count() == 0 )
        <div class="flex items-center justify-center w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
            </svg>
            <span>You don't have any notifications.</span>
        </div>
    @else
        <div class="w-full">
            <form action="{{route('profile.notifications.delete')}}" method="post">
                {{csrf_field()}}
                <div>
                    <button type="submit" class="bg-rqm-yellow-dark font-extrabold px-3 py-1 rounded-sm text-rqm-dark">
                        Delete Notifications
                    </button>
                </div>
            </form>
            <table class="table-auto w-full">
                <thead class="border-b border-rqm-yellow-dark">
                <tr>
                    <th class="px-2 text-center text-left text-rqm-yellow">Notification</th>
                    <th class="px-2 text-center text-left text-rqm-yellow">Time</th>
                    <th class="px-2 text-center text-left text-rqm-yellow">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($notifications as $index => $notification)
                    <tr class="@if(!($index % 2)) bg-rqm-light @endif">
                        <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                            {{$notification->description}}
                        </td>
                        <td class="border-gray-600 border-r px-2 py-2 text-gray-400 text-center">
                            {{$notification->created_at->diffForHumans()}}
                        </td>
                        <td class="border-gray-600 px-2 py-2 text-gray-400 text-center">
                            @if($notification->getRoute() !== null )
                                <a href="{{route($notification->getRoute(),$notification->getRouteParams())}}" class="underline"> View</a>
                            @else
                                None
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
