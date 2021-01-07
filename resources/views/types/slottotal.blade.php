@extends('partials.main')
@section('content')

<div class="bg-danger">
<h2 class="d-flex font-bold justify-content-center text-uppercase text-white">Total Slot List under Type : {{$types->name}}</h2>
<table class="table table-dark">

  <thead>
    <tr>
      <th scope="col">Serial</th>
      
     
      <th scope="col"> Slots</th>
     
      
    </tr>
  </thead>
  <tbody>
  @foreach($slots as $key=>$type)
   <tr>
      
      <td>{{$key+1}}</td>
      <td>{{optional($type)->slot_name}}</td>
    
    
      
    </tr>
    @endforeach
  </tbody>
</table>




</div>











@stop