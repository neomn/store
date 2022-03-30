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

    <nav>
        <a href="{{route('welcome')}}">Home</a>
        <a href="{{route('categories')}}">Product Categories</a>
        <a href="{{route('shopping-card')}}">Shopping Card</a>
        <a href="{{route('about-us')}}">about us</a>
        <a href="{{route('contact-us')}}">contact us</a>
    </nav>

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
                    <td> <a href="{{route('display-product' , $product->product_number )}}"> display product</a></td>
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
                    <td> <a href="{{route('display-product' , $product->product_number )}}"> display product</a></td>
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
                   <td> <a href="{{route('display-product' , $product->product_number )}}"> display product</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <br>

</body>
</html>
