@extends('admin.blade.mainMasterPage')
@section('welcome')
<a class="twbg-yellow-500" href="{{route('admin.customer.index')}}"> show customers </a><br>
<a class="twbg-yellow-500" href="{{route('admin.customer.create')}}"> create customers  <i class="fad fa-adjust"></i>  </a><br>
<tb>
    <th><i class="fad fa-adjust"></i></th>
</tb>
<br>
<p>  <i class="fas fa-adjust twbg-white m-lg-3"></i>   </p>
@endsection

