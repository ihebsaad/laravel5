<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


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
//public function upload(ImagesRequest $request,PhotoGestion $photogestion)
public function upload(Request $request)
  {
	  if ($request->hasFile('uploadedfile')) {
   // return view('admin');
   $file = $request->file('photo');
 $path = $request->file('uploadedfile')->store('avatars');

        echo $path;
        return ('succeed'.$path);
 
       
}
else{ return ('failed');}
/* $path = $request->file('uploadedfile')->store('avatars');

        echo $path;
        return $path;
		
$uploads_dir = 'http://test.enterpriseesolutions.com/public/uploads';*/

 
       /* $tmp_name = $_FILES["uploadedfile"]["tmp_name"];
        $name = $_FILES["uploadedfile"]["name"];
        move_uploaded_file($tmp_name, "$uploads_dir/$name");*/
		
		
    }


}