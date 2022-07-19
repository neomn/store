<!DOCTYPE html>

@extends('admin.blade.mainMasterPage')
@section('preview')


        <div class="container " >


                    @if(session('update'))
                        <div class="alert alert-info">
                            {{\Illuminate\Support\Facades\Session::pull('update')}}
                        </div>
                    @endif()
                        @if(session('destroy'))
                            <div class="alert alert-danger">
                                {{\Illuminate\Support\Facades\Session::pull('destroy')}}
                            </div>
                        @endif()
                        @if(session('store'))
                            <div class="alert alert-success">
                                {{\Illuminate\Support\Facades\Session::pull('store')}}
                            </div>
                        @endif()

            <table class="table table-striped table-dark table-hover">
                <thead>
                    <tr>
                        <th scope="col" >ID</th>
                        <th scope="col" >First Name</th>
                        <th scope="col" >Last Name</th>
                        <th scope="col" >Phone Number</th>
                        <th scope="col" >Email Address</th>
                        <th scope="col" >Operations</th>
                    </tr>

                @foreach($customer as $customer)
                <tbody>
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$customer->firstName}}</td>
                        <td>{{$customer->lastName}}</td>
                        <td>{{$customer->phoneNumber}}</td>
                        <td>{{$customer->emailAddress}}</td>
                        <td>
                            <form class="d-inline" action="{{route('admin.customer.edit',$customer->id)}}" >
                                <button type="submit" class="btn btn-outline-info btn-sm">Edit</button>
                            </form>

                            <form class="d-inline" method="post" action="{{route('admin.customer.destroy',$customer->id)}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>

@endsection
