<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <title>FAQs ✨ Royal Queen Market</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/app.css">
    <link href="{{ URL::asset('css/rqm-app.css') }}" rel="stylesheet" type="text/css">
    <link rel="icon" href="{{URL::asset('/media/rqm-icon.png')}}" type="image/png" sizes="16x16">

</head>

<body id="main">

        @include('master.navbar')
        @include('includes.jswarning')


    <div class="container faq-margin-top p-4">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h1 class="text-warning h2 mb-4 text-center">Frequently Asked Questions</h1>
                <h2 class="text-white h5 mb-4 text-center">Explore our help and find the answers to your questions</h2>
                <div class="row">
                    <div class="col-md-5 offset-md-1 mb-4">
                        <div class="border rounded-3 p-4 bg-dark">
                            <h3 class="h5 text-info"><i class="fas fa-angle-right"></i> First Steps</h3>
                            <p class="text-white">You are new here and need help with setting up your profile and
                                placing your first order?</p>
                        </div>
                    </div>
                    <div class="col-md-5 mb-4">
                        <div class="border rounded-3 p-4 bg-dark">
                            <h3 class="h5 text-info"><i class="fas fa-user-shield"></i> Security & Privacy</h3>
                            <p class="text-white">You are new here and need help with setting up your profile and
                                placing your first order?</p>
                        </div>
                    </div>
                    <div class="col-md-5 offset-md-1 mb-4">
                        <div class="border rounded-3 p-4 bg-dark">
                            <h3 class="h5 text-info"><i class="fas fa-shopping-cart"></i> Orders</h3>
                            <p class="text-white">For questions about orders, auto-finalize and ratings. Have a look here...</p>
                        </div>
                    </div>
                    <div class="col-md-5 mb-4">
                        <div class="border rounded-3 p-4 bg-dark">
                            <h3 class="h5 text-info"><i class="far fa-credit-card"></i> Payment Inquiries</h3>
                            <p class="text-white">You are new here and need help with setting up your profile and
                                placing your first order?</p>
                        </div>
                    </div>
                    <div class="col-md-5 offset-md-1 mb-4">
                        <div class="border rounded-3 p-4 bg-dark">
                            <h3 class="h5 text-info"><i class="fas fa-angle-right"></i> Shipping & Returns</h3>
                            <p class="text-white">Find information and recommendations about shipping & packaging and returns policy</p>
                        </div>
                    </div>
                    <div class="col-md-5 mb-4">
                        <div class="border rounded-3 p-4 bg-dark">
                            <h3 class="h5 text-info"><i class="fas fa-store"></i> Become a Vendor</h3>
                            <p class="text-white">Looking for requirements, rules and other information for vendors?</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


    @include('footer')


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
</script>

</html>
