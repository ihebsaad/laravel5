<?php session_start(); ?>
<?php 
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Authorization");
    header("Access-Control-Allow-Methods: GET,HEAD,PUT,PATCH,POST,DELETE");
?>

 <?php
  if (isset ($_SESSION['access_token']))
 {echo ' <input type="hidden" id="tokeninput" value="'.$_SESSION["access_token"].'" />';}
 else{echo ' <input type="hidden" id="tokeninput" />';}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">  
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
  <link rel="stylesheet" href="../public/css/style.css">
 	 <script  src="../public/js/jquery-3.2.1.min.js" type="text/javascript"> </script>
  <title>SIM Activation</title>
 <!--   <link href="https://cdn.auth0.com/styleguide/4.8.10/index.min.css" rel="stylesheet" />-->
  <style> input.ng-valid.ng-dirty  {border:1px solid #5cb85c;}  input.ng-invalid.ng-dirty {border:1px solid #FA5858;}   </style>

<script src="https://cdn.auth0.com/js/auth0/9.0.1/auth0.min.js"></script>


</head>
<body>

<!--   Stage 4  : STAGE LOGIN   ------------------------------------------------------------>
<div class="animate-switch" ng-switch-when="stageLogin">
<section class="jumbotron text-center">
<div class="container">
<div id='div_session_write' style="display:none;"> </div>
<h1 class="jumbotron-heading">Admin Login</h1>
</div>
</section>
<div class="inner-wrapper">
<div class="container">
  <div class="row">
    <div class="col-sm-4 col-sm-offset-4 center_div">
	
      <form name="login_form" id='login_form'>
	  <div style="display:none;" class="alert alert-danger">
	  <button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
	WRONG USERNAME OR PASSWORD.
	</div>
  <div class="form-group">
    <input  type="email" ng-model="formParams.email" required ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" class="form-control" id="useremail" placeholder="Email Address">
  </div>
  <div class="form-group">
    <input  type="password" class="form-control" id="userpassword" placeholder="Password">
  </div>
  <div class="row" style="margin-top: 20px;">
  <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
     
            <a style="font-size: 16px;"  href="#">Forgot Password?</a>
        </div>      
 <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
            <button ng-model="test" type="button" onclick="login();" class="btn btn-success btn-round" style="float: right;margin-right: 0px;" >Login</button>
        </div>  
    </div>
</form>
    </div>
  </div> 
</div>
</div>
 </div> <!-- End Stage  --> 

<!--   Stage Forgot password    ------------------------------------------------------------>
<div class="animate-switch" ng-switch-when="stageForgotPassword">
<section class="jumbotron text-center">
<div class="container">
<h1 class="jumbotron-heading">Forgot your password</h1>
<h5>Not a problem. Enter your email adress below and well send you password reset instructions.</h5>
</div>
</section>

 <div class="container center_div" >
  <div class="row">
 <div class="col-md-2 col-sm-2 col-xs-2 col-lg-2 ">
 </div>
 <div class="col-md-8 col-sm-8 col-xs-8 col-lg-8 ">


  <form name="pwd_form" id='pwd_form'>
    <div style="display:none;" id="Ssent" class="alert alert-success">
	  <button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
	We've just sent you an email to reset your password.
	</div>
	<div style="display:none;" id="Wmailrequired" class="alert alert-warning">
	  <button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
	The email is required.
	</div>
  <div class="form-group">
    <input type="email" ng-model="formParams.email" required ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" class="form-control" id="useremail2" placeholder="Email Address">
                  
 </div>
  <div class="row" style="margin-top: 20px;">
   <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 form-group">
            <a href="#" style="font-size:  18px;"  ng-click="back('stageLogin')">Cancel</a>
        </div>      
   <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 form-group">
            <button type="button" onclick="resetpassword();" class="btn btn-success btn-round" id="sendpwd" style="float: right;margin-right: 0px;" >Send</button>
        </div>  
   </div>
</form>
</div>
 <div class="col-md-2 col-sm-2 col-xs-2 col-lg-2 ">
 </div>
  </div>
</div>	


</div> <!-- End Stage  -->
<script type="text/javascript">
  /*********          Login            ********/
   
  function login() {

  
 var email= document.getElementById('useremail').value;
var upassword= document.getElementById('userpassword').value;
	var datatosend='{\"grant_type\":\"client_credentials\",\"username\": \"'+email+'\",\"password\": \"'+upassword+'\",\"audience\": \"https://iristelx.auth0.com/api/v2/\", \"connection\": \"Admin-Username-Password-Authentication\", \"client_id\": \"YoP9NqMrBM8vAN54ghQAHOh26x8vzY2g\", \"client_secret\": \"cpmLerk2uWdI2rA1hf9qMVpENpc-7kxf-4kVeM1HMeQq8JJpb54MNgsdUdVA9p19\"}';
console.log('data to send '+datatosend);
var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://iristelx.auth0.com/oauth/token",
  "method": "POST",
  "headers": {
    "content-type": "application/json"
  },
  "processData": false,
  "data": datatosend
  }


$.ajax(settings).done(function (response) {
    var newURL = window.location.protocol + "//" + window.location.host + window.location.pathname;
	if(window.location.host=="127.0.0.1")
	{newURL="http://127.0.0.1/laravel5/";}
  var  token=response.access_token;

   var  access_token="Bearer "+token;
   console.log('before load');
  	 jQuery('#div_session_write').load(''+newURL+'public/session_write.php?access_token='+token);
 console.log('after load');	
	document.getElementById('tokeninput').value = token;
	//show user info
	 console.log('after save');
	if (document.getElementById('tokeninput').value == null){
	token= document.getElementById('div_session_write').innerHTML.substr(26);
	
	}
	else {token= document.getElementById('tokeninput').value;}
	 access_token="Bearer "+token;
	
	//$scope.showuserinfo(access_token);
	//$scope.next('stagePlans'); 
	//$scope.$apply();
	//////////
});
$.ajax(settings).fail(function (response) {
	$(".alert-danger").slideDown();
console.log('fail2');

});


}

 /******** end login ********/
  function resetpassword(){
	  document.getElementById("Ssent").style.display="none";
	  document.getElementById("Wmailrequired").style.display="none";
	  email= document.getElementById('useremail2').value;
if(email==""){$(".alert-warning").slideDown();}
else{
	var datatosend='{\"client_id\": \"YoP9NqMrBM8vAN54ghQAHOh26x8vzY2g\",\"email\": \"'+email+'\",\"connection\": \"Admin-Username-Password-Authentication\"}';


	console.log('data to send '+datatosend);
var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://iristelx.auth0.com/dbconnections/change_password",
  "method": "POST",
  "headers": {
    "content-type": "application/json"
  },
  "processData": false,
  "data": datatosend
  }


$.ajax(settings).done(function (response) {
  console.log(response);
  $(".alert-success").slideDown();
});
	  
}	  
  }

</script>

</body>
</html>