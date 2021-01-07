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
            <form method="post" action="{{route('slot.update',$slot->id)}}"class="form-horizontal" role="form">
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

                <h2>Create Slots</h2>
                <div class="form-group">
                    <label for="slotName" class="col-sm-3 control-label">Slot Name</label>
                    <div class="col-sm-9">
                        <input name="slotname" value="{{$slot->slot_name}}"type="text" id="slotName"  class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="BlockName" class="col-sm-3 control-label">Block Name</label>
                    <div class="col-sm-9">
                        <select type="text" name="block_id" class="form-control" autofocus>

                            @foreach($blocks as $block)
                                <option value="{{$block->id}}" {{$block->id==$slot->block_id ? 'selected':''}}>{{$block->name}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="FloorName" class="col-sm-3 control-label">Floor Name</label>
                    <div class="col-sm-9">
                        <select type="text" name="floor_id" class="form-control" autofocus>

                            @foreach($floors as $floor)
                                <option value="{{$floor->id}}" {{$floor->id==$slot->floor_id ? 'selected':''}}>{{$floor->floor_name}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="form-group">
               <label for="slot_type">Slot Type</label>
              <select name="slot_type" id="slot_type"class="form-control">

               @foreach($slot_types as $slot_type)
              <option value="{{$slot_type->id}}" {{$slot_type->id==$slot->slot_type ? 'selected':''}}>{{$slot_type->name}}</option>
               @endforeach
    
              </select>
               </div>
             

                
                </div> <!-- /.form-group -->
                

                <button type="submit" class="btn btn-primary btn-block">Update</button>
            </form> <!-- /form -->
        </div> <!-- ./container -->


@stop