@extends('partials.main')
@section('content')

<div class="bg-danger">
<h2 class="d-flex font-bold justify-content-center text-uppercase text-white">Vehicles List</h2>
<table class="table table-dark">

  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Vehicle ID</th>
      <th scope="col">Vehicle Type</th>
      <th scope="col">Number Plate</th>
     
      <th class="text text-center"scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($vehicles as $key=>$vehicle)
   <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$vehicle->id}}</td>
      <td>{{$vehicle->type}}</td>
      <td>{{$vehicle->number_plate}}</td>
    
      <td class="text-center">
      <a class="btn btn-primary"href="{{route('vehicle.edit',$vehicle->id)}}">Edit</a>
      <a class="btn btn-danger"href="">Delete</a>
       <a class="btn btn-success"href="{{route('vehicle.view',$vehicle->id)}}">View</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{$vehicles->links()}}



</div>











@stop