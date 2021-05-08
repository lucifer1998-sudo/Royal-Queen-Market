<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
    <div class="bg-rqm-lighter p-5 rounded shadow w-full">
        <h4 class="text-2xl text-gray-400 block text-rqm-yellow">Offer</h4>
        <table class="table-auto w-full">
            <thead class="border-b border-rqm-yellow-dark">
            </thead>
            <tbody>
                <tr class="bg-rqm-light">
                    <td class="border-gray-600 border-r px-2 py-2 text-white">
                        Purchased amount:
                    </td>
                    <td class="px-2 py-2 text-white">
                        {{ $purchase -> quantity }} {{ str_plural($purchase -> offer -> product -> mesure, $purchase -> quantity) }}
                    </td>
                </tr>
                <tr class="bg-rqm-light">
                    <td class="border-gray-600 border-r px-2 py-2 text-white">
                        Price :
                    </td>
                    <td class="px-2 py-2 text-white">
                        <strong>
                            @include('tailwind-ui.includes.currency', ['usdValue' => $purchase -> offer -> price])
                        </strong>
                        per {{ $purchase -> offer -> product -> mesure }}
                    </td>
                </tr>
                <tr class="bg-rqm-light">
                    <td class="border-gray-600 border-r px-2 py-2 text-white">
                        Total :
                    </td>
                    <td class="px-2 py-2 text-white">
                        <strong>@include('includes.currency', ['usdValue' => $purchase -> value_sum])</strong>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
