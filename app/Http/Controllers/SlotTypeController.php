<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slottype;
use App\Models\Parkingslot;

class SlotTypeController extends Controller
{
    public function add()
    {
        return view('types.add');
    }
    public function post(Request $request)
    {

        $request->validate([
        
            'slotname'=>'required',
            
            
            
        ]);
        Slottype::create([
    
            'name'=>$request->slotname,
            'status'=>$request->slot_status,
            
            

        ]);
        return redirect()->back()->with('msg','Slot Type  add successfully');

    }
    public function list()
    {
        
        $types=Slottype::orderBy('id','desc')->paginate(5);
        return view('types.list',compact('types'));
    }

    public function gettotalslot($id)
    {

    $slots = Parkingslot::where('slot_type',$id)->get();//for getting all slots
    $types=Slottype::find($id);//for showing block name and define it in list

      return view('types.slottotal',compact('types','slots'));

    }
    public function delete($stid)
    {
         $slottype=Slottype::find($stid);
         $slottype->delete();
         return redirect()->back();
    }
    public function edit($tid)
    {
        $type=Slottype::find($tid);
        
        return view('types.edit',compact('type'));
    }
    public function update(Request $request, $tid)
    {
        
        $type=Slottype::find($tid);
        $type->update([
        
            'name'=>$request->slotname,
            'status'=>$request->slot_status,
            


        ]);
        return redirect()->route('type.list')->with('msg','slot type update successfully');
    }
}
