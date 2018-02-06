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
    public function insert($sim,$pin,$enabled){
		
		DB::table('sims')->insert(
    ['sim' => $sim, 'pin' => $pin,'enabled'=>$enabled]
);
	}
	 public function delete($start,$end){
		

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


}