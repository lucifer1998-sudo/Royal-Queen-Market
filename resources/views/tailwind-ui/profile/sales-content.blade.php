<div class="bg-rqm-dark @if(count($sales) !== 0) content-center @endif flex flex-wrap justify-center p-10 rounded shadow w-full h-full">
    @if(count($sales) !== 0)
    <div class="flex items-center justify-center w-full">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <span>You don't have any sales.</span>
    </div>
    @else
        <table class="table-auto w-full">
            <thead class="border-b border-rqm-yellow-dark">
            <tr>
                <th class="text-left px-2">Product</th>
                <th class="text-left px-2">#</th>
                <th class="text-left px-2">Buyer</th>
                <th class="text-left px-2">Shipping</th>
                <th class="text-left px-2">Total</th>
                <th class="text-left px-2">Address</th>
                <th class="text-left px-2">ID</th>
            </tr>
            </thead>
            <tbody>
            <tr class="bg-rqm-light">
                <td class="border-gray-600 border-r px-2 py-2 text-gray-400">Intro to CSS</td>
                <td class="border-gray-600 border-r px-2 py-2 text-gray-400">Adam</td>
                <td class="border-gray-600 border-r px-2 py-2 text-gray-400">858</td>
                <td class="border-gray-600 border-r px-2 py-2 text-gray-400">858</td>
                <td class="border-gray-600 border-r px-2 py-2 text-gray-400">858</td>
                <td class="border-gray-600 border-r px-2 py-2 text-gray-400">858</td>
                <td class="border-gray-600 px-2 py-2 text-gray-400">858</td>
            </tr>
            <tr class="">
                <td class="border-gray-600 border-r px-2 py-2">Intro to CSS</td>
                <td class="border-gray-600 border-r px-2 py-2">Adam</td>
                <td class="border-gray-600 border-r px-2 py-2">858</td>
                <td class="border-gray-600 border-r px-2 py-2">858</td>
                <td class="border-gray-600 border-r px-2 py-2">858</td>
                <td class="border-gray-600 border-r px-2 py-2">858</td>
                <td class="border-gray-600 px-2 py-2">858</td>
            </tr>
            <tr class="bg-rqm-light">
                <td class="border-gray-600 border-r px-2 py-2 text-gray-400">Intro to CSS</td>
                <td class="border-gray-600 border-r px-2 py-2 text-gray-400">Adam</td>
                <td class="border-gray-600 border-r px-2 py-2 text-gray-400">858</td>
                <td class="border-gray-600 border-r px-2 py-2 text-gray-400">858</td>
                <td class="border-gray-600 border-r px-2 py-2 text-gray-400">858</td>
                <td class="border-gray-600 border-r px-2 py-2 text-gray-400">858</td>
                <td class="border-gray-600 px-2 py-2 text-gray-400">858</td>
            </tr>
            </tbody>
        </table>
    @endif
</div>
