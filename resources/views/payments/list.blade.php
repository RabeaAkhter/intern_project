@extends('partials.main')
@section('content')

<div class="bg-danger">
<h2 class="d-flex font-bold justify-content-center text-uppercase text-white">SLot Type List</h2>
<table class="table table-dark">

  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Slot Type</th>
      <th scope="col">Cost</th>
      
     
      <th class="text text-center"scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($types as $key=>$type)
   <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$type->type->name}}</td>
      <td>{{$type->cost}}tk</td>
      
    
      <td class="text-center">
      <a class="btn btn-primary"href="{{route('cost.edit',$type->id)}}">Edit</a>
      
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{$types->links()}}



</div>











@stop