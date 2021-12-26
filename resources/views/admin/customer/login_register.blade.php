@extends('admin.mainMasterPage')
@section('login_register')

    {{--
    @if($errors->any()){
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    --}}

    @if(session('message'))
        <div>
            {{session('message')}}
        </div>
    @endif

    <br><br><br><br><br><br>
    <div class="container ">
        <form method="post" action='{{route('admin.customer.store')}}' class="ml-5 mr-5 mb-5 mt-5">
          @csrf
         <div class="row mb-5 ">
            <div class="col-lg-3 mr-5" >
                <input name="firstName" type="text" class="form-control " placeholder='first Name' value="{{old('firstName')}}">
                <small class="text-danger"> @error('firstName') {{$message}}@enderror </small>
            </div>
            <div class="col-lg-3 mr-5">
                <input name="lastName" type="text" class="form-control" placeholder="Last name" value="{{old('lastName')}}">
                <small class="text-danger"> @error('lastName') {{$message}}@enderror </small>
            </div>
        </div>
        <div class="row mb-5 ">
            <div class="col-lg-3 mr-5">
                <input name="phoneNumber" type="number" class="form-control" placeholder="Phone Number" value="{{old('phoneNumber')}}">
                <small class="text-danger"> @error('phoneNumber') {{$message}}@enderror </small>
            </div>
            <div class="col-lg-3 mr-5">
                <input name="emailAddress" type="email" class="form-control " placeholder="Email Address" value="{{old('emailAddress')}}">
                <small class="text-danger"> @error('emailAddress') {{$message}}@enderror </small>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

@endsection
