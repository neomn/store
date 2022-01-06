
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('./css/app.css')}}">
    <link rel="stylesheet" href="{{asset('./scss/app.css')}}">
    {{--  font awesome  --}}
    <!-- all.js loads all styles and icons -->
    <script defer src="{{asset('./resources/js/FontAwesome/all.js')}}"></script>
    <title>Document</title>
</head>
<body>
    <div id="app">
        <root></root>
    </div>
<script src={{mix("js/app.js")}}></script>
</body>
</html>
