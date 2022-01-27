<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('bs_css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('tw_css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('scss/app.css') }}" rel="stylesheet">
    <title>admin panel</title>
</head>
    <body class="sidebar-mini">
{{--        <div class="wrapper">--}}
{{--            <div class="main-header"></div>--}}
{{--            <div class="sidebar-wrapper"></div>--}}
{{--            <div class="content-wrapper"></div>--}}
{{--        </div>--}}

        <br>
        <br>
        @include('admin\parts\footer')
        <script src="{{asset('js/admin.js')}}"></script>
    </body>
</html>
