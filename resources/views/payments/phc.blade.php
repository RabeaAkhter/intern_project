@extends('partials.main')
@section('content')

@push('css')
  <style>
  
/* {{asset("image/1.jpg")}} */

  body {
     background: url({{asset("backend/image/1.jpg")}}) fixed;
    background-size: cover;
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

<div class="container">
            <form method="post" action="{{route('cost.post')}}"class="form-horizontal" role="form">
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

                <h2>Per Hour Cost</h2>
                <div class="form-group">
                    <label for="type_id" class="col-sm-3 control-label">Type Name</label>
                    <div class="col-sm-9">
                        <select type="text" name="type_id" class="form-control" autofocus>

                            @foreach($slot_types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cost" class="col-sm-3 control-label">Cost</label>
                    <div class="col-sm-9">
                        <input name="cost" type="text" id="cost"  class="form-control" autofocus>
                    </div>
                    
                </div>
                <button type="submit" class="btn btn-primary ">Register</button>
                </div>
               
                

               
            </form> <!-- /form -->
        </div> <!-- ./container -->


@stop