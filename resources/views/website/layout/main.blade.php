<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <title>@yield('title')</title>
        @include('website.layout.styles')
        @yield('styles')
    </head>
    <body>
        @include('website.layout.navbar')
        <main>
            @yield('content')
        </main>
        @include('website.layout.footer')
        @include('website.layout.scripts')
        @yield('scripts')
    </body>
</html>
