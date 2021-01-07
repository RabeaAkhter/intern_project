@extends('partials.main')
@section('content')

<h2>Create Vehicles</h2>



<form method="post" action="{{route('vehicle.post')}}">
@csrf
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
    <input name="vehicletype"required placeholder="car"type="text" class="form-control" id="vehicle.type">
  </div>

  <div class="form-group">
    <label for="vehicle.number">Number plate</label>
    <input name="vehiclenumber"required placeholder="65234"type="number" class="form-control" id="vehicle.type">
  </div>
  <div class="form-group">
    <label for="vehicle.description">Description</label>
    <input name="vehicldescription" placeholder="Has two light"type="text" class="form-control" id="vehicle.description">
  </div>

  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop