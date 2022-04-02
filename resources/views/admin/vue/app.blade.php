<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{--csrf token--}}
    <meta name="csrf-token" content="{{csrf_token()}}" >

    {{--  Style  --}}
    <link rel="stylesheet" href="../css/web.css">
    <title>Store > Admin Panel</title>
</head>
<body>
    <div id="web">
        <App></App>
    </div>
<script src="{{mix('/js/admin/admin.js')}}"></script>
</body>
</html>

