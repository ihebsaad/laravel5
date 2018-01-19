<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{

  public function __construct()
  {

  }

  public function admin()
  {
   
    return view('admin');
      
  }

 
}