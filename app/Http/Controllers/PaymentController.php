<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parking;
use App\Models\Parkingslot;
use App\Models\Slottype;
use App\Models\Hourcost;
use App\Models\payment;

class PaymentController extends Controller
{
    public function list_for_payment()
    {
        $parkings=Parking::where('status','!=','available')->get();
        return view('payments.pay',compact('parkings'));
    }
    public function add($pid)
    {
        $parkings=Parking::find($pid);
        $slots=Parkingslot::find($pid);
        $slot_types = Slottype::get();
        $costs=Hourcost::find($pid);
    
        return view('payments.form',compact('slots','slot_types','parkings','costs'));  
       
    }
    public function search() 
    {
        $search_text=request('query');
        $parkings=Parking::with('slot')->where('customer_name', 'like','%' .$search_text.'%')->orwhere('mobile', 'like','%' .$search_text.'%')->get();
        return view('payments.search',compact('search_text','parkings'));
    }

    public function phc()
    {
        $slot_types = Slottype::select('id','name')->where('status','active')->get();
        return view('payments.phc',compact('slot_types'));
    }

    public function post(Request $request)
    {
        
        $request->validate([
        
            
            'cost'=>'required',
            
        
            
        ]);
        Hourcost::create([
    
            'type_id'=>$request->type_id,
            'cost'=>$request->cost,
            
            
            

        ]);
        
        return redirect()->back()->with('msg','per hour cost add successfull');
    }
    public function form_post(Request $request,$id)
    {
        $request->validate([
            
            'parkingid'=>'required',
            'slot_id'=>'required',
            'total'=>'required',
            'date'=>'required',
            
        ]);
       Payment::create([

        'parking_id'=>$request->parkingid,
        'slot_id'=>$request->slot_id,
        'amount'=>$request->total,
        'date'=>$request->date,
        ]);
        $slot=Parkingslot::find($request->slot_id);
          
        $slot->update(['status'=>'available']);

        $parking=Parking::find($request->parkingid);
        $parking->update(['status'=>'available']);

        
        
        return redirect()->route('payment.list')->with('msg','payment done successfully');
    }

    public function payment_list()
    {
        $payments=Payment::all();
        return view('payments.paylist',compact('payments'));
    }

    public function list()
    {
        
       
        $types=Hourcost::with('type')->paginate(5);
        return view('payments.list',compact('types'));
    }
    public function edit($cid)
    {
        $slot_types=Slottype::get();
        $cost=Hourcost::find($cid);
        
        return view('payments.edit',compact('slot_types','cost'));
    }
    public function update(Request $request, $cid)
    {
        $cost=Hourcost::find($cid);
        $slot_types=Slottype::get();
        $cost->update([
        
            'type_id'=>$request->type_id,
            'cost'=>$request->cost,
            


        ]);
        return redirect()->route('cost.list')->with('msg','cost update successfully');
    }
    public function delete($id)
    {
       $payment=Payment::findorfail($id);
       $payment->delete();
       return redirect()->back();
    }
}
