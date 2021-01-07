@extends('partials.main')
@section('content')

<div class="bg-danger">
<h2 class="d-flex font-bold justify-content-center text-uppercase text-white">Total Block List in Floor : {{$floor->floor_name}}</h2>
<table class="table table-dark">

  <thead>
    <tr>
      <th scope="col">Serial</th>
      
      <th scope="col">Block  Name</th>
      
     
      
    </tr>
  </thead>
  <tbody>
  @foreach($block as $key=>$data)
   <tr>
      <th scope="row">{{$key+1}}</th>
      
      <td>{{$data->name}}</td>
      
    
      
    </tr>
    @endforeach
  </tbody>
</table>




</div>











@stop