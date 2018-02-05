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
		// foreach ($line as $value) {
			$sim=$line[0];
			$pin=$line[1];
			$status=$line[2];
		
			  echo ('sim='.$sim);
			  echo ('pin='.$pin);
			  echo ('status='.$status);
			 
			  
			  if ( (strlen($sim)==0) && (strlen($pin)>0) )
			  {$i1=$i+1;$details1= ' Line '. $i .' is incorrect.';array_push($arrayDetails,$details1);}
			  //Case pin exist $ sim not exist
			  else if ( ( (strlen($sim)>0)) && ($pin=='"'))
			  {  $i2=$i+1;$details2= ' Line'.$i .' SIM without PIN.' ;array_push($arrayDetails,$details2);}
			  //Case empty line
			  else if ((strlen($sim)==strlen($pin)) && (strlen($sim)  ==strlen($status)) )
			  {$i3=$i+1;$details3= ' Line '. $i .' is empty.';array_push($arrayDetails,$details3);}
			  else if($status==""){$status=0;}
			  else {
				if( array_search($sim,$arraySIMs) > -1)
				{
					$i4=$i+1;$details4=' Line'. $i . ' to be stored.' ;array_push($arrayDetails,$details4 );
				
					

$curl2 = curl_init();

curl_setopt_array($curl2, array(
  CURLOPT_URL => "http://test.enterpriseesolutions.com/activate/admin/insert".$sim.'/'.$pin.'/'$status,
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
  echo "cURL Error #:" . $err;
} else {
echo $response2;}
				
				}
else {
	$i5=$i+1;
	 $details5=' SIM in line '. $i .' is not valid. ';

	 array_push($arrayDetails,$details5);
}				
			  
			  }
         
      //  }

		} 
}}
$resultDetails = implode(" ", $arrayDetails);
  echo ('resultDetails: '.$resultDetails);
?>