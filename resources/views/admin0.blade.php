<?php session_start(); ?>
 <?php
 \Log::info('Visit Iristel Administration Portal');
  if (isset ($_SESSION['access_tokenA']))
 {echo ' <input type="hidden" id="tokeninput" value="'.$_SESSION["access_tokenA"].'" />';}
 else{echo ' <input type="hidden" id="tokeninput" />';}
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">  
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
 <link rel="stylesheet" href="public/css/style.css"> 
   <script  src="public/js/jquery-3.2.1.min.js" type="text/javascript"> </script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular-animate.min.js'></script>
</head>

<body>
 <input type="hidden" name="uinfo" id="uinfo" />
   <div id='div_session_write' style="display:none;"> </div>
   <div id='div_session_write2' style="display:none;"> </div>
       <div id="navbar-collapse" class="collapse navbar-collapse">
       <?php

  if (isset ($_SESSION['access_tokenA']))
 {$style='display:block;';
  $loggedin=true;

  }else{
 $style='display:none';
 
 $loggedin=false;}
 if (isset ($_SESSION['usernameA']))
 {

   $value1='Logged in as ';
   $value2=$_SESSION['usernameA'];

 }else{
 $value1='';$value2='';
 }
echo'
<ul class="nav navbar-nav navbar-right" id="logoutbtn" style="'.$style.'">
<li><div class="row"><style> .logout a:hover{background-color:#049afe!important;}</style>
<div class="col-sm-10"><br><B style="font-size:12px;margin-top:20px;  " ><span id="userinfo0" style="font-size:16px;">'.$value1.'</span><span style="font-size:16px;color:#049afe" id="userinfo">'.$value2.'</span></B> </div>
<div class="logout col-sm-2"><a style="background-color:#006fb9;margin-top:10px" href="#" class="btn btn-info " onclick="logout();"> <span   class="glyphicon glyphicon-log-out"></span> Log out</a></div></div></li>

</ul>';
?>
        </div>

<main ng-app="formApp" ng-controller="formCtrl" ng-cloak>

    <form name="FormActivate" class="form-validation" role="form" novalidate>
      <div ng-switch on="stage" ng-class="{forward: direction, backward:!direction}">
	  	 
	<?php if ($loggedin ) { $next1 ='stage2'; echo '
		
<!--   Stage 1     -->

<div class="animate-switch"  ng-switch-default >
<h1>Louckup</h1>
<div style="width:600px">		
<label>Serach Pin: <input type="number" ng-change="init()" ng-model="search.pin" ></label> <button ng-click="loockup()"> loockup</button><br>
<div id="searcharea" style="min-height:200px ">     
<table id="searchObjResults" style="width:200px">
  <tr><th>PIN</th><th>SIM</th></tr>
  <tr ng-repeat="data in DataPins | filter : search | limitTo:5">
    <td ng-bind="data.pin"> </td>
    <td ng-bind="data.sim"></td>
  </tr>
</table> 
</div></br>
<div id="pinarea" style=" ;display:none">     
<div ng-repeat="data in DataPins | filter : search | limitTo:1">
<table>
<tr><td>PIN : 	</td><td ng-bind="data.pin"></td></tr>
<tr><td>SIM : 	</td><td ng-bind="data.sim"></td></tr>
<tr><td>Status :</td><td  ><span   ng-if="data.enabled == 1">  <a ng-click="disable(data.id);" href="#">disable Ajax Server</a>
</span> <span   ng-if="data.enabled == 0">Disabled</span> </td></tr>
<tr ng-if="data.enabled == 0"><td > Enable</td><td>	<input type="hidden" id="idpin" ng-bind="data.id" />
 
  <a href="http://test.enterpriseesolutions.com/admin/enable/{{data.id}}">enable serveur</a>
  <a href="http://127.0.0.1/laravel5/admin/enable/{{data.id}}">enable local</a>
  <a ng-click="enable(data.id);" href="#">enable Ajax Server</a>

</td></tr>
</table>	
</div>
</div>	  		
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 ">
			<div class="row" style="margin-top: 20px;">
			<!-- Buttons Next & Previous -->
			<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 form-group">
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 form-group">
				<button type="button" style="float:right" class="btn btn-primary btn btn-success btn-previous btn-md" id="stage2"  ng-click="next('.$next1.')">Next  <i class="icnright"></i></button>
            </div>
			</div>
            </div>
        </div>
</div> <!-- End Stage 1 -->
		
		
	';}	
	 
	 	
else{
		$next2='stageForgotPassword'; $next1 ='stage2';
	echo '
	
<!--     : STAGE LOGIN   ------------------------------------------------------------>
<div class="animate-switch"   ng-switch-default>
<section class="jumbotron text-center">
<div class="container">

<h1 class="jumbotron-heading">Admin Login</h1>
</div>
</section>
<div class="inner-wrapper">
<div class="container">
  <div class="row">
    <div class="col-sm-4 col-sm-offset-4 center_div">
	
      <form name="login_form" id="login_form">
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
			<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 form-group">
     
            <a style="font-size: 16px;"  ng-click="next('.$next2.')" href="#">Forgot Password?</a>
        </div>      
			<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 form-group">
            <button ng-model="test" type="button" ng-click="login();" class="btn btn-success btn-round" style="float: right;margin-right: 0px;" >Login</button>
        </div>  
    </div>
</form>
    </div>
  </div> 
</div>
</div>
 </div> <!-- End Stage Login --> 


	

<div class="animate-switch" ng-switch-when="stageLouckup">
<h1>Louckup</h1>
<div style="width:600px">		
<label>Serach Pin: <input type="number" ng-change="init()" ng-model="search.pin" ></label> <button ng-click="loockup()"> loockup</button><br>
<div id="searcharea" style="min-height:200px ">     
<table id="searchObjResults" style="width:200px">
  <tr><th>PIN</th><th>SIM</th></tr>
  <tr ng-repeat="data in DataPins | filter : search | limitTo:5">
    <td ng-bind="data.pin"> </td>
    <td ng-bind="data.sim"></td>
  </tr>
</table> 
</div></br>
<div id="pinarea" style=" ;display:none">     
<div ng-repeat="data in DataPins | filter : search | limitTo:1">
<table>
<tr><td>PIN : 	</td><td ng-bind="data.pin"></td></tr>
<tr><td>SIM : 	</td><td ng-bind="data.sim"></td></tr>
<tr><td>Status :</td><td  ><span   ng-if="data.enabled == 1">Enabled</span> <span   ng-if="data.enabled == 0">Disabled</span> </td></tr>
<tr ng-if="data.enabled == 0"><td > Enable</td><td>	<input type="hidden" id="idpin" ng-bind="data.id" >{{data.id}}</input>
 
  <a href="http://test.enterpriseesolutions.com/admin/enable/{{data.id}}">enable serveur</a>
  <a href="http://127.0.0.1/laravel5/admin/enable/{{data.id}}">enable local</a>
  <a ng-click="enable(data.id);" href="#">enable Ajax Server</a>

</td></tr>
</table>	
</div>
</div>	  		
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 ">
			<div class="row" style="margin-top: 20px;">
			<!-- Buttons Next & Previous -->
			<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 form-group">
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 form-group">
				<button type="button" style="float:right" class="btn btn-primary btn btn-success btn-previous btn-md" id="stage2"  ng-click="next('.$next1.')">Next  <i class="icnright"></i></button>
            </div>
			</div>
            </div>
        </div>
</div> <!-- End Stage 1 -->
		
		';
		
}
	
	?>		
		
<!--   Stage Loock Up     

<div class="animate-switch" ng-switch-when="stageLouckup">
<h1>Louckup</h1>
<div style="width:600px">		
<label>Serach Pin: <input type="number" ng-change="init()" ng-model="search.pin" ></label> <button ng-click="loockup()"> loockup</button><br>
<div id="searcharea" style=" ">     
<table id="searchObjResults" style="width:200px">
  <tr><th>PIN</th><th>SIM</th></tr>
  <tr ng-repeat="data in DataPins | filter : search | limitTo:5">
    <td ng-bind="data.pin"> </td>
    <td ng-bind="data.sim"></td>
  </tr>
</table> 
</div></br>
<div id="pinarea" style=" ;display:none">     
<div ng-repeat="data in DataPins | filter : search | limitTo:1">
<table>
<tr><td>PIN : 	</td><td ng-bind="data.pin"></td></tr>
<tr><td>SIM : 	</td><td ng-bind="data.sim"></td></tr>
<tr><td>Status :</td><td  ><span   ng-if="data.enabled == 1">Enabled</span> <span   ng-if="data.enabled == 0">Disabled</span> </td></tr>
</table>	
</div>
</div>	  		
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 ">
			<div class="row" style="margin-top: 20px;">
 			<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 form-group">
			<button type="button" class="btn btn-success btn-previous btn-md" ng-click="back('stage1')"><i class="icnleft"></i>  Back</button>  
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 form-group">
				<button type="button" style="float:right" class="btn btn-primary btn btn-success btn-previous btn-md" id="stage2"  ng-click="next('stage2')">Next  <i class="icnright"></i></button>
            </div>
			</div>
            </div>
        </div>
</div> <!-- End Stage Loock Up -->

		<!--   Stage 2     -->
		<div class="animate-switch" ng-switch-when="stage2">
				<h1>Stage 2</h1>

		<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 ">
			<div class="row" style="margin-top: 20px;">
			<!-- Buttons Next & Previous -->
			<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 form-group">
			<button type="button" class="btn btn-success btn-previous btn-md" ng-click="back('stage2')"><i class="icnleft"></i>  Back</button>  
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 form-group">
				<button type="button" style="float:right" class="btn btn-primary btn btn-success btn-previous btn-md" ng-click="next('stage3')">Next  <i class="icnright"></i></button>
            </div>
			</div>
            </div>
        </div> <!-- End Stage  2-->
		
 
 
		
   

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
	<div id="emailnotfound" style="display:none;margin-top: 10px;" class="alert alert-danger">
	  <button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
	NON-EXISTENT EMAIL .
	</div>
	
  <div class="form-group">
    <input type="email" ng-model="formParams.email" required ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" class="form-control" id="useremail2" placeholder="Email Address">
                  
 </div>
  <div class="row" style="margin-top: 20px;">
   <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 form-group">
            <a href="#" style="font-size:  18px;"  ng-click="back('')">Cancel</a>
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

</div> <!-- End all Stages  -->
  </form>
 
	
  </div><!-- container -->
</main>

    <script  src="public/js/admin.js"></script>


<button onclick="downloadtemplate();" id="btndownloadtemplate">Download csv template</button>

</body>
    
  <script>
   function downloadtemplate() {

 $.ajax({
  type: "GET",
  url: "http://test.enterpriseesolutions.com/downloadtemplate",
  headers: {
                    'Access-Control-Allow-Origin': '*'
                },
  data: "{}"
}).done(function( msg ) {
  alert( "Data Saved: " + msg );
}).fail(function( msg ) {
  alert( "Template uploaded only in server " + msg );
});    

    }
   </script>
<script>
//@Ran

  /*
 function enable(id){
	//  var id =document.getElementById('idpin').value;
	 // var id =2 ;
	//  var url = window.location.href+'/enable/2' ;
	   alert(id);
 	  
	 var setting = {
  "async": true,
  "crossDomain": true,
  "url": "http://test.enterpriseesolutions.com/admin/enable/"+id,
  "method": "GET",
  "headers": {
     'Access-Control-Allow-Origin': '*'
  },
  "processData": false 
 
  }
  
   
$.ajax(setting).done(function (response) {
	alert('done' + response);
});

$.ajax(setting).fail(function (response) {
	alert('fail'+ response);
});
	 
 }
 */
 
 /******** Reset password ********/
 
 function resetpassword(){
	  document.getElementById("Ssent").style.display="none";
	  document.getElementById("Wmailrequired").style.display="none";
	  document.getElementById("emailnotfound").style.display="none";
	  email= document.getElementById('useremail2').value;
if(email==""){$("#Wmailrequired").slideDown();}
else{
	var settings0 = {
  "async": true,
  "crossDomain": true,
  "url": "https://iristelx.auth0.com/oauth/token",
  "method": "POST",
  "headers": {
    "content-type": "application/json"
  },
  "processData": false,
  "data": '{\"grant_type\":\"client_credentials\",\"client_id\": \"YoP9NqMrBM8vAN54ghQAHOh26x8vzY2g\",\"client_secret\": \"cpmLerk2uWdI2rA1hf9qMVpENpc-7kxf-4kVeM1HMeQq8JJpb54MNgsdUdVA9p19\",\"audience\": \"https://iristelx.auth0.com/api/v2/\"}'

  }


$.ajax(settings0).done(function (response) {
	
  var  token=response.access_token;

   var  access_token="Bearer "+token;
   	var settings1 = {
  "async": true,
  "crossDomain": true,
  "url": 'https://iristelx.auth0.com/api/v2/users?q="'+email+'"',
  "method": "GET",
  "headers": {
    "content-type": "application/json",
	 "authorization": access_token
  },
  "processData": false,
  "data": ''

  }
  $.ajax(settings1).done(function (response) {
  if(response.length==0){$("#emailnotfound").slideDown();}
  else if(response[0].identities[0].connection=="Admin-Username-Password-Authentication"){
var datatosend='{\"client_id\": \"YoP9NqMrBM8vAN54ghQAHOh26x8vzY2g\",\"email\": \"'+email+'\",\"connection\": \"Admin-Username-Password-Authentication\"}';

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
  
  $(".alert-success").slideDown();
  
});
	$.ajax(settings).fail(function (response) {
  console.log(response);
 });  
  }
  else{$("#emailnotfound").slideDown();}
  });
  $.ajax(settings1).fail(function (response) {console.log(response);});
});
  $.ajax(settings0).fail(function (response) {console.log(response);});

}	  
  }
	
  /******** end Reset password ********/
 var $body = $("body");

$(document).on({
    ajaxStart: function() { console.log('start');$body.addClass("loading");    },
     ajaxStop: function() { $body.removeClass("loading"); }    
}); 

/******** logout ********/

  function logout() {

var URL = window.location.protocol + "//" + window.location.host + window.location.pathname;
 
  var newURL = window.location.protocol + "//" + window.location.host;
 if(newURL=="http://127.0.0.1"){newURL=newURL+"/laravel5";}
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('GET',''+newURL+'/public/session_destroyA.php', true);
   console.log(''+newURL+'/public/session_destroyA.php');
    xmlhttp.onreadystatechange=function(){
       if (xmlhttp.readyState == 4){
          if(xmlhttp.status == 200){
			  if (newURL=='http://127.0.0.1/laravel5/activate/admin'){
				   window.location.replace(newURL);
			  }
			  else{
				   window.location.replace(URL);
			  }     
         }
       }
    };
    xmlhttp.send(null);
		  
  }
  

 /******** end logout ********/
 
</script>
<style>
/* style loading ...   */
.modal {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('http://test.enterpriseesolutions.com/public/ajax-loader.gif') 
                50% 50% 
                no-repeat;
}

body.loading {
    overflow: hidden;   
}


body.loading .modal {
    display: block;
}
</style>
</html>
