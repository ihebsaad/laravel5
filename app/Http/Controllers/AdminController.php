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
		echo('start'.$start);
		echo('end'.$end);
DB::table('sims')->where('enabled', '=', 0)
                 ->where('sim', '<=',$end)
                 ->where('sim', '>=', $start)
                 ->delete();
	}
		 public function insertOrUpdate($start,$end,$selectedplans){
			 echo('start'.$start);
		echo('end'.$end);
		echo('selectedplans'.$selectedplans);


$arr1 = str_split($selectedplans);
print_r($arr1);
foreach ($arr1 as $key => $value){
   echo ('elt'.$key.':'.$value);
}
	$table1 = DB::table('SIM_PLANS')->firstOrNew(['name' => Input::get('name')]); // your data
// make your affectation to the $table1
$table1 ->save();
	}
	
    public function enable($id)
	{
	//	$id= substr($id,2,strlen($id));
	DB::table('sims')
            ->where('id', $id)
            ->update(['enabled' => 1]);
		
        return redirect()->back();
		
	}
	
		
    public function disable($id)
	{
	//	$id= substr($id,2,strlen($id));
	DB::table('sims')
            ->where('id', $id)
            ->update(['enabled' => 0]);
		
        return redirect()->back();
		
	} 

	
  public function admin2()
  {
   
    return view('admin2');
      
  }


}