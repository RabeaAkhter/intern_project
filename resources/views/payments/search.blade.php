@extends('partials.main')
@section('content')
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Parking ID</th>
      <th scope="col">Slot Name</th>
      <th scope="col">Number Plate</th>
      <th scope="col">Name</th>
      <th scope="col">Mobile</th>
      <th scope="col">Arrive</th>
      <th class="text text-center"scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($parkings as $key=>$parking)
  
   <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$parking->id}}</td>
      <td>{{optional($parking->slot)->slot_name}}</td>
      <td>{{$parking->number_Plate}}</td>
      <td>{{$parking->customer_name}}</td>
      <td>{{$parking->mobile}}</td>
      <td>{{$parking->arrive}}</td>

      
    
      
    
      <td class="text-center">
      <a class="btn btn-success"href="{{route('payment.form',$parking->id)}}">Payment</a>
     
      
       
      </td>
    </tr>
    @endforeach
  </tbody>
</table>




</div>








@stop