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
    <link rel="shortcut icon" href="/assets/images/favicon.ico">
    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- css  -->
    @include('layouts.css')
    <!-- /.css -->
</head>

<body>

    <!-- start nav-bar -->
    @include('layouts.navigation')
    <!-- end nav-bar -->

    <!-- Main Content Start -->
    @yield('page-content')
    <!-- Main Content End -->

    <!-- start footer -->
    @include('layouts.js')
    <!-- end footer -->

</body>

</html>
