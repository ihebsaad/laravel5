<?php 

   $firstname=$_GET['firstname']     ;   
   $type=$_GET['type']     ;   
   $charge=$_GET['charge']     ;   
   $phone=$_GET['phone']     ;   
Mail::send('emails.email2', ['firstname'=>$firstname,'type'=>$type,'charge'=>$charge,'phone'=>$phone], function ($message) {
    $message
      ->from('postmaster@test.enterpriseesolutions.com', 'Iristel')
      ->to($_GET['mail'], $_GET['reciever'])
      ->subject('Iristel subscription');
  });
  echo'email sent to '.$_GET['reciever'] .'('.$_GET['mail'] .')';
   \Log::info('Sending Service Addition email');
   ?>