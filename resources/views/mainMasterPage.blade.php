<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('bs_css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('tw_css/app.css') }}" rel="stylesheet">
    <title>Laravel</title>
</head>

    <body>
        @include('parts\header')
        @yield('welcome')
        @yield('login_register')
        @yield('preview')
        @yield('edit')
        @include('parts\footer')
        <br>
        <br>
    </body>
</html>
