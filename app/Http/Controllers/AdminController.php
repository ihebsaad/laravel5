<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{

  public function __construct()
  {

  }
    public function index()
  {
   
    return view('admin');
      
  } 

  public function admin()
  {
   
    return view('admin');
      
  } 
    public function enable($id)
	{
	//	$id= substr($id,2,strlen($id));
	DB::table('sims')
            ->where('id', $id)
            ->update(['enabled' => 1]);
		
        return redirect()->back();
		
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

 
        $tmp_name = $_FILES["uploadedfile"]["tmp_name"];
        $name = $_FILES["uploadedfile"]["name"];
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
    }


}