<?php 
   $username=$_GET['reciever']     ;   
   $email=$_GET['mail']     ;   
   $accountid=$_GET['accountId']     ;   
   $address1=$_GET['address1']     ;   
   $address2=$_GET['address2']     ;   
//Mail::send('emails.email1/username?username='.$_GET['reciever'], [], function ($message) {
Mail::send('emails.email1', ['username'=>$username,'email'=>$email,'accountid'=>$accountid,'address1'=>$address1,'address2'=>$address2], function ($message) {
    $message
      ->from('postmaster@test.enterpriseesolutions.com', 'Iristel')
      ->to($_GET['mail'], $_GET['reciever'])
      ->subject('From SparkPost with ?');
  });
  echo'email sent to '.$_GET['reciever'] .'('.$_GET['mail'] .')';
   \Log::info('Sending Welcome email');
   ?>