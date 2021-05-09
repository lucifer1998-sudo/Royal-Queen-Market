<div class="flex">
    <div class="w-full">
        <label class="text-2xl text-gray-400 block text-rqm-yellow text-left ml-5">
            FeedBack ratings
        </label>
    </div>
    <div class="w-full">
        <div class="text-right mr-2">
            <a class="bg-rqm-yellow-dark font-extrabold px-5 py-1 rounded-3xl text-rqm-dark text-center mb-4" href="{{route('vendor.show.feedback',['user'=>$vendor])}}">See all feedback</a>
        </div>
    </div>
</div>
<div class="flex">
    <div class="w-full">
        <table class="table-auto w-full mt-4">
            <tbody>
            <tr class="bg-rqm-light">
                <td class="border-gray-600 px-2 py-2 text-white">
                    Quality :
                </td>
                <td class="px-2 py-2 text-white">
                    @include('tailwind-ui.includes.purchases.stars', ['stars' => $vendor -> vendor -> roundAvgRate('quality_rate')]) ({{ $vendor -> vendor -> avgRate('quality_rate') }})
                </td>
            </tr>
            <tr class="bg-rqm-light">
                <td class="border-gray-600 px-2 py-2 text-white">
                    Communication :
                </td>
                <td class="px-2 py-2 text-white">
                    @include('tailwind-ui.includes.purchases.stars', ['stars' => $vendor -> vendor -> roundAvgRate('communication_rate')]) ({{ $vendor -> vendor -> avgRate('communication_rate') }})
                </td>
            </tr>
            <tr class="bg-rqm-light">
                <td class="border-gray-600 px-2 py-2 text-white">
                    Skipping :
                </td>
                <td class="px-2 py-2 text-white">
                    @include('tailwind-ui.includes.purchases.stars', ['stars' => $vendor -> vendor -> roundAvgRate('shipping_rate')]) ({{ $vendor -> vendor -> avgRate('shipping_rate') }})
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="w-full">
        <div class="row text-center text-white mt-14">
{{--            <div class="col-4">--}}
                <span class="fas fa-plus-circle text-white"></span>
                    {{$vendor->vendor->countFeedbackByType('positive')}}
                    Positive
{{--            </div>--}}
{{--            <div class="col-4">--}}
                <span class="fas fa-stop-circle text-white"></span>
                    {{$vendor->vendor->countFeedbackByType('neutral')}}
                    Neutral
{{--            </div>--}}
{{--            <div class="col-4">--}}
                <span class="fas fa-minus-circle text-white"></span>
                    {{$vendor->vendor->countFeedbackByType('negative')}}
                    Negative
{{--            </div>--}}
        </div>
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

