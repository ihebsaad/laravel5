<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{

  public function __construct()
  {

  }

  public function admin()
  {
   
    return view('admin');
      
  } 
  public function admin2()
  {
   
    return view('admin2');
      
  }
public function upload(Request $request)
/*public function upload(Request $request)*/
  {
 /*$path = $request->file('uploadedfile')->store('avatars');

        echo $path;
        return $path;*/
		
 if (Input::hasFile('logo'))
    {
       return "file present";
    }
    else{
        return "file not present";
    }

}
}