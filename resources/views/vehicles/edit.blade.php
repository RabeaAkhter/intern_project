@extends('partials.main')
@section('content')
<h2><b>Edit Vehicle</b></h2>


<form method="post" action="{{route('vehicle.update',$vehicle->id)}}">
@csrf
@method('put')
@if($errors->any())
<ul>@foreach($errors->all() as $error)
     <p class="alert alert-danger">{{$error}}</p>
    @endforeach
</ul>
@endif

@if(session()->has('msg'))
<p class="alert alert-success">{{session()->get('msg')}}</p> 
@endif



  <div class="form-group">
    <label for="vehicle.type">Type</label>
    <input value="{{$vehicle->type}}" name="vehicletype"required placeholder=""type="text" class="form-control" id="vehicle.type">
  </div>

  <div class="form-group">
    <label for="vehicle.number">Number plate</label>
    <input value="{{$vehicle->number_plate}}"name="vehiclenumber"required placeholder=""type="number" class="form-control" id="vehicle.type">
  </div>
  <div class="form-group">
    <label for="vehicle.description">Description</label>
    <input value="{{$vehicle->description}}" name="vehicledescription" placeholder=""type="text" class="form-control" id="vehicle.description">
  </div>

  
  <button type="submit" class="btn btn-primary">Update</button>
</form>

@stop