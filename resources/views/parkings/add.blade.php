@extends('partials.main')
@section('content')

@push('css')
  <style>
  
/* {{asset("image/1.jpg")}} */

  body {
     background: url({{asset("backend/image/1.jpg")}}) fixed;
    background-size: cover;
    position: relative;
}
body:before{
    content:"";
    position:absolute;
    width:100%;
    height:100%;
    top:0;
    left:0;
    background:#14153cd4;
}

*[role="form"] {
    max-width: 530px;
    padding: 15px;
    margin: 0 auto;
    border-radius: 0.3em;
    background-color: #f2f2f2;
}

*[role="form"] h2 { 
    font-family: 'Open Sans' , sans-serif;
    font-size: 40px;
    font-weight: 600;
    color: #000000;
    margin-top: 5%;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 4px;
}


  </style>
@endpush
<!------ Include the above in your HEAD tag ---------->
<div class="container-fluid">
  <div class="col-xl-3 col-md-6">
@foreach($slottypes as $data)
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">{{$data->name}} </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="{{route('parking.addform',$data->id)}}">View Form</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
    
                              </div>
 @endforeach
  </div>

 
      
</div> <!-- ./container -->
        


@stop