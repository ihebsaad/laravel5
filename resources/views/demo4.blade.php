@extends('layouts.mainlayout')


@section('content')

<section class="jumbotron text-center">
<div class="container">
<h1 class="jumbotron-heading">Existing Customer Login</h1>
</div>
</section>
<div class="inner-wrapper">
<div class="container">
  <div class="row">
    <div class="col-sm-4 col-sm-offset-4 center_div">
      <form name="login_form" id='login_form'>
  <div class="form-group">
    <input type="email" class="form-control" id="useremail" placeholder="Email Address">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" id="userpassword" placeholder="Password">
  </div>
  <div class="row" style="margin-top: 20px;">
        <div class="col-sm-9 form-group">
            <a href="#">Forgot Password?</a>
        </div>      
        <div class="col-sm-3 form-group">
            <button type="button" class="btn btn-success btn-round" style="float: right;margin-right: 0px;" >Login</button>
        </div>  
    </div>
</form>
    </div>
  </div>
</div>
</div>



<?php
echo 'test';
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://gqnchpomjprsrfglg-mock.stoplight-proxy.io/accounts?status=NEW",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "{}",
  CURLOPT_HTTPHEADER => array(
   // "authorization: Bearer {token}.{secret}"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

?>
@endsection
