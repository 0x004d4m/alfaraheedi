<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        @include('website.layout.styles')
        @yield('styles')
    </head>
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        @include('website.layout.styles')
        @include('website.layout.navbar')
        @yield('content')
        @include('website.layout.footer')
        @include('website.layout.loader')
        @include('website.layout.scripts')
        @yield('scripts')
    </body>
</html>
