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
<head>
    <title>SIM Activation</title>
    <link href="https://cdn.auth0.com/styleguide/4.8.10/index.min.css" rel="stylesheet" />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://cdn.auth0.com/js/auth0/9.0.1/auth0.min.js"></script>
</head>

<html>
<body>

  <header class="site-header">
    <nav role="navigation" class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
           <h1 class="navbar-brand"><a href="/"><span>Iristel</span></a></h1>
        </div>
        <div id="navbar-collapse" class="collapse navbar-collapse">
       <?php
 
 if (isset ($_SESSION['access_token']))
 {echo '
 <ul class="nav navbar-nav navbar-right">
<li><div class="row"><div class="col-sm-6"><h3 id="userinfo"></h3> </div><div class="col-sm-6"><button style="margin-top: 25px;" id="logoutbtn" onclick="logout();" class="signin-button login"> Logout</button></div></div></li>

</ul>
<ul class="nav navbar-nav navbar-right" style="display:none;" id="ullogin">
 <li>   email<input id="email" type="text"></input></li>
<li>password<input id="password" type="password"></input></li>
<li><button onclick="login();" class="signin-button login" >Login</button></li>
 <li><a href="#" onclick="resetpassword();">Forgot Password?</a></li>
 </ul>';}
else
{  
     echo'   
<ul class="nav navbar-nav navbar-right" id="ullogout" style="display:none;">
<li><div class="row"><div class="col-sm-6"><h3 id="userinfo"></h3> </div><div class="col-sm-6"><button style="margin-top: 25px;" id="logoutbtn" onclick="logout();" class="signin-button login"> Logout</button></div></div></li>
</ul>
	 <ul class="nav navbar-nav navbar-right"  id="ullogin">
 <li>   email<input id="email" type="text"></input></li>
<li>password<input id="password" type="password"></input></li>
<li><button onclick="login();" class="signin-button login" >Login</button></li>
 <li><a href="#" onclick="resetpassword();">Forgot Password?</a></li>
 </ul>';}	?>
        </div>
      </div>
    </nav>
  </header>
<div id='div_session_write' style="display:none;"> </div>

<script type="text/javascript">
var token="";
function login(){
	
email= document.getElementById('email').value;
password= document.getElementById('password').value;
	var datatosend='{\"grant_type\":\"password\",\"username\": \"'+email+'\",\"password\": \"'+password+'\",\"audience\": \"https://raniasaad.eu.auth0.com/api/v2/\", \"scope\": \"openid\", \"client_id\": \"JBL90aJJc4ZG7DxcIfITrYB-UrjbvY_u\", \"client_secret\": \"XugxD0AsEQpw5pwatO6kPjXouUPdBfuumztpf3p6LllTAR27JTzLvhhEcaEkQrla\"}';
console.log('data to send '+datatosend);
var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://raniasaad.eu.auth0.com/oauth/token",
  "method": "POST",
  "headers": {
    "content-type": "application/json"
  },
  "processData": false,
  "data": datatosend
  }


$.ajax(settings).done(function (response) {
     token=response.access_token;
    access_token="Bearer "+token;
  	 jQuery('#div_session_write').load('http://127.0.0.1/laravel5/public/session_write.php?access_token='+token);
	 document.getElementById('tokeninput').value = token;
	//show user info
	
	if (document.getElementById('tokeninput').value == null){
	token= document.getElementById('div_session_write').innerHTML.substr(26);
	
	}
	else {token= document.getElementById('tokeninput').value;}
	 access_token="Bearer "+token;
	showuserinfo(access_token);
	
	
});


}
function showuserinfo(access_token){
var settings2 = {
  "async": true,
  "crossDomain": true,
  "url": "https://raniasaad.eu.auth0.com/userinfo",
  "method": "GET",
  "headers": {
    "authorization": access_token
  },
  "data": "{}"
}

$.ajax(settings2).done(function (response) {
  console.log(response);
  document.getElementById('ullogout').style="display:block;";
  document.getElementById('logoutbtn').style.display="block";
  document.getElementById('ullogin').style="display:none;";
  document.getElementById('userinfo').innerHTML=response.nickname;
});
}

  function logout(){
	  
	  //var xmlhttp = getXmlHttp();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('GET','http://127.0.0.1/laravel5/public/session_destroy.php', true);
    xmlhttp.onreadystatechange=function(){
       if (xmlhttp.readyState == 4){
          if(xmlhttp.status == 200){
            window.location.replace("http://127.0.0.1/laravel5/public");
         }
       }
    };
    xmlhttp.send(null);
		  
  }
  
  function resetpassword(){
	  email= document.getElementById('email').value;

	var datatosend='{\"client_id\": \"JBL90aJJc4ZG7DxcIfITrYB-UrjbvY_u\",\"email\": \"'+email+'\",\"connection\": \"databaseserver\"}';


	console.log('data to send '+datatosend);
var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://raniasaad.eu.auth0.com/dbconnections/change_password",
  "method": "POST",
  "headers": {
    "content-type": "application/json"
  },
  "processData": false,
  "data": datatosend
  }


$.ajax(settings).done(function (response) {
  console.log(response);
});
	  
	  
  }

</script>

</body>
</html>
