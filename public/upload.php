<?php

    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
   return 'uploaded';
   /*Route::get('read-excel',function(){
    
        $fileD = fopen('expertphp-product.csv',"r");
        $column=fgetcsv($fileD);
        while(!feof($fileD)){
         $rowData[]=fgetcsv($fileD);
        }
        foreach ($rowData as $key => $value) {
            
            $inserted_data=array('sim'=>$value[0],
                                 'pin'=>$value[1],
                                 'enabled'=>$value[2]
                            );
            
             Sim::create($inserted_data);
        }
        print_r($rowData);
});*/
   }

?>