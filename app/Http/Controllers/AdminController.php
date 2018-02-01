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
public function upload(Request $request)
/*public function upload(Request $request)*/
  {
 /*$path = $request->file('uploadedfile')->store('avatars');

        echo $path;
        return $path;*/
		
$uploads_dir = 'http://test.enterpriseesolutions.com/public/uploads';
foreach ($_FILES["uploadedfile"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["uploadedfile"]["tmp_name"][$key];
        $name = $_FILES["uploadedfile"]["name"][$key];
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
    }
}

}
}