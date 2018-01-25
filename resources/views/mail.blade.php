<?php 
   $username=$_GET['reciever']     ;   
//Mail::send('emails.email1/username?username='.$_GET['reciever'], [], function ($message) {
Mail::send('email1', ['username'=>$username], function ($message) {
    $message
      ->from('postmaster@test.enterpriseesolutions.com', 'Iristel')
      ->to($_GET['mail'], $_GET['reciever'])
      ->subject('From SparkPost with ?');
  });
  echo'here';
  echo 'email= '.$_GET['mail'];
  echo 'reciever= '.$_GET['reciever'];
  ?>