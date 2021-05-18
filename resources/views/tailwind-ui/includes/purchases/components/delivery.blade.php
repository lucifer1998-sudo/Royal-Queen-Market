<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
    <div class="bg-rqm-lighter p-5 rounded shadow w-full">
        <h4 class="text-2xl text-gray-400 block text-rqm-yellow">Shipping Method</h4>
        <hr>
        @if ( $purchase -> shipping)
            <table class="table-auto w-full mt-4">
                <thead class="border-b border-rqm-yellow-dark">
                </thead>
                <tbody>
                <tr class="bg-rqm-light">
                    <td class="border-gray-600 px-2 py-2 text-white">
                        Shipping Method Type
                    </td>
                    <td class="px-2 py-2 text-white">
                        {{ $purchase -> shipping -> name }}
                    </td>
                </tr>
                <tr class="bg-rqm-light">
                    <td class="border-gray-600 px-2 py-2 text-white">
                        Estimated Time
                    </td>
                    <td class="px-2 py-2 text-white">
                        {{ $purchase -> shipping -> duration }}
                    </td>
                </tr>
                <tr class="bg-rqm-light">
                    <td class="border-gray-600 px-2 py-2 text-white">
                        Shipping Fee
                    </td>
                    <td class="px-2 py-2 text-white">
                        <strong>@include('includes.currency', ['usdValue' => $purchase -> shipping -> price])</strong>
                    </td>
                </tr>
                </tbody>
            </table>
        @else
            @if($purchase -> isBuyer() && $purchase -> enoughBalance())
                <p class="text-rqm-yellow-dark mt-4">Automatic delivery:</p>
                <textarea class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight bg-rqm-dark border-rqm-yellow-darkest p-3 text-rqm-white  disabled" readonly rows="10">{{ $purchase -> delivered_product }}</textarea>
            @elseif($purchase -> isBuyer())
                <div class="text-red-900 mt-4">
                    You must pay to address and the system will deliver you content here.
                </div>
            @endif
        @endif

    </div>
</div>


{{--<div class="col-md-6">--}}
{{--    <h3 class="mb-2 text-white">Delivery</h3>--}}
{{--    @if($purchase -> shipping)--}}
{{--        <table class="table text-white">--}}
{{--            <tr>--}}
{{--                <td>Shipping name:</td>--}}
{{--                <td>{{ $purchase -> shipping -> name }}</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td>Delivery time:</td>--}}
{{--                <td>{{ $purchase -> shipping -> duration }}</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td>Shipping price:</td>--}}
{{--                <td><strong>@include('includes.currency', ['usdValue' => $purchase -> shipping -> price])</strong></td>--}}
{{--            </tr>--}}
{{--        </table>--}}
{{--    @else--}}
{{--        --}}{{-- If the buyer deposited enough sum --}}
{{--        @if($purchase -> isBuyer() && $purchase -> enoughBalance())--}}
{{--            <p>Automatic delivery:</p>--}}
{{--            <textarea class="form-control disabled" readonly rows="10">{{ $purchase -> delivered_product }}</textarea>--}}
{{--        @elseif($purchase -> isBuyer())--}}
{{--            <div class="alert alert-warning">--}}
{{--                You must pay to address and the system will deliver you content here.--}}
{{--            </div>--}}
{{--        @endif--}}
{{--    @endif--}}
{{--</div>--}}
