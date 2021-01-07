@extends('partials.main')
@section('content')

<div class="bg-danger">
<h2 class="d-flex font-bold justify-content-center text-uppercase text-white">Floor List</h2>
<table class="table table-dark">

  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Floor ID</th>
      <th scope="col">Floor Name</th>
      <th scope="col">No. Of Blocks</th>
     
      <th class="text text-center"scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($floors as $key=>$floor)
   <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$floor->id}}</td>
      <td>{{$floor->floor_name}}</td>
      <td>{{$floor->blocks_count}}</td>
    
      <td class="text-center">
      <a class="btn btn-primary"href="{{route('floor.edit',$floor->id)}}">Edit</a>
      <a class="btn btn-danger"href="{{route('floor.delete',$floor->id)}}">Delete</a>
       
       <a class="btn btn-success"href="{{route('floor.all.block',$floor->id)}}">View Blocks</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{$floors->links()}}



</div>











@stop