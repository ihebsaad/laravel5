<?php
 
    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
   

		$url2='';
$servername =  $_SERVER['SERVER_NAME'];
if (strpos($servername, "127.0.0.1") > -1)
{  $csvfile= "http://127.0.0.1/simactivation/public/uploads/". $_FILES['file']['name'];}
elseif (strpos($servername, "localhost") > -1)
{  $csvfile= "http://localhost/simactivation/public/uploads/". $_FILES['file']['name'];}
else { $csvfile='http://test.enterpriseesolutions.com/public/uploads/'. $_FILES['file']['name'];}
      

   //$csvfile=$url2. $_FILES['file']['name'];
    //detect delimiter
	 $delimiter = false;
    $line = '';
    if($f = fopen($csvfile, 'r')) {
        $line = fgets($f); 
		$sameline=$line;// read until first newline
        fclose($f);
    }
    if(strpos($line, ';') !== FALSE && strpos($line, ',') === FALSE) {
        $delimiter = ';';
    } else if(strpos($line, ',') !== FALSE && strpos($line, ';') === FALSE) {
        $delimiter = ',';
    } else {
        die('Unable to find the CSV delimiter character. Make sure you use "," or ";" as delimiter and try again.');
    }

if ($delimiter != ","){echo 'Incorrect delimiter!'; return false;}
//detect enclosure
$enclosure=substr_count($sameline,'"');

if ($enclosure != 6){echo 'Incorrect enclosure!'; return false;}
     //Get SIM Cards numbers
	 $sameline=preg_replace('/\s+/', '', $sameline);
if ( (substr_count(strtoupper ($sameline),preg_replace('/\s+/', '', 'SIM'))<1) || ((substr_count(strtoupper ($sameline),preg_replace('/\s+/', '', 'PIN')))<1) || ((substr_count(strtoupper ($sameline),preg_replace('/\s+/', '', 'STATUS' ))<1)) )

{echo 'Incorrect headers!'; return false;}
$pos1=strpos(strtoupper ($sameline),'PIN');
$pos2=strpos(strtoupper ($sameline),'SIM');
$pos3=strpos(strtoupper ($sameline),'STATUS');
if (($pos2<$pos1) || ($pos2> $pos3) ){echo 'Incorrect headers!';  return false;}

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://gqnchpomjprsrfglg-mock.stoplight-proxy.io/sim-cards",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "{}"
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
 // echo $response;
  $obj = json_decode($response);
  $arraySIMs = array();

foreach($obj->simCards as $sim){
	//echo $sim->iccid;
	array_push($arraySIMs,$sim->iccid);
}
//echo 'array result';
//print_r($arraySIMs);

}



	$fileD = fopen($csvfile,"r");
      		$i=1;$arrayDetails = array();
			//echo('i'.$i);
			
			
			//echo('cond1'.(($line = fgetcsv($fileD)) !== FALSE));
		//	echo('cond2'.( !feof($fileD)));
			//&& ( !feof($fileD))
        while ((($line = fgetcsv($fileD)) !== FALSE) ) { 
           
		 if ($i>1){
				//echo('i'.$i.'*** line '.$line[0].'**'.$line[1]);
			$pin=$line[0];
			$sim=$line[1];
			//echo('pin'.$pin);
			//echo('sim'.$sim);
			$status=$line[2];
			 $remove = array('"',',');
			 //echo('line='.$line);
			 $remove= implode(str_replace('"',"",$line));
			 $remove2= implode(str_replace(' ',"",$line));
			//echo 'length='.strlen($remove2);
		  //Case empty line
				 if ((strlen($sim)==strlen($pin)) && (strlen($sim)  ==strlen($status)) )
			  {$details3= ' Line '. $i .' : Empty.';array_push($arrayDetails,$details3);}
			  //Case sim exist $ pin not exist
			  else if ( ( (strlen($sim)>0)) && ($pin==''))
			  {$details2= ' Line '.$i .' : SIM without PIN.' ;array_push($arrayDetails,$details2);}
			 //Case pin exists and sim empty
			  else if ( (strlen($sim)==0) && (strlen($pin)>0) )
			  {$details1= ' Line '. $i .' : Non-existent SIM.';array_push($arrayDetails,$details1);}
			  else if($status==""){$status=0;}
			 
              
			  else if(!(ctype_digit($remove2))){$details1= '**'.$remove2.'**'.' Line '. $i .': invalid format.';array_push($arrayDetails,$details1);}
		
			 //Case correct format
			  else{
					if( array_search($sim,$arraySIMs) > -1)
					{
					$curl2 = curl_init();
					curl_setopt_array($curl2, array(
					CURLOPT_URL => "http://test.enterpriseesolutions.com/admin/insert/".$sim.'/'.$pin.'/'.$status,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => "",
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 30,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => "GET",
					CURLOPT_POSTFIELDS => "{}"
					));

					$response2 = curl_exec($curl2);
					$err2 = curl_error($curl2);

					curl_close($curl2);

					if ($err2) {
						//echo('error'.$err2);
						$details4=' Line '. $i .' : Not stored.'. $err2 ;array_push($arrayDetails,$details4 );
						} 
						else {
							   if (  substr_count($response2,'QueryException') > 0)
							    {
								   $details4=' Line '. $i .' : Not stored.'. $err2 ;array_push($arrayDetails,$details4 );
						
							    }
								else if(  substr_count($response2,'updated1') > 0){
									$details4=' Line '. $i .' : SIM updated.'. $err2 ;array_push($arrayDetails,$details4 );
			
								}
								/*else if(  substr_count($response2,'exist1') > 0){
									$details4=' Line '. $i .' : Already exists.'. $err2 ;array_push($arrayDetails,$details4 );
			
								}*/
							   else
							    {
								
									$details4=' Line '. $i . ' : stored.' ;array_push($arrayDetails,$details4 );
							    }
						}
				
					}
				     //correct format but invalid SIM
				    else
				    	{
	                     $details5=' Line '. $i. ' : Invalid SIM .';
	                     array_push($arrayDetails,$details5);
						}				
			  
			       }
	    	}//i>1 
			 $i=$i+1;
        } //while
		
		
$resultDetails = implode(" ", $arrayDetails);
  echo ($resultDetails);
         }

?>