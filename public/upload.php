<?php

    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
    
    
        $fileD = fopen('http://test.enterpriseesolutions.com/public/uploads/' . $_FILES['file']['name'],"r");
        $column=fgetcsv($fileD);
        while(!feof($fileD)){
         $rowData[]=fgetcsv($fileD,',','"');
		  print_r( ($rowData));
        } 
		$i=0;
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
           /* $inserted_data=array('sim'=>$value[0],
                                 'pin'=>$value[1],
                                 'enabled'=>$value[2]
                            );*/
            //echo $inserted_data;
             //Sim::create($inserted_data);
        }
  
      // print_r( ($rowData));
       // echo 'rowdata json ='.json_encode( ($rowData));
}

?>