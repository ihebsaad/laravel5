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

if ($enclosure < 14){echo 'Incorrect enclosure!'; return false;}
     
	 $fileD = fopen($csvfile,"r");
        $column=fgetcsv($fileD);
        while(!feof($fileD)){
         $rowData[]=fgetcsv($fileD,',','"');
		  print_r( ($rowData));
        } 
		$i=0;$details="";
        foreach ($rowData as $key => $value) {
          
            $i=$i+1;
		
			  echo 'line '.$i.'****';
			  $ch=$value[0];
			  $ch=substr($ch,1);
			  $sim=substr($ch,0,stripos($ch,'"',0)+1);
			  
			  echo ('sim='.$sim);
			  $ch=substr($ch,strlen($sim)+2);
			  $pin=substr($ch,0,stripos($ch,'"',0)+1);
			  echo ('pin='.$pin);
			  $ch=substr($ch,strlen($pin)+2);
			  $status=substr($ch,0,stripos($ch,'"',0));
			  echo ('status='.$status);
			  if ( (strlen($sim)==0) && (strlen($pin)>0) ){$details=$details. ' Line '.$i.' is incorrect.';}
			  //Case pin exist $ sim not exist
			  if ( ( (strlen($sim)>0)) && ($pin=='"'))
				  $details=$details. ' line'.$i.'SIM without PIN' ;
			  //Case empty line
			  if ((strlen($sim)==strlen($pin)) && (strlen($sim)  ==strlen($status)) )
				 $details=$details. ' line '.$i.'empty.';
			  if($status==""){$status=0;}
          
        }
  echo ('details: '.$details);
}

?>