<link href="{{asset('/css/1.min.css')}}" rel="stylesheet" id="bootstrap-css">
<script src="{{asset('/backend/js/2.min.js')}}"></script>
<script src="{{asset('/backend/js/3.min.js')}}"></script>
<!------ Include the above in your HEAD tag ---------->
<form method="post"action="{{route('payment.post',$parkings->id)}}">
@csrf 
<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>Jamuna Future Park</strong>
                        <br>
                        KA-244,Kuril
                        <br>
                        Pragati Shoroni,Dhaka
                        <br>
                        <abbr title="Phone">P:</abbr> (+880) 1638767080
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                    
                        <label for="date">Date:</label>
                     <input name="date" type="text" value="{{$parkings->date}}"id="date">
                    </p>
           
                    <p>
                     
                        <label for="parkingid">Parking id:</label>
                        <input  name="parkingid" value="{{$parkings->id}}"  id="parkingid">
                    
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Slot Name</th>
                            
                            <th class="text-center">Arrive</th>
                            <th class="text-center">Deparature</th>
                            <th class="text-center">Hour</th>
                            <th class="text-center">PH Cost</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>

                    @php
                    $timeFrom=date('h:i:s',strtotime($parkings->arrive));
                    $timeTo=date('h:i:s'); 
                    $hourDiff=round((strtotime($timeTo)-strtotime($timeFrom))/3600);
                   
                    $p_cost=($parkings->cost->cost);
                    $total=$hourDiff*$p_cost;
                    
                    @endphp
                        <tr>
                            <td class="col-md-9"><em>
                            <input  name="slot_id" value="{{$parkings->slot_id}}"tk  id="slotid" style="
                            width: 80px;
                            height: auto;
                            "> 
                            </em></h4></td>
                            
                            <td class="col-md-1 text-center">{{$timeFrom}}</td>
                            <td class="col-md-1 text-center">{{date('h:i:s')}}</td>
                            <td class="col-md-1 text-center">{{$hourDiff}}</td>
                            <td class="col-md-1 text-center">{{$p_cost}}</td>
                            <td class="col-md-1 text-center">
                            <input  name="total" value="{{$total}}"tk  id="total"style="
                            width: 80px;
                            height: auto;
                            ">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div>
                </form>
                <span style="
                    float: right;
    overflow: hidden;
    margin-bottom: 10px;
                ">
                                <strong style="text-transform:uppercase;text-align:end">sub total: {{$total}}tk</strong>
                            </span>
                </div>
                <button type="submit" onclick="window.print()" class="btn btn-danger btn-lg btn-block">
                    Pay Now   <span class="glyphicon glyphicon-chevron-right"></span>
                </button></td>
            </div>
        </div>
    </div>