<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function show()
  {
      return view('front.login');
  }
  public function showform()
  {
    return view('front.regestration'); 
  }
}
