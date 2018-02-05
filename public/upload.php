<?php

    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
    $csvfile='http://test.enterpriseesolutions.com/public/uploads/'. $_FILES['file']['name'];
    //detect delimeter
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


if ($delimiter != ","){echo 'Incorrect delimeter!'; return false;}
//detect enclosure
$enclosure=substr_count($sameline,'"');

if ($enclosure != 6){echo 'Incorrect enclosure!'; return false;}
     //Get SIM Cards numbers
if ( (substr_count(strtoupper ($sameline),'SIM')<1) || ((substr_count(strtoupper ($sameline),'PIN')<1)) || ((substr_count(strtoupper ($sameline),'STATUS')<1)) )

{echo 'Incorrect headers!'; return false;}

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
  echo $response;
  $obj = json_decode($response);
  $arraySIMs = array();

foreach($obj->simCards as $sim){
	echo $sim->iccid;
	array_push($arraySIMs,$sim->iccid);
}
echo 'array result';
print_r($arraySIMs);

}



	$fileD = fopen($csvfile,"r");
      		$i=0;$arrayDetails = array();
        while (($line = fgetcsv($fileD)) !== FALSE) { 
            $i=$i+1;
			 if ($i>1){
			$sim=$line[0];
			$pin=$line[1];
			$status=$line[2];
		  //Case empty line
				 if ((strlen($sim)==strlen($pin)) && (strlen($sim)  ==strlen($status)) )
			  {$details3= ' Line '. $i .' is empty.';array_push($arrayDetails,$details3);}
			  //Case sim exist $ pin not exist
			  else if ( ( (strlen($sim)>0)) && ($pin==''))
			  {$details2= ' Line'.$i .' SIM without PIN.' ;array_push($arrayDetails,$details2);}
			 //Case pin exists and sim empty
			  else if ( (strlen($sim)==0) && (strlen($pin)>0) )
			  {$details1= ' Line '. $i .' is incorrect.';array_push($arrayDetails,$details1);}
			  else if($status==""){$status=0;}
		
			 //Case correct format
			  else{
					if( array_search($sim,$arraySIMs) > -1)
					{
					$curl2 = curl_init();
					curl_setopt_array($curl2, array(
					CURLOPT_URL => "http://test.enterpriseesolutions.com/activate/admin/insert/".$sim.'/'.$pin.'/'.$status,
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
						$details4=' Failed to store line'. $i .'.'. $err2 ;array_push($arrayDetails,$details4 );
						} 
						else {
						$details4=' Line'. $i . ' to be stored.' ;array_push($arrayDetails,$details4 );
						}
				
					}
				     //correct format but invalid SIM
				    else
				    	{
	                     $details5=' Invalid SIM in line '. $i. '.';
	                     array_push($arrayDetails,$details5);
						}				
			  
			       }
	    	}//i>0 
        } //while
$resultDetails = implode(" ", $arrayDetails);
  echo ('resultDetails: '.$resultDetails);
          }

?>