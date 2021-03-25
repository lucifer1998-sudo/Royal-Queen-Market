<?php

include app_path() . '\include_exr_api.php';

?>

<footer class="container-fluid page-bg-color mt-4">
    <div class="container mt-4">

        <div class="row mt-4 mb-4">
            <div class="col-md-10 offset-md-1 mt-4">
                <div class="row">

                    <div class="col-md-4 p-2">
                        <div class="bg-border pt-4 pb-4">
                            <h6 class="text-warning text-center">BITCOIN EXCHANGE</h6>
                            <div class="row text-white px-4">
                                <div class="col-lg-2 offset-lg-2 col-3"><span>USD</span></div>
                                <div class="col-lg-4 offset-lg-2 text-end col-9"><span>{{ $BTC2USD }}</span></div>

                                <div class="col-lg-2 offset-lg-2 col-3"><span>EUR</span></div>
                                <div class="col-lg-4 offset-lg-2 text-end col-9"><span>{{ $BTC2EUR }}</span></div>

                                <div class="col-lg-2 offset-lg-2 col-3"><span>GBP</span></div>
                                <div class="col-lg-4 offset-lg-2 text-end col-9"><span>{{ $BTC2GBP }}</span></div>

                                <div class="col-lg-2 offset-lg-2 col-3"><span>JPY</span></div>
                                <div class="col-lg-4 offset-lg-2 text-end col-9"><span>{{ $BTC2JPY }}</span></div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-2">
                        <div class="bg-border pt-4 pb-4">
                            <h6 class="text-warning text-center">MONERO EXCHANGE</h6>
                            <div class="row text-white px-4">
                                <div class="col-lg-2 offset-lg-2 col-3"><span>USD</span></div>
                                <div class="col-lg-4 offset-lg-2 text-end col-9"><span>{{ $XMR2USD }}</span></div>

                                <div class="col-lg-2 offset-lg-2 col-3"><span>EUR</span></div>
                                <div class="col-lg-4 offset-lg-2 text-end col-9"><span>{{ $XMR2EUR }}</span></div>

                                <div class="col-lg-2 offset-lg-2 col-3"><span>GBP</span></div>
                                <div class="col-lg-4 offset-lg-2 text-end col-9"><span>{{ $XMR2GBP }}</span></div>

                                <div class="col-lg-2 offset-lg-2 col-3"><span>JPY</span></div>
                                <div class="col-lg-4 offset-lg-2 text-end col-9"><span>{{ $XMR2JPY }}</span></div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-2">
                        <div class="bg-border pt-4 pb-4">
                            <h6 class="text-warning text-center">ETHERIUM EXCHANGE</h6>
                            <div class="row text-white px-4">
                                <div class="col-lg-2 offset-lg-2 col-3"><span>USD</span></div>
                                <div class="col-lg-4 offset-lg-2 text-end col-9"><span>{{ $ETH2USD }}</span></div>

                                <div class="col-lg-2 offset-lg-2 col-3"><span>EUR</span></div>
                                <div class="col-lg-4 offset-lg-2 text-end col-9"><span>{{ $ETH2EUR }}</span></div>

                                <div class="col-lg-2 offset-lg-2 col-3"><span>GBP</span></div>
                                <div class="col-lg-4 offset-lg-2 text-end col-9"><span>{{ $ETH2GBP }}</span></div>

                                <div class="col-lg-2 offset-lg-2 col-3"><span>JPY</span></div>
                                <div class="col-lg-4 offset-lg-2 text-end col-9"><span>{{ $ETH2JPY }}</span></div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-2 offset-md-5 mb-4 mt-4">
                <img src="{{URL::asset('/media/royal-queen-logo.png')}}" class="img-fluid" alt="">
            </div>

            <div class="col-md-12 text-center">
                <h4 class="text-white mb-0">CATEGORIES</h4>
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link  text-info" href="#">WEED</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-info" href="#">HASH</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-info" href="#">EDIBLES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-info" href="#">VAPES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-info" href="#">OTHERS</a>
                    </li>

                </ul>
            </div>

            <div class="col-md-12 text-center mb-4">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#">WHO WE ARE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">STEPS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">BECOME A VENDOR</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">SHIPPING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">PRIVACY POLICY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTACT US</a>
                    </li>

                </ul>
            </div>
            <div class="col-md-12 text-center mb-4">
                <a href="">© Royal Queen 2021</a>
            </div>

        </div>
    </div>
</footer>
