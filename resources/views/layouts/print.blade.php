<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name', 'Laravel') }} @yield('title','')</title>

    <link rel="stylesheet" href="{{ asset('css/ecolacweb_print.css') }}">

</head>

<body>

    @yield('contenidoPrincipal')
    
    @include('partials._scripts')

    @yield('script')
    
</body>

</html>