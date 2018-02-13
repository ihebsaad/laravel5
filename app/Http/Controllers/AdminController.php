<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App;
use Litipk\BigNumbers\Decimal;

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
		//echo('start'.$start);
		//echo('end'.$end); 
		$count=DB::table('sims')->where('enabled', '=', 0)
                 ->where('sim', '<=',$end)
                 ->where('sim', '>=', $start)->count();

DB::table('sims')->where('enabled', '=', 0)
                 ->where('sim', '<=',$end)
                 ->where('sim', '>=', $start)
                 ->delete();
				 return $count;
	}
		 public function enabledisable($pin,$endis){
			 if ($endis=="enable"){ $enabled=1;}
			 if ($endis=="disable"){ $enabled=0;}
			 $count=DB::table('sims')->where('pin', '=', $pin)
                 ->count();
				 if ($count>0){
			DB::table('sims')
            ->where('pin', $pin)
            ->update(['enabled' => $enabled]); 
				 }
				 return $count;
		 }
		 public function deleterange($start,$end){
  DB::table('SIM_PLANS')->where('SIM', '<=',$end)
                 ->where('SIM', '>=', $start)
                 ->delete();
	}
 public function insertOrUpdate($start,$end,$selectedplans){
  echo('start string'.$start).'</br>';
  
  // convert String to long number
  $startI= Decimal::fromString($start);
  $endI= Decimal::fromString($end);
  
$arr1 = explode(',',$selectedplans);
//print_r($arr1);
foreach ($arr1 as $key => $value){
		
	   for ($i=$startI; $i <= $endI;$i++) {
$table1 = App\SIM_PLANS::updateOrCreate( ['planCode' => $value ,'SIM'=>$sim]);
 $table1 ->save();
}
	
	
	}
 // echo (' plan: '.$value);
 // $istart=intval($start);
 //$iend=intval($end);
 /// echo ('start'.$istart);
  //echo ('iend'.$iend);
// echo ('start : </br>'.number_format($start, 2, '', ''));	   echo '</br>';

 //number_format($end, 2, '', '');
 
  /* for ($i=$start; $i <= $end;$i++) {*/
	 //  echo $i;
	   	  // echo sprintf('%8d', $i);
	
 //  echo ' SIM= '.str_pad($i, strlen($start), "0", STR_PAD_LEFT);
 //$sim=str_pad($i, strlen($start), "0", STR_PAD_LEFT);
   
 //$table1 = App\SIM_PLANS::updateOrCreate( ['planCode' => $value ,'SIM'=>$sim]);
 // $table1 =  App\SIM_PLANS::firstOrNew(['planCode' => $value ,'SIM'=>$i]); // your data
// make your affectation to the $table1
//$table1 ->save();
/*}*/

	/**/
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