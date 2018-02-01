<?php

Excel::load('/public/template2.csv', function($file) {

})->download('csv');

?>