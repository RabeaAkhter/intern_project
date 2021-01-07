@extends('partials.main')
@section('content')
<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="get" action="{{route('payment.search')}}">
                <div class="input-group">
                    <input class="form-control" name="query" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>

<div class="bg-danger">
<h2 class="d-flex font-bold justify-content-center text-uppercase text-white">Parking List For Payment</h2>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Parking ID</th>
      <th scope="col">Slot Name</th>
      <th scope="col">Number Plate</th>
      <th scope="col">Name</th>
      <th scope="col">Mobile</th>
      <th scope="col">Arrive</th>
      <th scope="col">SLot Status</th>
      <th class="text text-center"scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($parkings as $key=>$parking)
  @php
  $timeFrom=date('h:i:s',strtotime($parking->arrive));
  @endphp
  
   <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$parking->id}}</td>
      <td>{{optional($parking->slot)->slot_name}}</td>
      <td>{{$parking->number_Plate}}</td>
      <td>{{$parking->customer_name}}</td>
      <td>{{$parking->mobile}}</td>
      <td>{{$timeFrom}}</td>
      <td>{{$parking->status}}</td>

      
    
      
    
      <td class="text-center">
      <a class="btn btn-success"href="{{route('payment.form',$parking->id)}}">Payment</a>
     
      
       
      </td>
    </tr>
    @endforeach
  </tbody>
</table>




</div>











@stop