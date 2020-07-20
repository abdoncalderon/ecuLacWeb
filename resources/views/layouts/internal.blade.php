<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    
    @include('partials._head')

</head>

<body>

    @include('partials._mainNav')

    @include('partials._headerInternal')

    @include('partials._sectionInternal')

    @include('partials._mainFooter')

    @yield('script')

    @include('partials._scripts')
    
</body>

</html>