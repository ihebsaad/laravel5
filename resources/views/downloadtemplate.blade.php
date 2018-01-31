<?php 
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Authorization");
    header("Access-Control-Allow-Methods: GET,HEAD,PUT,PATCH,POST,DELETE");
?>
<?php

Excel::load('/public/template.csv', function($file) {

})->export('csv');

?>