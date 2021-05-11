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
    <link href="{{ asset('css/profile-bg.css') }}" rel="stylesheet">

</head>
<body class="bg-rqm-dark text-gray-600 work-sans leading-normal text-base tracking-normal">
@if(\Route::currentRouteName() != 'auth.signin' &&  \Route::currentRouteName() != 'auth.signup' &&  \Route::currentRouteName() != 'a.forgot' &&  \Route::currentRouteName() != 'a.mnemonic')
    @include('tailwind-ui.master.navbar')
@endif
<section>
    <div class="container px-6 mx-auto">
        @yield('content')
    </div>
</section>
@if(\Route::currentRouteName() != 'auth.signin' &&  \Route::currentRouteName() != 'auth.signup'  &&  \Route::currentRouteName() != 'a.forgot' &&  \Route::currentRouteName() != 'a.mnemonic')


    <div class="bg-rqm-lighter container inset-0.5 px-6 mx-auto mb-10 mt-10">
    @include('tailwind-ui.master.footer')
    </div>
@endif
</body>
</html>
