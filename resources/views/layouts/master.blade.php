<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @yield('top')
        
    </head>

    <body data-theme="{{ app('theme') }}" class="sidebar-mini">

        @yield('body')
        
        @yield('bottom')

    </body>

</html>


