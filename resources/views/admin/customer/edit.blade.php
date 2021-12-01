@extends('admin.mainMasterPage')
@section('edit')


    <br><br><br><br><br><br>
    <div class="container">
    <form method="post" action="{{route('customer.update',$customer->id)}}">
        @csrf
        @method('PATCH')
        <div class="row mb-5">
            <div class="col-lg-3 mr-5">
                <input name="firstName" type="text" class="form-control" value="{{$customer->firstName}}">
                <small class="text-danger"> @error('firstName') {{$message}}@enderror </small>
            </div>
            <div class="col-lg-3 mr-5">
                <input name="lastName" type="text" class="form-control" value="{{$customer->lastName}}">
                <small class="text-danger"> @error('lastName') {{$message}}@enderror </small>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-lg-3 mr-5">
                <input name="phoneNumber" type="number" class="form-control"  value="{{$customer->phoneNumber}}">
                <small class="text-danger"> @error('phoneNumber') {{$message}}@enderror </small>
            </div>
            <div class="col-lg-3 mr-5">
                <input name="emailAddress" type="email" class="form-control"  value="{{$customer->emailAddress}}">
                <small class="text-danger"> @error('emailAddress') {{$message}}@enderror </small>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
    </div>
@endsection
