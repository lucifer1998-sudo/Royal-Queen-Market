<div class="flex">
    <div class="w-full">
        <label class="text-2xl text-gray-400 block text-rqm-yellow text-left ml-5">
            Feedback's
        </label>
    </div>
<!--     <div class="w-full">
        <div class="text-right mr-2">
            <a class="bg-rqm-yellow-dark font-extrabold px-5 py-1 rounded-3xl text-rqm-dark text-center mb-4" href="{{route('vendor.show.feedback',['user'=>$vendor])}}">See all feedback</a>
        </div>
    </div> -->
</div>
<div class="flex">
    <div class="w-full">
        <table class="table-auto w-full">
            <thead class="border-b border-rqm-yellow-dark">
                <tr>
                    <th class="px-2 text-center text-left text-rqm-yellow">Quality</th>
                    <th class="px-2 text-center text-left text-rqm-yellow">Communication</th>
                    <th class="px-2 text-center text-left text-rqm-yellow">Skipping</th>
                </tr>
            </thead>
            <tbody class="text-center">
            <tr>
                <td class="border-gray-600 border-r px-2 py-2 text-rqm-white">
                    @include('tailwind-ui.includes.purchases.stars', ['stars' => $vendor -> vendor -> roundAvgRate('quality_rate')]) ({{ $vendor -> vendor -> avgRate('quality_rate') }})
                </td>
                <td class="border-gray-600 border-r px-2 py-2 text-rqm-white">
                    @include('tailwind-ui.includes.purchases.stars', ['stars' => $vendor -> vendor -> roundAvgRate('communication_rate')]) ({{ $vendor -> vendor -> avgRate('communication_rate') }})
                </td>
                <td class="border-gray-600 border-r px-2 py-2 text-rqm-white">
                    @include('tailwind-ui.includes.purchases.stars', ['stars' => $vendor -> vendor -> roundAvgRate('shipping_rate')]) ({{ $vendor -> vendor -> avgRate('shipping_rate') }})
                </td>
            </tr>
            <tr >
                <td class="border-gray-600 border-r px-2 py-2 text-rqm-white">{{$vendor->vendor->countFeedbackByType('positive')}}
                    Positive</td>
                <td class="border-gray-600 border-r px-2 py-2 text-rqm-white">{{$vendor->vendor->countFeedbackByType('neutral')}}
                    Neutral</td>
                <td class="border-gray-600 border-r px-2 py-2 text-rqm-white">{{$vendor->vendor->countFeedbackByType('negative')}}
                    Negative</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

{{--<div class="row">--}}

{{--    <div class="col-md-4 col-sm-6">--}}
{{--        <span>--}}
{{--            @include('tailwind-ui.includes.purchases.stars', ['stars' => $vendor -> vendor -> roundAvgRate('quality_rate')]) ({{ $vendor -> vendor -> avgRate('quality_rate') }})--}}
{{--        </span>--}}
{{--        <span> <br>--}}
{{--            @include('tailwind-ui.includes.purchases.stars', ['stars' => $vendor -> vendor -> roundAvgRate('communication_rate')]) ({{ $vendor -> vendor -> avgRate('communication_rate') }})--}}
{{--        </span> <br>--}}
{{--        <span>--}}
{{--            @include('tailwind-ui.includes.purchases.stars', ['stars' => $vendor -> vendor -> roundAvgRate('shipping_rate')]) ({{ $vendor -> vendor -> avgRate('shipping_rate') }})--}}
{{--        </span>--}}
{{--    </div>--}}
{{--    <div class="col-md-5 mt-sm-3">--}}


{{--    </div>--}}


{{--</div>--}}

