{{--<footer class="flex  py-10">--}}
<?php

include app_path() . '\include_exr_api.php';

?>
<footer class="flex justify-center text-center py-10 px-10 bg-rqm-lighter m-10 rounded-2xl">
        <div class="m-auto">
            <img src="{{URL::asset('/media/royal-queen-logo.png')}}" class="w-40 -ml-6 " alt="" style="height:auto;width:300px">
        </div>
        <div class="vl"></div>
        <div class=" justify-center pt-2 flex-grow" >
                <ul>
                    <h2 class="text-rqm-yellow-darkest"><u>Categories</u></h2>
                    <li class="text-white">WEED</li>
                    <li class="text-white">HASH</li>
                    <li class="text-white">Concentrate</li>
                    <li class="text-white">Seeds</li>
                    <li class="text-white">Others</li>
                    <li class="text-white">Lorem</li>
                </ul>
            </div>
        <div class="justify-center pt-2 flex-grow">
                <ul>
                    <h2 class="text-rqm-yellow-darkest"><u>Help</u></h2>
                    <li class="text-white">First Steps</li>
                    <li class="text-white">Security</li>
                    <li class="text-white">Orders</li>
                    <li class="text-white">Payment</li>
                    <li class="text-white">Shipping</li>
                    <li class="text-white">Become a Vendor</li>
                    <li class="text-white">Contact Us</li>
                </ul>
            </div>
        <div class="justify-center pt-2 flex-grow">
                <ul>
                    <h2 class="text-rqm-yellow-darkest">Bitcoin Exchanges</h2>
                    <li class="bg-gray text-white mb-2">USD
                    <span>{{ $responseBtc->data->quote->USD->price }}</span>
                    </li>
                    <li class="bg-gray text-white mb-2">Euro
                        <span>{{ $responseBtc->data->quote->EUR->price }}</span>
                    </li>
                    <li class="bg-gray text-white mb-2">GRP
                        <span>{{ $responseBtc->data->quote->GBP->price }}</span>
                    </li>
                    <li class="bg-gray text-white mb-2">JPY
                        <span>{{ $responseBtc->data->quote->JPY->price }}</span>
                    </li>
                </ul>
            </div>
        <div class="justify-center pt-2 mr-2 flex-grow" style="margin-left: 20px">
                <ul>
                    <h2 class="text-rqm-yellow-darkest">Monero Exchange</h2>
                    <li class="bg-gray text-white mb-2">USD
                        <span>{{ $responseXmr->data->quote->USD->price }}</span>
                    </li>
                    <li class="bg-gray text-white mb-2">Euro
                        <span>{{ $responseXmr->data->quote->EUR->price }}</span>
                    </li>
                    <li class="bg-gray text-white mb-2">GBP
                        <span>{{ $responseXmr->data->quote->GBP->price }}</span>
                    </li>
                    <li class="bg-gray text-white mb-2">JPY
                        <span>{{ $responseXmr->data->quote->JPY->price }}</span>
                    </li>
                </ul>
            </div>
</footer>
<div class="flex px-32">
    <div class="f5 ">
        <a class="text-white" href="">Copyright © Royal Queen 2021- All rights reserved</a>
    </div>
    <div class="justify-end"><span class="text-white"> Current Time (UTC) : @php print_r(date('h:i a')) @endphp</span></div>

</div>
<div class="flex bg-rqm-lighter m-10 py-6 rounded-2xl"></div>
