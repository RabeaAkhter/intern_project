@extends('partials.main')
@section('content')
<p>
<label for="">Vehicle Id:{{$single_vehicle->id}}</label>
</p>
<p>
<label for="">Vehicle Type:{{$single_vehicle->type}}</label>
</p>
<p>
<label for="">Vehicle Number:{{$single_vehicle->number_plate}}</label>
</p>
<p>
<label for="">Vehicle Description:{{$single_vehicle->description}}</label>
</p>







@stop
