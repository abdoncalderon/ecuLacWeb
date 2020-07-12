<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    
    @include('partials._head')

</head>

<body>

    @include('partials._mainNav')

    @include('partials._headerAuth')

    @yield('section')

    @include('partials._mainFooter')

    @include('partials._scripts')
    
</body>

</html>