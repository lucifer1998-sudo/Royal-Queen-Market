<div class="relative bg-rqm-dark flex flex-wrap justify-center rounded shadow w-full h-full">
    <div class="absolute inset-0 bg-repeat h-full opacity-10 w-full" style="background-image: url({{URL::asset('/media/bg.cleaned.png')}})">
        <span></span>
    </div>
    <div class="z-20 p-10 w-full">
        <table class="table-auto w-full">
            <thead class="border-b border-rqm-yellow-dark">
            <tr>
                <th class="px-2 text-center text-left text-rqm-yellow">Purchase</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Buyer</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Vendor</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Winner</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Total</th>
                <th class="px-2 text-center text-left text-rqm-yellow">Time</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allDisputes as $index => $dispute)
                <tr class="@if(!($index % 2)) bg-rqm-light @endif">
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        <div class="flex">
                            <a href="{{ route('admin.purchase', $dispute -> purchase) }}" class="underline">
                                {{ $dispute -> purchase -> short_id }}
                            </a>
                        </div>
                    </td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        <div class="flex">
                            {{ $dispute -> purchase -> buyer -> username }}
                        </div>
                    </td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        <div class="flex">
                            <a href="{{ route('vendor.show', $dispute -> purchase -> vendor) }}" class="underline">
                                {{ $dispute -> purchase -> vendor -> user -> username }}
                            </a>
                        </div>
                    </td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        @if($dispute -> isResolved())
                            {{ $dispute -> winner -> username }}
                        @else
                            <span class="text-red-500">Unresolved</span>
                        @endif
                    </td>
                    <td class="border-gray-600 border-r px-2 py-2 text-gray-400">
                        {{$dispute->purchase->getSumLocalCurrency()}} {{$dispute -> purchase->getLocalSymbol()}}
                    </td>
                    <td class="border-gray-600 px-2 py-2 text-gray-400">
                        {{ $dispute -> timeDiff() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $allDisputes -> links('tailwind-ui.includes.paginate') }}
    </div>
</div>
