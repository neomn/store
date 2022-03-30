<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@dd($categories)

    {{-- display web categories --}}
    @foreach($categories as $category)
        @if($category->parent_id==null)
        <a style="margin-left: 15px" href="" >{{$category->category}}</a>#
        @endif
    @endforeach


</body>
</html>
