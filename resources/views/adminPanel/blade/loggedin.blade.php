<!DOCTYPE html>
<head>

</head>
<body>

    @if($errors->any()){
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif



    <h1> successfully logged in </h1>
</body>
