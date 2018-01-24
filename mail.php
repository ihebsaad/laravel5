<?php Mail::send('emails.email1', [], function ($message) {
    $message
      ->from('postmaster@test.enterpriseesolutions.com', 'Houba')
      ->to('ihebsaad@gmail.com', 'iheb')
      ->subject('From SparkPost with ?');
  });
  echo'here';
  
  ?>