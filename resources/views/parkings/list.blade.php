@extends('partials.main')
@section('content')

<div class="bg-danger">
<h2 class="d-flex font-bold justify-content-center text-uppercase text-white">Parking List</h2>
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
      <th scope="col">Status</th>
      <th class="text text-center"scope="col">Action</th>
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
      <a class="btn btn-primary"href="{{route('parking.edit',$parking->id)}}">Edit</a>
      <a class="btn btn-danger"href="{{route('parking.delete',$parking->id)}}">Delete</a>
      <a class="btn btn-success"href="">View</a>
       
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{$parkings->links()}}



</div>











@stop