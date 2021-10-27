@extends('mainMasterPage')
@section('login_register')
    <form class="ml-5 mr-5 mb-5 mt-5  ">
        <div class="row mb-5">
            <div class="col-xs-2 mr-5">
                <input type="text" class="form-control" placeholder="First name">
            </div>
            <div class="col-xs-2 mr-5">
                <input type="text" class="form-control" placeholder="Last name">
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-xs-2 mr-5">
                <input type="email" class="form-control" placeholder="Email Address">
            </div>
            <div class="col-xs-2 mr-5">
                <input type="number" class="form-control" placeholder="Phone Number">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
