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

    <!-- top 20 most visited products in recent week-->
    <div class="">
        <table>
            <thead>
                <th>id</th>
                <th>name</th>
            </thead>
            <tbody>
                @foreach($weekProducts as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->product_name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- new products in recent month-->
    <div class="">
        <table>
            <thead>
            <th>id</th>
            <th>name</th>
            </thead>
            <tbody>
            @foreach($recentMonthNewProducts as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->product_name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
