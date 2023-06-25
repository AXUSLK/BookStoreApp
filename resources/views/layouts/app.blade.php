<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('head')
        @yield('head')
    @else
        <title>Online Book Store - WrightWay</title>
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.png">
    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- start css  -->
    @include('layouts.css')
    <!-- end css -->
</head>

<body>

    <!-- start navigation -->
    @include('layouts.navigation')
    <!-- end navigation -->

    <!-- start content Start -->
    @yield('page-content')
    <!-- end content End -->

    <!-- start footer -->
    @include('layouts.footer')
    <!-- end footer -->

    <!-- start js -->
    @include('layouts.js')
    <!-- end js -->

</body>

</html>
