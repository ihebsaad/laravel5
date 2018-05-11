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
		$count=DB::table('SIMs')
                 ->where('sim', '=',$sim)
                 ->count();
				 
				 if (($count <= 0) ){
		DB::table('SIMs')->insert(
    ['sim' => $sim, 'pin' => $pin,'enabled'=>$enabled]
);
				 }
				 else{
					 DB::table('SIMs')
            ->where('sim', $sim)
            ->update(['enabled' => $enabled,'pin'=>$pin]); 
				 }
				 
return 'updated'.$count;
/*$count=DB::table('SIMs')->where('enabled', '=', $enabled)
                 ->where('sim', '=',$sim)
                 ->where('pin', '=', $pin)
                 ->count();
				 $count2=DB::table('SIMs')->where('enabled', '!=', $enabled)
                 ->where('sim', '=',$sim)
                 ->where('pin', '=', $pin)
                 ->count();
				 if (($count <0) && ($count2 <0)){
		DB::table('SIMs')->insert(
    ['sim' => $sim, 'pin' => $pin,'enabled'=>$enabled]
);
				 }
				 
return 'exist'.$count.'updated'.$count2;*/
	}
	 public function delete($start,$end){
		//echo('start'.$start);
		//echo('end'.$end); 
		$count=DB::table('SIMs')->where('enabled', '=', 0)
                 ->where('sim', '<=',$end)
                 ->where('sim', '>=', $start)->count();

DB::table('SIMs')->where('enabled', '=', 0)
                 ->where('sim', '<=',$end)
                 ->where('sim', '>=', $start)
                 ->delete();
				 return $count;
	}
		 public function enabledisable($pin,$endis){
			 if ($endis=="enable"){ $enabled=1;}
			 if ($endis=="disable"){ $enabled=0;}
			 $count=DB::table('SIMs')->where('pin', '=', $pin)
                 ->count();
				 if ($count>0){
			DB::table('SIMs')
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
	 
	 $count=DB::table('SIMs')
                 ->where('sim', '<=',$end)
                 ->where('sim', '>=', $start)
                 ->count();
				 if($count > 0){ 
				 echo('start string'.$start).'</br>';
  $arr1 = explode(',',$selectedplans);
  // convert String to long number
  $startI= Decimal::fromString($start);
  $endI= Decimal::fromString($end);
  $b=Decimal::fromInteger(1);
  		echo 'startI : '. $startI .'</br> End I : ' .$endI .'</br>';
  		echo 'start I + 10 : '.  $startI->add($b)  .'</br>' ;
		
		foreach ($arr1 as $key => $value){
			$i=Decimal::fromString($startI);
			echo $value;		echo '</br>' ;	
		while ($i <= $endI)
		{
echo $i;		echo '</br>' ;			 
$table1 = App\SIM_PLANS::updateOrCreate( ['planCode' => $value ,'SIM'=>$i]);
 $table1 ->save();
 $i=$i->add($b);
			 $i=Decimal::fromString($i);
}
}
}
				 else{return 'noSIMs';}
				 
				 
				 

	}
	
    public function enable($id)
	{
	DB::table('SIMs')
            ->where('id', $id)
            ->update(['enabled' => 1]);
				
	}
	  public function enableactivate($pin)
	{
	DB::table('sims')
            ->where('pin', $pin)
            ->update(['enabled' => 1]);
				
	}
		
    public function disable($id)
	{
	
	DB::table('SIMs')
            ->where('id', $id)
            ->update(['enabled' => 0]);
	} 

	
  public function admin2()
  {
   
    return view('admin2');
      
  }


}