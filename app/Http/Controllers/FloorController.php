<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Floor;
use App\Models\Block;

class FloorController extends Controller
{
    public function add()
    {
        return view('floors.add');
    }
    public function post(Request $request)
    {

        $request->validate([
        
            'floorname'=>'required',
            
            
            
        ]);
        Floor::create([
    
            'floor_name'=>$request->floorname,
            
            
            

        ]);
        return redirect()->back()->with('msg','Floor add successfully');

    }
    public function list()
    {
        
        $floors=FLoor::withCount('blocks')->orderBy('id','desc')->paginate(5);
       
        return view('floors.list',compact('floors'));
    }
    public function delete($vid)
    {
         $floor=Floor::find($vid);
         $floor->delete();
         return redirect()->back();
    }
    public function getallblock($id)
    {

    $block = Block::where('floor_id',$id)->get();//for getting all blocks
    $floor=Floor::find($id);//for showing floor name and define it in list
    
      return view('floors.totalblock',compact('block','floor'));

    }
    public function edit($fid)
    {
        $floors=Floor::find($fid);
        
        return view('floors.edit',compact('floors'));
    }
    public function update(Request $request, $fid)
    {
        
        $floors=Floor::find($fid);
        $floors->update([
            'floor_name'=>$request->floorname,


        ]);
        return redirect()->route('floor.list')->with('msg',' update successfully');
    }

    public function view()
    {

        $floor=Floor::all();
        return view('floors.view',compact('floor'));
    }
}
