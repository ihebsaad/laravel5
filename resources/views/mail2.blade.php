<?php 

   $firstname=$_GET['firstname']     ;   
   $type=$_GET['type']     ;   
   $charge=$_GET['charge']     ;   
   $phone=$_GET['phone']     ;   
Mail::send('emails.email1', ['firstname'=>$firstname,'type'=>$type,'charge'=>$charge,'phone'=>$phone], function ($message) {
    $message
      ->from('postmaster@test.enterpriseesolutions.com', 'Iristel')
      ->to($_GET['mail'], $_GET['reciever'])
      ->subject('From SparkPost with ?');
  });
  echo'email sent to '.$_GET['reciever'] .'('.$_GET['mail'] .')';
   ?>