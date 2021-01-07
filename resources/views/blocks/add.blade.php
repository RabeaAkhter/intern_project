@extends('partials.main')
@section('content')

<h2>Create BLocks</h2>



<form method="post" action="{{route('block.post')}}">
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
    <label for="block.name">Name</label>
    <input name="blockname"required type="text" class="form-control" id="block.name">
  </div>

  <div class="form-group">
    <label for="Floor Name">Floor Name</label>
    <select name="floor_name" id=""class="form-control">

    @foreach($floors as $floor)
    <option value="{{$floor->id}}">{{$floor->floor_name}}</option>
    @endforeach
    
    </select>
  </div>
  
  
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop