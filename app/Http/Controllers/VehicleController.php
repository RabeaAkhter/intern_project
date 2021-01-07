<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    public function add()
    {
        return view('vehicles.add');
    }
    public function post(Request $request)
    {

        $request->validate([
        
            'vehicletype'=>'required',
            'vehiclenumber'=>'required'
            
            
        ]);
        Vehicle::create([
    
            'type'=>$request->vehicletype,
            'number_plate'=>$request->vehiclenumber,
            'description'=>$request->vehicldescription,
            

        ]);
        return redirect()->back()->with('msg','Vehicle add successfully');

    }
    public function list()
    {
        //return view('vehicles.list');
        $vehicles=Vehicle::orderBy('id','desc')->paginate(5);
        return view('vehicles.list',compact('vehicles'));
    }
    public function delete($vid)
    {
         $vehicle=Vehicle::find($vid);
         $admin->delete();
         return redirect()->back();
    }
    public function viewvehicle($vid)
    {
        
        $single_vehicle=Vehicle::find($vid);
        return view('vehicles.view',compact('single_vehicle'));
    }
    public function editvehicle($vid)
    {
        
        $vehicle=Vehicle::find($vid);
        return view('vehicles.edit',compact('vehicle'));
    }
    public function updatevehicle(Request $request, $vid)
    {
        
        $vehicle=Vehicle::find($vid);
        $vehicle->update([
        
            'type'=>$request->vehicletype,
            'number_plate'=>$request->vehiclenumber,
            'description'=>$request->vehicledescription,
            


        ]);
        return redirect()->route('vehiclelist')->with('msg','Vehicle update successfully');
    }
}
