<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Floor;
use App\Models\Slottype;

use App\Models\Parkingslot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function add()
    {
        $blocks = Block::select('id','name')->get();//for getting block name
        $floors = Floor::select('id','floor_name')->get();// for getting floor name
       
        $slot_types = Slottype::select('id','name')->where('status','active')->get();//if anything is inactive then it will not show in form.
        return view('slots.add',compact('blocks','floors','slot_types'));
    }
    public function post(Request $request )
    {

        $request->validate([
        
            'slotname'=>'required|unique:parkingslots,slot_name,',
            'block_id'=>'required',
            'floor_id'=>'required',
            
            
            
            
        ]);
        Parkingslot::create([
    
            'slot_name'=>$request->slotname,
            'block_id'=>$request->block_id,
            'floor_id'=>$request->floor_id,
            'slot_type'=>$request->slot_type,
            
            

        ]);
        return redirect()->back()->with('msg','Slot add successfully');

    }
    public function list()
    {
        
        //$slots=Parkingslot::orderBy('id','desc')->paginate(5);
        $slots=Parkingslot::with('block','floor','type')->paginate(5);
    
        return view('slots.list',compact('slots'));
    }
    public function delete($vid)
    {
         $slot=Parkingslot::find($vid);
         $slot->delete();
         return redirect()->back();
    }
    public function edit($sid)
    {
        $slot=Parkingslot::find($sid);
        $blocks=Block::all();
        $floors = Floor::select('id','floor_name')->get();// for getting floor name
       
        $slot_types = Slottype::select('id','name')->where('status','active')->get();//if anything is inactive then it will not show in form.
        return view('slots.edit',compact('slot','blocks','floors','slot_types'));
    }
    public function update(Request $request, $sid)
    {
        
        $slot=Parkingslot::find($sid);
        $blocks=Block::all();
        $floors = Floor::select('id','floor_name')->get();// for getting floor name
       
        $slot_types = Slottype::select('id','name')->where('status','active')->get();
        $slot->update([
        
            
            'slot_name'=>$request->slotname,
            'block_id'=>$request->block_id,
            'floor_id'=>$request->floor_id,
            'slot_type'=>$request->slot_type,
            
        ]);
            return redirect()->route('slot.list')->with('msg','slot update successfully');

        
    }


}
