@extends('partials.main')
@section('content')

<div class="bg-danger">
<h2 class="d-flex font-bold justify-content-center text-uppercase text-white">BLock List</h2>
<table class="table table-dark">

  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Block ID</th>
      <th scope="col">Block Name</th>
      <th scope="col">Floor Name</th>
      <th scope="col">No. Of slots</th>
     
      <th class="text text-center"scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($blocks as $key=>$block)
   <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$block->id}}</td>
      <td>{{$block->name}}</td>
      
      <td>{{$block->floor->floor_name}}</td>
      <td>{{$block->slots_count}}</td>
    
      <td class="text-center">
      <a class="btn btn-primary"href="{{route('block.edit',$block->id)}}">Edit</a>
      <a class="btn btn-danger"href="{{route('block.delete',$block->id)}}">Delete</a>
       <a class="btn btn-success"href="{{route('block.all.slot',$block->id)}}">View Slot</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{$blocks->links()}}



</div>











@stop