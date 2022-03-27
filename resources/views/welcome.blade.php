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
    <h1>top 20 most visited products in recent week</h1>
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
    <br>
    <br>

    <!-- new products in recent month-->
    <h1>new products in recent month</h1>
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
    <br>
    <br>


    <!-- top 20 most sold products in recent month-->
    <h1>top 20 most sold products in recent month</h1>
    <div class="">
        <table>
            <thead>
            <th>id</th>
            <th>name</th>
            </thead>
            <tbody>
            @foreach($topSold as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->product_name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <br>

</body>
</html>
