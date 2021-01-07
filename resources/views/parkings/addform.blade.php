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

<form method="post" action="{{route('parking.post')}}"class="form-horizontal" role="form">
            @csrf
@if($errors->any())
<ul>@foreach($errors->all() as $error)
     <p class="alert alert-danger">{{$error}}</p>
    @endforeach
</ul>
@endif

@if(session()->has('msg'))
<p class="alert alert-success">{{session()->get('msg')}}</p> 
@endif

                <h2>Parking</h2>
               
                
                <div class="form-group">
                    <label for="slotname" class="col-sm-3 control-label">Slot Name</label>
                    <div class="col-sm-9">
                        <select type="text" name="slot_name" class="form-control" autofocus>

                            @foreach($slots as $slot)
                                <option value="{{$slot->id}}">{{$slot->slot_name}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cost" class="col-sm-3 control-label">Cost</label>
                    <div class="col-sm-9">
                        <select type="text" name="cost" class="form-control" autofocus>

                            @foreach($costs as $cost)
                                <option value="{{$cost->id}}">{{$cost->cost}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="form-group px-10">
                    <label for="number_plate"> Vehicle Number</label>
                    <input name="numberplate" type="text" class="form-control" id="number_plate">
                    </div>
                  
                    <div class="form-group px-10">
                    <label for="username">Driver Name</label>
                    <input name="username" type="text" class="form-control" id="username">
                    </div>

                    <div class="form-group px-10">
                    <label for="usermobile">Mobile</label>
                    <input name="usermobile" type="text" class="form-control" id="usermobile">
                </div>

                <div class="form-group px-10">
                    <label for="arrive">Arrive</label>
                    <input type="time" name="arrive" type="" class="form-control" id="arrive">
                </div>
                <div class="form-group px-10">
                    <label for="date">Date</label>
                    <input name="date" type="date" class="form-control" id="date"placeholder="mm-dd-yyyy">
                </div>
                 <!-- /.form-group -->
                
                
                
                
               

                


               
                

                <button type="submit" class="btn btn-primary btn-block">Park</button>
            </form> <!-- /form -->
        </div> <!-- ./container -->





@stop