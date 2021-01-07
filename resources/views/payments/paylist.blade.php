
@extends('partials.master')
@section('content')
<a href="{{route('dashboard')}}">Back</a>
<div class="bg-success">

<h2 class="d-flex font-bold justify-content-center text-uppercase text-white">Payment List</h2>
<table class="table table-dark">

  <thead>
    <tr>
      
      <th scope="col">Receipt ID</th>
      <th scope="col">Date</th>
      <th scope="col">Payment</th>
      
      
     
      <th class="text text-center"scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($payments as $payment)
   <tr>
      
      <td>{{$payment->id}}</td>
      <td>{{$payment->date}}</td>
      <td>{{$payment->amount}}</td>
      
  
      <td class="text-center">
      
      <a class="btn btn-danger"href="{{route('payment.delete',$payment->id)}}">Delete</a>
       
      </td>
    </tr>
    @endforeach
  </tbody>

</table>
<button type="submit" onclick="window.print()" class="btn btn-success btn-lg btn-block">
                    Report   <span class="glyphicon glyphicon-chevron-right"></span>
                </button>
</div>
@stop






