<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('bs_css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('tw_css/admin.css') }}" rel="stylesheet">
    <title>Laravel</title>
</head>

    <body>
        @include('admin\parts\header')
        @yield('admin\welcome')
        @yield('login_register')
        @yield('preview')
        @yield('edit')
        @include('admin\parts\footer')
        <script src="{{asset('js/admin.js')}}"></script>
        <br>
        <br>
    </body>
</html>
