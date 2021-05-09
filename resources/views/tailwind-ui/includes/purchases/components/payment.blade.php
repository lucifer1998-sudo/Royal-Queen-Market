<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
    <div class="bg-rqm-lighter p-5 rounded shadow w-full">
        <label class="text-2xl text-gray-400 block text-rqm-yellow">
            Payment
        </label>
        <hr>
        <table class="table-auto w-full mt-4">
            <thead class="border-b border-rqm-yellow-dark">
            </thead>
            <tbody>
            <tr class="bg-rqm-light">
                <td class="border-gray-600 px-2 py-2 text-white">
                    To Pay:
                </td>
                <td class="px-2 py-2 text-white">
                    @if($purchase -> isDelivered())
                        <span class="items-center justify-center px-2 py-1 text-xs font-bold text-indigo-100 bg-green-700 rounded">Paid</span>
                    @elseif($purchase -> isCanceled())
                        <span class="items-center justify-center px-2 py-1 text-xs font-bold text-indigo-100 bg-blue-700 rounded">Canceled</span>
                    @elseif($purchase -> isDisputed() && $purchase -> dispute -> isResolved())
                        <span class="items-center justify-center px-2 py-1 text-xs font-bold text-indigo-100 bg-green-700 rounded">Resolved</span>
                    @else
                        {{ $purchase -> coin_sum }} <span class="items-center justify-center px-2 py-1 text-xs font-bold text-indigo-100 bg-indigo-700 rounded">{{ $purchase -> coin_label }}</span>
                    @endif
                </td>
            </tr>
            <tr class="bg-rqm-light">
                <td class="border-gray-600 px-2 py-2 text-white">
                    Address Received
                </td>
                <td class="px-2 py-2 text-white">
                    @if($purchase -> isDelivered())
                        <span class="items-center justify-center px-2 py-1 text-xs font-bold text-indigo-100 bg-green-700 rounded">Paid</span>
                    @elseif($purchase -> isCanceled())
                        <span class="items-center justify-center px-2 py-1 text-xs font-bold text-indigo-100 bg-orange-700 rounded">Canceled</span>
                    @elseif($purchase -> isDisputed() && $purchase -> dispute -> isResolved())
                        <span class="items-center justify-center px-2 py-1 text-xs font-bold text-indigo-100 bg-green-700 rounded">Resolved</span>
                    @else
                        @if($purchase -> coin_balance == 'unavailable')
                            <span class="items-center justify-center px-2 py-1 text-xs font-bold text-indigo-100 bg-red-700 rounded">{{ $purchase -> coin_balance }}</span>
                        @else
                            {{ $purchase -> coin_balance }} <span class="items-center justify-center px-2 py-1 text-xs font-bold text-indigo-100 bg-blue-700 rounded">{{ $purchase -> coin_label }}</span>
                        @endif
                        @if($purchase -> enoughBalance()) <span class="badge badge-success">enough</span> @endif
                    @endif
                </td>
            </tr>
            <tr class="bg-rqm-light">
                <td class="border-gray-600 px-2 py-2 text-white">
                    Address :
                </td>
                <td class="px-2 py-2 text-white">
                    <input type="text" readonly class="appearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight bg-rqm-dark border-rqm-yellow-darkest p-3 text-rqm-white " value="{{ $purchase -> address }}">
                </td>
            </tr>
            <tr class="bg-rqm-light">
                <td class="border-gray-600 px-2 py-2 text-white">
                    State :
                </td>
                <td class="px-2 py-2 text-white">
                    <span class="rounded disabled:opacity-50
                        @if($purchase -> isPurchased()) bg-blue-500 p-1
                        @else btn-outline-secondary
                        @endif">
                        Paid
                    </span>
                    @if($purchase->type=='normal')
                        <span class="pl-1 rounded disabled:opacity-50 @if($purchase -> isSent()) bg-blue-500 p-1 @else btn-outline-secondary @endif">Completed</span>
                    @endif
                    <span class="pl-1 rounded disabled:opacity-50 @if($purchase -> isDelivered()) bg-blue-500 p-1 @else btn-outline-secondary @endif">Shipped</span>
                    <span class="pl-1 rounded disabled:opacity-50 @if($purchase -> isDisputed()) bg-red-500 p-1 @else btn-outline-secondary @endif">Accepted</span>
                    <span class="pl-1 rounded disabled:opacity-50 @if($purchase -> isCanceled()) bg-red-500 p-1 @else btn-outline-secondary @endif">Canceled</span>                </td>
            </tr>
            </tbody>
        </table>
        <div class="text-center mt-5">
            @if($purchase->isPurchased())
                <a href="{{ route('profile.purchases.canceled.confirm', $purchase) }}"
                   class="items-center justify-center p-2 text-lg font-bold text-indigo-100 bg-red-700 rounded">
                    Cancel purchase
                </a>
            @endif


            @if($purchase->type == 'normal' && $purchase -> isPurchased() && $purchase -> isVendor())
                <a href="{{ route('profile.sales.sent.confirm', $purchase) }}"
                   class="items-center justify-center p-2 mx-1 text-lg font-bold text-indigo-100 bg-blue-400 rounded">
                    Mark as sent
                </a>
            @endif

            @if($purchase->type == 'multisig' && $purchase -> isPurchased() && $purchase -> isVendor())
                <a href="{{ route('profile.sales.sent.confirm', $purchase) }}"
                   class="items-center justify-center p-2 mx-1 text-lg font-bold text-indigo-100 bg-blue-400 rounded">
                    Mark as sent
                </a>
            @endif

            @if($purchase->type == 'normal' && $purchase -> isSent() && $purchase -> isBuyer())
                <a href="{{ route('profile.purchases.delivered.confirm', $purchase) }}"
                   class="items-center justify-center p-2 mx-1 text-lg font-bold text-indigo-100 bg-green-700 rounded">
                    Mark as delivered
                </a>
            @endif

            @if($purchase->type == 'multisig' && $purchase -> isSent() && $purchase -> isBuyer())
                <a href="{{ route('profile.purchases.delivered.confirm', $purchase) }}"
                   class="items-center justify-center p-2 mx-1 text-lg font-bold text-indigo-100 bg-green-700 rounded">
                    Mark as delivered
                </a>
            @endif


            @if(!$purchase -> isDisputed() && ($purchase -> isBuyer() || $purchase -> isVendor()))
                <a href="#dispute" class="items-center justify-center p-2 mx-1 text-lg font-bold text-indigo-100 bg-red-700 rounded">
                    Dispute</a>
            @endif
            {{--                    Show to vendor if it is delivered--}}
            @if($purchase->hex && $purchase->isDelivered() && $purchase->isVendor())
                <div class="bg-red-800 text-white">
                    To retrieve funds from this purchase please sign this transaction and send it.
                </div>
                <textarea cols="30" rows="5" class=" mt-3 resize-xappearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight bg-rqm-dark border-rqm-yellow-darkest p-3 text-rqm-white " readonly>{{ $purchase->hex }}</textarea>
            @endif
            {{--                    Show to the winner if it is resolved--}}
            @if($purchase->hex && $purchase->isDisputed() && $purchase->dispute->isResolved() && $purchase->dispute->isWinner())
                <div class="bg-red-500 text-white">
                    To retrieve funds from this purchase please sign this transaction and send it.
                </div>
                <textarea cols="30" rows="5" class=" mt-3 resize-xappearance-none block w-full border rounded py-3 px-4 mb-3 leading-tight bg-rqm-dark border-rqm-yellow-darkest p-3 text-rqm-white " readonly>{{ $purchase->hex }}</textarea>
            @endif
       </div>
        <div class="text-center mt-5">
            @if($purchase -> isPurchased() && $purchase -> isBuyer() && !$purchase -> enoughBalance())
                <div class="bg-red-600 text-white text-center">
                    To proceed with purchase send the enough <em>Bitcoin</em> to the address: <span
                        class="items-center justify-center px-2 py-1 text-xs font-bold text-indigo-100 bg-blue-700 rounded">
                        {{ $purchase -> address }}</span>
                </div>
            @endif

{{--            Purchased vendor--}}
            @if($purchase -> isVendor() && $purchase -> isPurchased() && $purchase -> enoughBalance())
                <div class="bg-red-300 text-white text-center rounded rounded-xl">
                    The buyer has paid sufficient amount on the <em>Escrow</em> address. It's recommended to send the
                    goods now!
                </div>
            @elseif($purchase -> isVendor() && $purchase -> isPurchased())
                <div class="bg-red-500 text-white text-center rounded rounded-xl">
                    The buyer has not paid sufficient amount on the <em>Escrow</em> address. Don't send the goods now!
                </div>
            @endif

{{--            Sent vendor--}}
            @if($purchase -> isBuyer() && $purchase -> isSent())
                <div class="bg-red-500 text-white text-center rounded rounded-xl">
                    By marking this purchase as delivered you will release the funds from the address to the vendors
                    address.
                </div>
            @endif
        </div>

    </div>
</div>


{{--    </table>--}}

{{--    --}}{{-- Instructions for escrow --}}
{{--    --}}{{-- Purchased buyer--}}
{{--    @if($purchase -> isPurchased() && $purchase -> isBuyer() && !$purchase -> enoughBalance())--}}
{{--        <div class="alert alert-warning text-center">--}}
{{--            To proceed with purchase send the enough <em>Bitcoin</em> to the address: <span--}}
{{--                    class="badge badge-info">{{ $purchase -> address }}</span>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--     Purchased vendor --}}
{{--    @if($purchase -> isVendor() && $purchase -> isPurchased() && $purchase -> enoughBalance())--}}
{{--        <div class="alert alert-warning text-center">--}}
{{--            The buyer has paid sufficient amount on the <em>Escrow</em> address. It's recommended to send the--}}
{{--            goods now!--}}
{{--        </div>--}}
{{--    @elseif($purchase -> isVendor() && $purchase -> isPurchased())--}}
{{--        <div class="alert alert-warning text-center">--}}
{{--            The buyer has not paid sufficient amount on the <em>Escrow</em> address. Don't send the goods now!--}}
{{--        </div>--}}
{{--    @endif--}}

{{--     Sent vendor --}}
{{--    @if($purchase -> isBuyer() && $purchase -> isSent())--}}
{{--        <div class="alert alert-warning text-center">--}}
{{--            By marking this purchase as delivered you will release the funds from the address to the vendors--}}
{{--            address.--}}
{{--        </div>--}}
{{--    @endif--}}


{{--</div>--}}
