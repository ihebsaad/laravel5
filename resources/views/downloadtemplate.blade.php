<?php

Excel::load('/public/template.csv', function($file) {

})->download('csv');

?>