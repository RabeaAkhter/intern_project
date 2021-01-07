@extends('partials.main')
@section('content')
<div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Payment</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{route('payment')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Report</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{route('payment.list')}}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <h2 class="d-flex font-bold justify-content-center text-uppercase text-white">Parking List</h2>
                 <h2 class="d-flex font-bold justify-content-center text-uppercase text-white">Slot List</h2>
     
                            <div class="bg-success">
            <h2 class="d-flex font-bold justify-content-center text-uppercase text-white">Slot List</h2>
            <table class="table table-dark">
                <table class="table table-dark">
                
            <thead>
                <tr>
                <th scope="col">Serial</th>
                <th scope="col">Slot Name</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach($slots as $key=>$slot)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$slot->slot_name}}</td>
                <td>{{$slot->status}}</td>
            </tr>
                @endforeach
            </tbody>
            </table>




            </div>






@stop