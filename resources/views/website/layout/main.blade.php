<!doctype html>
<html class="no-js" lang="{{Session::get('locale')}}" dir="{{Session::get('locale') == 'ar'?'rtl':'ltr'}}">
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
