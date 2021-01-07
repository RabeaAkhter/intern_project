<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parkingslot;

class DashboardController extends Controller
{
    public function dasindex()
    {
        $slots=Parkingslot::get();
        return view('dashboard',compact('slots'));
        
    }

}
