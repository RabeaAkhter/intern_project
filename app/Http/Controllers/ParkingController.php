<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Parking;
use App\Models\Floor;
use App\Models\Parkingslot;
use App\Models\Slottype;
use App\Models\Hourcost;

class ParkingController extends Controller
{
    public function add()
    {

    
    $slots=Parkingslot::all();
    
    $slottypes=Slottype::get();
       
    return view('parkings.add',compact('slots','slottypes'));
    }
   

    

    public function addform($pid)
    {
        
      $slots=Parkingslot::where('slot_type','=',$pid)->select('id','slot_name')->where('status','available')->get();
      $slot_types = Slottype::select('id','name')->where('status','active')->get();
      $costs=Hourcost::where('type_id','=',$pid)->get();
      
      return view('parkings.addform',compact('slots','costs'));  
    }
    public function post(Request $request)
    {
        
        $request->validate([
        
            'slot_name'=>'required',
            'cost'=>'required',
            'numberplate'=>'required',
            'username'=>'required',
            'usermobile'=>'required', 
            'arrive'=>'required', 
            'date'=>'required', 

        ]);

        //dd($request->all());
        
        Parking::create([
            'slot_id'=>$request->slot_name,
            'cost_id'=>$request->cost,
            'number_Plate'=>$request->numberplate,
            'customer_name'=>$request->username,
            'mobile'=>$request->usermobile,
            'arrive'=>$request->arrive,
            'date'=>$request->date,
            
        ]);
            $slot=Parkingslot::find($request->slot_name);
            $slot->update(['status'=>'accupied']);

           

        return redirect()->back()->with('msg','Parking add successfully');

    } 

    public function list()
    {
        
       
        $parkings=Parking::with('slot')->with('cost')->where('status','!=','available')->paginate(5);

        
        return view('parkings.list',compact('parkings'));
    }
    public function delete($pid)
    {
       $parking=Parking::findorfail($pid);
       $parking->delete();
       return redirect()->back();
    }
    public function edit($pid)
    {
        $parking=Parking::find($pid);
        $slots=Parkingslot::all();
        return view('parkings.edit',compact('slots','parking'));
    } 
    public function update(Request $request, $pid)
    {
        
        $parking=Parking::find($pid);
        $slots=Parkingslot::all();
        $parking->update([
        
            'slot_id'=>$request->slot_name,
            'number_Plate'=>$request->numberplate,
            'customer_name'=>$request->username,
            'mobile'=>$request->usermobile,
            
        ]);
            return redirect()->route('parking.list')->with('msg','Parking update successfully');

        
    }
}
