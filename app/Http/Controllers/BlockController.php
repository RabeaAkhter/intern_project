<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Block;
use App\Models\Floor;
use App\Models\Parkingslot;

class BlockController extends Controller
{
    public function add()
    {

    $floors = Floor::all();
        return view('blocks.add',compact('floors'));
    }
    public function post(Request $request)
    {

        $request->validate([
        
            'blockname'=>'required',
            'floor_name'=>'required',
            
            
            
        ]);
        Block::create([
    
            'name'=>$request->blockname,
            'floor_id'=>$request->floor_name,
            
            
            

        ]);
        return redirect()->back()->with('msg','Block add successfully');

    }
    public function list()
    {
        
        //$blocks=Block::orderBy('id','desc')->paginate(5);
        $blocks=Block::with('floor')->withCount('slots')->orderBy('id','desc')->paginate(2);//withcount slots is a relation define in model of block and relation name is has many
        
        return view('blocks.list',compact('blocks'));
    }
    public function delete($vid)
    {
         $block=Block::find($vid);
         $block->delete();
         return redirect()->back();
    }
    public function gettotalslot($id)
    {

    $slots = Parkingslot::where('block_id',$id)->get();//for getting all slots
    $block=Block::find($id);//for showing block name and define it in list
    return view('blocks.totalslot',compact('block','slots'));

    }
    public function edit($bid)
    {
        $blocks=Block::find($bid);
        $floors=Floor::all();
        
        return view('blocks.edit',compact('blocks','floors'));
    }
    public function update(Request $request, $bid)
    {
        
        $blocks=Block::find($bid);
        $floors=Floor::all();
        $blocks->update([

            'name'=>$request->blockname,
            'floor_id'=>$request->floor_name,
            
            


        ]);
        return redirect()->route('block.list')->with('msg',' update successfully');
    }
}
