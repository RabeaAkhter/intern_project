@extends('partials.main')
@section('content')

<div class="bg-danger">
<h2 class="d-flex font-bold justify-content-center text-uppercase text-white">Slot List</h2>
<table class="table table-dark">

  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Slot ID</th>
      <th scope="col">Slot Name</th>
      <th scope="col">Block Name</th>
      <th scope="col">Floor Name</th>
      <th scope="col">Slot Type</th>
      <th scope="col">Status</th>
     
      <th class="text text-center"scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($slots as $key=>$slot)
   <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$slot->id}}</td>
      <td>{{$slot->slot_name}}</td>
      <td>{{$slot->block->name}}</td>
      <td>{{optional($slot->floor)->floor_name}}</td>
      <td>{{optional($slot->type)->name}}</td>
      <td>{{$slot->status}}</td>
  
      <td class="text-center">
      <a class="btn btn-primary"href="{{route('slot.edit',$slot->id)}}">Edit</a>
      <a class="btn btn-danger"href="{{route('slot.delete',$slot->id)}}">Delete</a>
       
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{$slots->links()}}



</div>











@stop