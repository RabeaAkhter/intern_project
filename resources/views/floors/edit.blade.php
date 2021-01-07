@extends('partials.main')
@section('content')
<body style="background-image:url({{asset('/backend/image/1.jpg')}})";>


<h2 style="text-align:center;color:red;font-family:verdana;">CREATE FLOOR</h2>
<div class="container" style="padding: 0 265px; color:white">

  <form method="post" action="{{route('floor.update',$floors->id)}}">
  @csrf  
      <div class="form-group px-10">
      <label for="floorname">Floor Name</label>
      <input name="floorname" value="{{$floors->floor_name}}" type="text" class="form-control" id="floorname">
      </div>
    

    
  

    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
  </div>


</body>

@stop