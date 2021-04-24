<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @hasSection('title')
        <title>{{config('app.name')}} - @yield('title')</title>
    @else
        <title>{{config('app.name')}}</title>
    @endif

    <!-- Tailwind Css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">
    <link href="{{ asset('css/nordic.css') }}" rel="stylesheet">

</head>
<body class="bg-rqm-lighter text-gray-600 work-sans leading-normal text-base tracking-normal">
@include('tailwind-ui.master.navbar')
@yield('hero')
<section class="bg-white py-8">
    <div class="container py-8 px-6 mx-auto">
        @yield('content')
    </div>
</section>
@include('tailwind-ui.master.footer')
</body>
</html>
