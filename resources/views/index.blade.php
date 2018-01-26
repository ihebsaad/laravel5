<?php session_start(); ?>
<?php 
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Authorization");
    header("Access-Control-Allow-Methods: GET,HEAD,PUT,PATCH,POST,DELETE");
?>

 <?php
 \Log::info('Here');
  if (isset ($_SESSION['access_token']))
 {echo ' <input type="hidden" id="tokeninput" value="'.$_SESSION["access_token"].'" />';}
 else{echo ' <input type="hidden" id="tokeninput" />';}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">  
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
  <link rel="stylesheet" href="public/css/simstyle.css">
 	 <script  src="public/js/jquery-3.2.1.min.js" type="text/javascript"> </script>
  <title>SIM Activation</title>
   <style> input.ng-valid.ng-dirty  {border:1px solid #5cb85c;}  input.ng-invalid.ng-dirty {border:1px solid #FA5858;}   </style>

</head>
<body>

<div class="navbar navbar-inverse bg-inverse" style="border-color: #fff!important;border-radius: 0px!important;margin-bottom: 0px!important;">


<div class="container d-flex justify-content-between">
<div class="row" style="width:100%;">
<div class="col-md-3">
<a href="#" class="navbar-brand" style=" padding-bottom: 0px; padding-top: 0px; ">
    <svg xmlns="http://www.w3.org/2000/svg" id="logo" viewBox="0 0 73.5 21.3" class="logo-small">
                        <style>.st-blue{fill:#006fba}.st1{fill:#a6a9ab}</style>
                        <path d="M40.2.1c0-.1-.2-.1-.3-.1l-1.8.9c-4 1.9-13.7 6.3-17 6.4h-.2c-3.3 0-12-4.2-15.9-6.2C4.3.7 3.6.4 3 0h-.3c-.1.1-.1.2-.1.3l.1.1c.2.1.3.2.5.2.5.4 1.1.7 1.8 1.1 14.2 7.4 16 8.1 16.4 8.1h.1c.9-.6 12.2-6.1 16.8-8.3 1.1-.5 1.8-.8 1.9-.9.1-.2.1-.3 0-.5z" class="st-blue"></path>
                        <path d="M16.5 16.2c.5-.5.7-1.1.7-1.9 0-1-.4-1.8-1.1-2.2-.8-.5-1.9-.7-3.6-.7H5.7v9.9h2.8v-3.9h3.2l3 3.9h3.1l-3.3-4.1c.9-.2 1.5-.5 2-1zm-2.6-.9c-.4.2-1.1.3-2 .3H8.5v-2.5h3.4c1 0 1.6.1 2 .3.3.2.5.5.5 1 0 .4-.2.8-.5.9zM0 11.4h3v9.9H0zm19.5 0h3v9.9h-3zm18.3 1.7H42v8.2h2.9v-8.2h4.3v-1.7H37.8zm-1.7 3.1c-.7-.4-1.7-.6-3.2-.6h-3.7c-.6 0-1.1-.1-1.3-.3-.3-.2-.5-.5-.5-.8 0-.4.2-.8.5-1 .3-.2.9-.3 1.7-.3h6.9v-1.8h-7.3c-1.7 0-2.8.2-3.6.7-.7.5-1.1 1.3-1.1 2.3 0 1 .4 1.7 1.1 2.2.7.4 1.8.6 3.4.6h3.3c.7 0 1.3.1 1.5.3.3.2.5.5.5.9s-.2.7-.5.8c-.3.1-.9.3-1.7.3h-7v1.8h7.5c1.6 0 2.8-.2 3.5-.7.7-.5 1.1-1.3 1.1-2.2-.1-1.1-.4-1.8-1.1-2.2zm29.8 3.4v-8.2h-2.8v9.9h10.4v-1.7zm-14.6-6.9c-1 .8-1.5 2.1-1.5 3.9 0 .9.2 1.7.5 2.3.3.6.9 1.2 1.5 1.6.5.3 1.1.5 1.6.6.6.1 1.5.2 2.5.2h4.7v-1.8H56c-1.1 0-2-.1-2.4-.6-.5-.4-.7-1-.7-1.8h7.7v-1.8h-7.7c.1-.8.3-1.3.9-1.8.5-.4 1.3-.6 2.3-.6h4.6v-1.7H56c-2.1.2-3.7.6-4.7 1.5z" class="st1"></path>
                    </svg>
    
  </a>
  </div>
<!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>-->
<div class="col-md-6">
</div>
<div class="col-md-3">

       <div id="navbar-collapse" class="collapse navbar-collapse">
       <?php

  if (isset ($_SESSION['access_token']))
 {$style='display:block;';
  $loggedin=true;

  }else{
 $style='display:none';
 
 $loggedin=false;}
 if (isset ($_SESSION['username']))
 {
   $pos = strpos($_SESSION['username'], '/');
$fname=substr($_SESSION['username'],0,$pos);
$lname=substr($_SESSION['username'],$pos+1);
   $value='Logged in as '.$fname.' '.$lname;

 }else{
 $value='';}
echo'
<ul class="nav navbar-nav navbar-right" id="logoutbtn" style="'.$style.'">
<li><div class="row"><div class="col-sm-9"><h5 id="userinfo">'.$value.'</h5> </div><div class="col-sm-3"><button style="margin-top: 25px;"  onclick="logout();"  class="signin-button login"> Logout</button></div></div></li>

</ul>';
?>
        </div>
        </div><!-- Col -->
</div><!-- Row -->
</div>


</div> <!-- end NAV BAR -->
<section class="jumbotron text-center">
<div class="container">
<h1 class="jumbotron-heading" id="pagetitle">Activate You SIM</h1>
<h5 id="pagesubtitle">To begin, enter the Activation PIN on your SIM KIT.</h5>
</div>
</section>


<main ng-app="formApp" ng-controller="formCtrl" ng-cloak>
  <div class="container">
   <div id='div_session_write' style="display:none;"> </div>
   <div id='div_session_write2' style="display:none;"> </div>
   <div id='div_session_write3' style="display:none;"> </div>

    <form name="FormActivate" class="form-validation" role="form" novalidate>
      <div ng-switch on="stage" ng-class="{forward: direction, backward:!direction}">

		
<!--   Stage 4  : STAGE LOGIN   ------------------------------------------------------------>
<div class="animate-switch" ng-switch-when="stageLogin">
<div class="container-triangle"></div>
<div class="contentcontain">
		   <div class="row">


  <div class="row">
    <div class="col-sm-4 col-sm-offset-4">
	
      <form name="login_form" id='login_form'>
	  <div style="display:none;" class="alert alert-danger">
	  <button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
	WRONG EMAIL OR PASSWORD.
	</div>
  <div class="form-group" style="margin-top: 30px;">
    <input  type="email"  ng-model="formParams.email" required ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" class="form-control" id="useremail" placeholder="Email Address">
  </div>
  <div class="form-group">
    <input  type="password"  class="form-control" id="userpassword" placeholder="Password">
  </div>
  <div class="row" style="margin-top: 20px;">
  <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
     
            <a style="font-size: 16px;" ng-click="next('stageForgotPassword')" href="#">Forgot Password?</a>
        </div>      
 <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
            <button ng-model="test" type="button" ng-click="login();" class="btn btn-success btn-round" style="float: right;margin-right: 0px;" >Login</button>
        </div>  
    </div>
</form>
    </div>
  </div> 
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 ">
			<div class="row" style="margin-top: 20px;margin-left:30px;margin-right:30px;">

            <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
			<button type="button" class="btn btn-success btn-previous btn-md" ng-click="back(default)"><i class="icnleft"></i>  Back</button>  
			</div>
            <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
            </div>
			</div>
            </div>
          </div>
        </div>
        </div> <!-- End Stage  --> 

	
<!--   Stage Forgot password    ------------------------------------------------------------>
<div class="animate-switch" ng-switch-when="stageForgotPassword">
<div class="container-triangle"></div>
<div class="contentcontain">
 <div class="container center_div">
  <div class="row"  style="margin-top: 20px;">
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
            <button type="button" ng-click="resetpassword();" class="btn btn-success btn-round" id="sendpwd" style="float: right;margin-right: 0px;" >Send</button>
        </div>  
   </div>
</form>
</div>
 <div class="col-md-2 col-sm-2 col-xs-2 col-lg-2 ">
 </div>
  </div>
</div>	
</div>

</div> <!-- End Stage  -->
		
		
<!--   Stage 0   Pin Step  ------------------------------------------------------------>
 <div class="animate-switch" ng-switch-default >


<div class="container-triangle"></div>
<div class="contentcontain">
  <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 ">
            
<div class="container center_div">
<!--<ul>
<div ng-repeat="data in DataPins"   >
         <li ng-bind="data.pin">  </li>
         <li ng-bind="data.sim">  </li>
     </div></ul>-->
         <div class="row">
            <div class="form-group col-sm-8 col-md-8 col-lg-8 col-xs-8">
                <input ng-change="init()" id="pin" name="pin" type="number" min="999"  ng-pattern="/^[0-9]*$/"  class="form-control form-rounded" placeholder="Your PIN" ng-maxlength="25" ng-model="formParams.pin" required ng-class="{'input-error': formValidation && FormActivate.pin.$error.required}" >
                </div>
            <div class="form-group col-sm-4 col-md-4 col-lg-4 col-xs-4">
               <?php if ($loggedin) 			   
				   {echo '
				   <button type="button" ng-click=" checkPin2();mailing()" ng-disabled=" FormActivate.$invalid" class="btn btn-success btn-round">Continue</button> ';} else { echo '
				   <button type="button" ng-click=" checkPin();mailing()" ng-disabled=" FormActivate.$invalid" class="btn btn-success btn-round">Continue</button> ';} 
				   ?>
             </div>

        </div>
		<div class="row">
		  <div class="form-group col-sm-6" >
		  <table style="height:32px"><tr>
		    <td><small class="help-block" style="padding-left:5%;padding-right:5%" ng-show="FormActivate.pin.$error.number">
                  Incorrect PIN format.
                </small></td>
            <td><small  style="padding-rigt:5%" ng-show="FormActivate.pin.$error.maxlength">
                  Max character length reached.
                </small></td>
				<td>
				<!--<span id="pinmessage" class="help-block" style=" ;color:red"  >
                  </span>-->
				<div id="pinmessage" style="display:none;min-width:250px;margin-left:50px;" class="alert alert-danger">
				<button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
				Incorrect Pin !
				</div>
				<div id="pinmessage2" style="display:none;min-width:250px;;margin-left:50px;" class="alert alert-danger">
				<button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
				Pin Already Activated !
				</div>				
				  </td>
				</tr></table>
		  </div>      
<img src="public/findyourpin.jpg" id="myImg"  alt="Find Your PIN" style="width:500px;margin-left:-16px;"/>

<!-- The Modal -->
<div id="myModal" class="modal">
 <span class="close">&times;</span> 
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
</div>

<script>
 
 
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}
 
 modal.onclick = function() { 
    modal.style.display = "none";
}
</script>    

            
            <div class="row" style="margin-top: 20px;">
            <!-- Buttons Next & Previous -->
            <div class="col-sm-9 col-md-9 col-xs-9 col-lg-9 form-group">
            </div>
            <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3 form-group">
                <!--<button type="button" class="btn btn-primary btn btn-success btn-previous btn-md" ng-click="next('stageTypeCustomer')">Next  <i class="icnright"></i></button>-->
            </div>
            </div>
			
    </div>
   </div>
   </div>
 </div>
</div> <!-- End Stage  -->


<!--   Stage Type Customer     ------------------------------------------------------------>
<div class="animate-switch" ng-switch-when="stageTypeCustomer">
		 <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <div class="container-triangle"></div>
<div class="contentcontain">
             <div class="row">
 <div class="container center_div" >
         <div class="row" >
            <ol id="selectable">
                <li style="width:250px;float:left;"   ng-click="newcustomer();" id="newcustomer" class="ui-state-default"><h5>A New Customer</h5><p>I've never done business with Ice Wirless before</p></li>
                <li style="width:250px;float:left;"   ng-click="existingcust();" id="existcustomer" class="ui-state-default"><h5>An Existing Customer</h5><p>I have an account with Ice Wirless </p></li>
            </ol>   
			<input   ng-model="formParams.customer" id="customer" type="hidden"    required ng-pattern="/^[a-zA-Z ]*$/"  />
        </div>
</div>	

			 <!--<p>PIN : <span ng-bind="formParams.pin"></span></p>-->
			 
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 ">
			<div class="row" style="margin-top: 20px;margin-left:30px;margin-right:30px;">
			<!-- Buttons Next & Previous -->
			<div class="col-sm-9 col-md-9 col-xs-9 col-lg-9 form-group">
			<button type="button" class="btn btn-success btn-previous btn-md" ng-click="back('')"><i class="icnleft"></i>  Back</button>  
			</div>
            <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3 form-group">
				<?php
				if (!$loggedin){ echo '
				<button type="button" style="float:right" class="btn btn-primary btn btn-success btn-previous btn-md" id="next1" disabled ng-click="next(Next)">Next  <i class="icnright"></i></button>';}
				else{ echo '
				<button type="button" style="float:right" class="btn btn-primary btn btn-success btn-previous btn-md" id="next1" disabled ng-click="next(Next2)">Next  <i class="icnright"></i></button>';}?>
            </div>
			</div>
            </div>
          </div>
        </div>
        </div> <!-- End Stage  -->


<!--   Stage ACCOUNT CUSTOMER   stageAccount  ------------------------------------------------------------>

<div class="animate-switch" ng-switch-when="stageAccount">
  <div class="container-triangle"></div>
<div class="contentcontain">
  <div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 " >
<div class="container center_div well" style="padding-bottom:80px;padding-top:60px">


<div class="col-sm-12" >
                        <div class="row">
                            <div class="col-sm-6 form-group"> <!---->
                                <input  ng-model="formParams.first" required ng-pattern="/^[a-zA-Z ]*$/" ng-minlength="3" ng-maxlength="25" type="text" placeholder="First Name" id="firstname" class="form-control">
                            </div>
                            <div class="col-sm-6 form-group">
                                <input ng-model="formParams.last" type="text" required ng-pattern="/^[a-zA-Z ]*$/" ng-minlength="3" ng-maxlength="25" placeholder="Last Name" id="lastname" class="form-control">
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <input ng-model="formParams.streetnum"  required type="number" ng-pattern="/^[0-9]*$/" placeholder="Street #" min="1" max="99999" id="address1" class="form-control">                         
						  </div>      
                            <div class="col-sm-8 form-group">
                                <input ng-model="formParams.streetname" required ng-pattern="/^[a-zA-Z ]*$/" ng-minlength="3" ng-maxlength="35" id="address2" type="text" placeholder="Street Name" class="form-control">
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <input ng-model="formParams.unit" type="number" required ng-pattern="/^[0-9]*$/" placeholder="Unit #" min="1" max="99999" id="address3" class="form-control">
                            </div>  
                            <div class="col-sm-4 form-group">
                                <input ng-model="formParams.box" type="text" required ng-pattern="/^[a-zA-Z0-9 ]*$/" ng-minlength="1" ng-maxlength="10" placeholder="PO BOX" class="form-control">
                            </div>  
                            <div class="col-sm-4 form-group">
                                <input ng-model="formParams.postal" type="text" required ng-pattern="/^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/" ng-minlength="6" ng-maxlength="7" placeholder="Postal Code" class="form-control">
                            </div>      
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <input ng-model="formParams.city" type="text" required ng-pattern="/^[a-zA-Z ]*$/" ng-minlength="2" ng-maxlength="25" placeholder="City" class="form-control">
                            </div>      
                            <div class="col-sm-6 form-group">
                                <input ng-model="formParams.province" type="text" required ng-pattern="/^[a-zA-Z ]*$/" ng-minlength="1" ng-maxlength="2" placeholder="Province" class="form-control">
                            </div>  
                        </div>
                            
                    <div class="form-group">
                        <input type="email"  id="email"  required ng-model="formParams.email" placeholder="Email Address" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" class="form-control">
                    </div>  
                     <div class="row" style="margin-bottom: 20px;">
                         <div class="col-sm-6 form-group" style="margin-top: 20px!important;">
                             <input ng-model="formParams.password" ng-pattern="/^(?=.*\d)(?=.*[A-Z])/"   required id="password" type="password" ng-minlength="8" ng-maxlength="25" class="form-control ex-input" placeholder="Password" /></br>
                             <input ng-model="formParams.confirm"  required id="confirm_password" type="password"  data-match="FormActivate.password" class="form-control ex-input" placeholder="Re-Type Password" />
                             <span id='message' style="font-size: 12px;float:right;"></span>
<!--<button ng-click="sendWelcomeemail()">Send Welcome Mail</button>-->                                  
					   </div>
                         <div class="col-sm-6 form-group" >
                             <div class="wrapper" style="margin: 0px!important;">
                                <div class="popover right show">
                                    <div class="arrow"></div>
                                    <div class="popover-content"></div>
                                </div>
                            </div>

						</div>	
					</div>						
            
				</div>
			</div>
	
<script>
 /******** logout ********/

  function logout() {

var URL = window.location.protocol + "//" + window.location.host ;
 
  var newURL = window.location.protocol + "//" + window.location.host + window.location.pathname;
 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('GET',''+newURL+'public/session_destroy.php', true);
    xmlhttp.onreadystatechange=function(){
       if (xmlhttp.readyState == 4){
          if(xmlhttp.status == 200){
			  if (newURL=='http://127.0.0.1/laravel5/'){
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

  (function(exports) {

  function PasswordStrengthValidator() {
    function createReturnValue(
      text,
      strength,
      isLongEnough,
      hasSpecialCharacter
    ) {
      return {
        text: text,
        strength: strength,
        requirements: [
          {
            text: "Use at least 8 characters",
            isMet: isLongEnough
          },
          {
            text: "Use at least 1 number and 1 capital",
            isMet: hasSpecialCharacter
          }
        ]
      };
    }

    this.validate = function(input) {
      var validityRegexp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/,
        //specialCharacterRegexp = /(\d|[A-Z])/;
        specialCharacterRegexp = (/^(?=.*\d)(?=.*[A-Z])/);

      var isEmpty = !input || input.length === 0,
        hasSpecialCharacter = specialCharacterRegexp.test(input),
        isValid = validityRegexp.test(input);

      if (isEmpty) {
        return createReturnValue("", 0, false, false);
      }

      if (isValid) {
        if (input.length > 12) {
          return createReturnValue("very strong", 4, true, hasSpecialCharacter);
        } else if (input.length > 9) {
          return createReturnValue("strong", 3, true, hasSpecialCharacter);
        } else {
          return createReturnValue("ok", 2, true, hasSpecialCharacter);
        }
      } else {
        if (input.length < 8) {
          return createReturnValue("too short", 1, false, hasSpecialCharacter);
        } else {
          return createReturnValue("invalid", 1, true, hasSpecialCharacter);
        }
      }
    };
  }

  exports.PasswordStrengthValidator = PasswordStrengthValidator;
})(window);

(function(exports) {
  function getCheckmarkSvg() {
    return '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="13" height="10" viewBox="0 0 13 10" style="enable-background:new 0 0 13 10;" xml:space="preserve"><path d="M12.942,1.187l-0.391-0.411V0.775l-0.267-0.281l-0.412-0.433c-0.077-0.081-0.202-0.081-0.279,0l-0.434,0.456L4.802,7.201L1.453,3.68c-0.077-0.081-0.202-0.081-0.279,0L0.058,4.853c-0.077,0.081-0.077,0.213,0,0.293l4.558,4.793c0.077,0.081,0.202,0.081,0.279,0l7.634-8.026h0.002l0.412-0.433C13.019,1.399,13.019,1.267,12.942,1.187z"/></svg>';
  }

  function getBox() {
    return $("<div />").addClass("password-indicator__box");
  }

  function PasswordStrengthPopover(options) {
    this.options = options;

    this.render = function(validity) {
      var passwordIndicator = $("<div />")
        .addClass("password-indicator")
        .addClass("password-indicator--strength-" + validity.strength);

      var header = $("<div />")
        .addClass("password-indicator__header")
        .text("Password strength: ");

      var headerSuffix = $("<span />")
        .addClass("password-indicator__header-suffix")
        .text(validity.text);

      header.append(headerSuffix);

      var boxes = $("<div />")
        .addClass("password-indicator__boxes")
        .append(getBox)
        .append(getBox)
        .append(getBox)
        .append(getBox);

      var requirements = $("<div />").addClass(
        "password-indicator__requirements"
      );

      $(validity.requirements).each(function() {
        var requirement = $("<div />")
          .addClass("password-indicator__requirement")
          .toggleClass("password-indicator__requirement--valid", this.isMet)
          .append(getCheckmarkSvg())
          .append($("<span>").text(this.text));

        requirements.append(requirement);
      });

      passwordIndicator
        .append(header)
        .append(boxes)
        .append(requirements);

      $(options.mount)
        .empty()
        .append(passwordIndicator);
    };
  }

  exports.PasswordStrengthPopover = PasswordStrengthPopover;
})(window);

var validator = new PasswordStrengthValidator();
var popover = new PasswordStrengthPopover({ mount: ".popover-content" });

function render(password) {
  popover.render(validator.validate(password));
}

render();
$("#password").keyup(function(e) {
  render(e.target.value);
});
// password retype verification
$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
	 $('#confirm_password').css('border', '1px solid #5cb85c');

 
  } else {
    $('#message').html('Not Matching').css('color', '#FA5858');
 $('#confirm_password').css('border', '1px solid #FA5858');


 }
 
	
});
 

 </script>
	<!--<script  src="js/password.js"></script>-->

		
			
			<div class="row" style="margin-top: 20px;margin-left:30px;margin-right:30px;">
			<!-- Buttons Next & Previous -->
			<div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
			<button style="float:center" type="button" class="btn btn-success btn-previous btn-md" ng-click="back('stageTypeCustomer')"><i class="icnleft"></i>  Back</button>  
			</div>
            <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
				<button style="float:right" type="button" class="btn btn-primary btn btn-success btn-previous btn-md" ng-disabled="(FormActivate.$pristine || FormActivate.$invalid )|| ! chekPass()"  id="next3" disabled   ng-click="next('stagePlans')">Next  <i class="icnright"></i></button>
            </div>
			</div>
  </div>
 </div>
</div>
</div> <!-- End Stage  -->	
		
<!--   Stage 3  : STAGE PLANS    ------------------------------------------------------------>
	
<div class="animate-switch" ng-switch-when="stagePlans" id="plans" >
   <div class="container-triangle"></div>
  <div class="contentcontain">
   <div class="row"  >
   <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 " style="width:100%"> 

            <ol id="selectable" >
	<div ng-repeat="data in myData.plans"   >
 	<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 "  >
		<center>
 			<li   ng-attr-id='@{{data.planCode}}' class="ui-state-default"  ng-click="setPlan(data.planCode,data.planType,data.recurringCharge)" style="margin-left:10%;width:80%; ;border: 1px solid #c5c5c5;color:#454545; ; background-color: rgb(246, 246, 246);">
			<h5   ng-model="formParams.planType"  ng-bind="data.planType"></h5><p><B  ng-model="formParams.recurringCharge" ng-bind="data.recurringCharge"> </B> $ / mth</br><br><I  ng-bind="data.billingType"></I></p><input ng-model="formParams.plan" name="planCode"  type="hidden" ng-bind="data.planCode" /></input></li>
 		</center>	
	</div>
	</div>	
			</ol> <input    ng-model="formParams.plancode" type="hidden" id="plancode" /><input    ng-model="formParams.plancharge" type="hidden" id="plancharge" /> <input    ng-model="formParams.plantype" type="hidden" id="plantypes" /> 
		 
    </div>
    </div>
 

            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 "  >
			<div class="row" style="margin-top: 20px;margin-left:30px;margin-right:30px;">
			<!-- Buttons Next & Previous -->
            <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
               <?php if ($loggedin) 			   
				   { $stageb='stagePin'  ;echo '
			<button type="button" class="btn btn-success btn-previous btn-md" ng-click="back('.$stageb.')"><i class="icnleft"></i>  Back</button>  
				   ';} else {$stageb='stageTypeCustomer' ; echo '
			<button type="button" class="btn btn-success btn-previous btn-md" ng-click="back('.$stageb.')"><i class="icnleft"></i>  Back</button>  
				   ';} 
				   ?>			

			</div>
            <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
				<button  style="float:right"  type="button" class="btn btn-primary btn btn-success btn-previous btn-md" disabled id="next2" ng-click="next('stagePhone')">Next  <i class="icnright"></i></button>
            </div>
			</div>
            </div>
          </div>
 	   
</div> <!-- End Stage plans -->
 
   
  
<!--   Stage 5  STAGE PHONE NUMBERS  ---------------------------------------------------------->

<div class="animate-switch" ng-switch-when="stagePhone">
  <div class="container-triangle"></div>
<!--<div class="contentcontain">-->
	<div   class="container center_div"  style="max-width: 850px!important;background-color: white;padding: 20px 20px 20px 20px;box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    border-radius: 0.4rem!important;" >
    <div class="form-group">
        <div class="col-sm-12">
        <div class="row">
        <div class="col-sm-4 form-group"><input ng-model="search.province" id="provinceText" type="hidden"></input>
        <select   ng-model="formParams.province2" class="form-control" id="sel1" ng-click="province();" ng-change="province();">
		<option value="" disabled="" selected="">Province</option>
        <option value="0">Alberta</option><option value="1">British Columbia</option>
		<option value="2">Manitoba</option><option value="3">New Brunswick</option>
		<option value="4">Nova Scotia</option><option value="5">Newfoundland</option>
		<option value="6">Northwest Territories</option><option value="7">Nunavut</option>
		<option value="8">On</option><option value="9">Prince Edward Island</option>
		<option value="10">Quebec</option><option value="11">Saskatchewan</option><option value="12">Yukon</option>
         </select>
        </div>
        <div class="col-sm-4 form-group"><input ng-model="search.city" id="cityText" type="hidden"></input>
        <select   ng-model="formParams.city2" class="form-control" id="sel2" ng-click="city()"  ng-change="city();">
            <option value="" disabled selected>City</option>
        </select>
        </div>
        <div class="col-sm-4 form-group"><input ng-model="search.areaCode" id="areaText" type="hidden"></input>
        <select ng-model="formParams.areaCode" class="form-control" id="sel3"  ng-click="area();"  ng-change="area();">
            <option  value="" disabled selected>Area code</option>
        </select> 
        </div>
        </div>
        </div>
    </div> 
   <div class="row" style="margin-top: 20px;">
        <div class=" scroller  " style="height: 300px; overflow-y: scroll; padding-top: 20px; border: 2px solid LightGray;border-radius: 1rem; width: 100%!important;">
            <div class="form-group " id="divnumbers" style="display:none" >
		       <ul style="list-style-type: none;margin-left: -20;" class="form">
				<div ng-repeat="data in NData  | filter : search "   >
  				 	<!--<div ng-if="$first && ($index<10)" ng-init="setFirst(data.telephoneNumber)" ><li><label  ng-click="setNum(data.telephoneNumber)" class="radio inline"><input class="radio-inline"  ng-attr-id="@{{data.telephoneNumber}}"  checked="checked"  type="radio" name="phonenum"   /><span for="@{{data.telephoneNumber}}" ng-bind="data.telephoneNumber"   class="labelradio control-label " ></label> </span></li></div>-->
					<div  ><li><label ng-click="setNum(data.telephoneNumber)" class="radio inline"><input class="radio-inline"  ng-attr-id="@{{data.telephoneNumber}}"    type="radio"   name="phonenum"  /><span for="@{{data.telephoneNumber}}" ng-bind="data.telephoneNumber"   class="labelradio control-label"> </span></label></li></div>
				</div>	
			   </ul>
		  
			<input  type="hidden" name="phonenumber" id="phonenumber"  />
            </div><!--  end form group -->
        </div>
    </div> <!--  end Row -->
	
 			<div class="row" style="margin-top: 20px;margin-left:30px;margin-right:30px;">

            <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
			<button type="button" class="btn btn-success btn-previous btn-md" ng-click="back('stagePlans')"><i class="icnleft"></i>  Back</button>  
			</div>
            <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
				<button style="float:right" type="button" class="btn btn-primary btn btn-success btn-previous btn-md" id="next4" disabled ng-click="initTax();next('stageBilling')">Next  <i class="icnright"></i></button>
            </div>
			</div>

<script  type="text/javascript" >
  $(document).ready(function(){ 
  var a = [
      {
      name: "Alberta",
      cities: [{
        name: "Calgary",
        acodes: [
          "403",
          "587",
          "825"
        ]
      },
      {
        name: "Lethbridge",
        acodes: [
          "403",
          "587",
          "825"
        ]
      },
      {
        name: "Medicine Hat",
        acodes: [
          "403",
          "587",
          "825"
        ]
      },
      {
        name: "Red Deer",
        acodes: [
          "403",
          "587",
          "825"
        ]
      },
      {
        name: "Edmonton",
        acodes: [
          "780",
          "587",
          "825"
        ]
      },
      {
        name: "St. Albert",
        acodes: [
          "780",
          "587",
          "825"
        ]
      }
      ]
    },
    {
      name: "British Columbia",
      cities: [{
        name: "Kamloops",
        acodes: [
          "250",
          "778",
          "236"
        ]
      },
      {
        name: "Kelowna",
        acodes: [
          "250",
          "778",
          "236"
        ]
      },
      {
        name: "Nanaimo",
        acodes: [
          "250",
          "778",
          "236"
        ]
      },
      {
        name: "Prince George",
        acodes: [
          "250",
          "778",
          "236"
        ]
      },
      {
        name: "Victoria",
        acodes: [
          "250",
          "778",
          "236"
        ]
      },
      {
        name: "Abbotsford",
        acodes: [
          "604",
          "778",
          "236"
        ]
      },
      {
        name: "Burnaby",
        acodes: [
          "604",
          "778",
          "236"
        ]
      },
      {
        name: "Chilliwack",
        acodes: [
          "604",
          "778",
          "236"
        ]
      },
      {
        name: "Coquitlam",
        acodes: [
          "604",
          "778",
          "236"
        ]
      },
      {
        name: "New Westminster",
        acodes: [
          "604",
          "778",
          "236"
        ]
      },
      {
        name: "Port Coquitlam",
        acodes: [
          "604",
          "778",
          "236"
        ]
      },
      {
        name: "Richmond",
        acodes: [
          "604",
          "778",
          "236"
        ]
      },
      {
        name: "Surrey",
        acodes: [
          "604",
          "778",
          "236"
        ]
      },
      {
        name: "Vancouver",
        acodes: [
          "604",
          "778",
          "236"
        ]
      }
      ]
    },
    {
      name: "Manitoba",
      cities: [{
        name: "Winnipeg",
        acodes: [
          "204",
          "431"
        ]
      }
      ]
    },
    {
      name: "New Brunswick",
      cities: [{
        name: "Fredericton",
        acodes: [
          "506"
        ]
      },
      {
        name: "Moncton",
        acodes: [
          "506"
        ]
      },
      {
        name: "Saint John",
        acodes: [
          "506"
        ]
      }
      ]
    },
    {
      name: "Nova Scotia",
      cities: [{
        name: "Halifax",
        acodes: [
          "902",
          "782"
        ]
      },
      {
        name: "Sydney",
        acodes: [
          "902",
          "782"
        ]
      }
      ]
    },	
    {
      name: "Newfoundland",
      cities: [{
        name: "St. John's",
        acodes: [
          "709"
        ]
      }
      ]
    },	
    {
      name: "Northwest Territories",
      cities: [{
        name: "Yellowknife",
        acodes: [
          "867"
        ]
      }
      ]
    },
    {
      name: "Nunavut",
      cities: [{
        name: "Iqaluit",
        acodes: [
          "867"
        ]
      }
      ]
    },
    {
      name: "On",
      cities: [{
        name: "Toronto",
        acodes: [
          "416",
          "647",
          "437"
        ]
      },
      {
        name: "Brantford",
        acodes: [
          "519",
          "226",
          "548"
        ]
      },
      {
        name: "Cambridge",
        acodes: [
          "519",
          "226",
          "548"
        ]
      },
      {
        name: "Chatham",
        acodes: [
          "519",
          "226",
          "548"
        ]
      },
      {
        name: "Guelph",
        acodes: [
          "519",
          "226",
          "548"
        ]
      },
      {
        name: "Kitchener",
        acodes: [
          "519",
          "226",
          "548"
        ]
      },
      {
        name: "London",
        acodes: [
          "519",
          "226",
          "548"
        ]
      },
      {
        name: "Sarnia",
        acodes: [
          "519",
          "226",
          "548"
        ]
      },
      {
        name: "Windsor",
        acodes: [
          "519",
          "226",
          "548"
        ]
      },
      {
        name: "Kingston",
        acodes: [
          "613",
          "343"
        ]
      },
      {
        name: "Ottawa",
        acodes: [
          "613",
          "343"
        ]
      },
      {
        name: "Barrie",
        acodes: [
          "705",
          "249"
        ]
      },
      {
        name: "North Bay",
        acodes: [
          "705",
          "249"
        ]
      },
      {
        name: "Peterborough",
        acodes: [
          "705",
          "249"
        ]
      },
      {
        name: "Sault Ste. Marie",
        acodes: [
          "705",
          "249"
        ]
      },
      {
        name: "Sudbury",
        acodes: [
          "705",
          "249"
        ]
      },
      {
        name: "Thunder Bay",
        acodes: [
          "807"
        ]
      },
      {
        name: "Brampton",
        acodes: [
          "905",
          "289",
          "365"
        ]
      },
      {
        name: "Burlington",
        acodes: [
          "905",
          "289",
          "365"
        ]
      },
      {
        name: "Hamilton",
        acodes: [
          "905",
          "289",
          "365"
        ]
      },
      {
        name: "Mississauga",
        acodes: [
          "905",
          "289",
          "365"
        ]
      },
      {
        name: "Niagara Falls",
        acodes: [
          "905",
          "289",
          "365"
        ]
      },
      {
        name: "Pickering",
        acodes: [
          "905",
          "289",
          "365"
        ]
      },
      {
        name: "St. Catharines",
        acodes: [
          "905",
          "289",
          "365"
        ]
      },
      {
        name: "Vaughan",
        acodes: [
          "905",
          "289",
          "365"
        ]
      },
      {
        name: "Welland",
        acodes: [
          "905",
          "289",
          "365"
        ]
      },
      ]
    },
    {
      name: "Prince Edward Island",
      cities: [{
        name: "Charlottetown",
        acodes: [
          "902",
          "782"
        ]
      },
      {
        name: "Summerside",
        acodes: [
          "902",
          "782"
        ]
      }
      ]
    },	
    {
      name: "Quebec",
      cities: [{
        name: "Levis",
        acodes: [
          "418",
          "581"
        ]
      },
      {
        name: "Quebec City",
        acodes: [
          "418",
          "581"
        ]
      },
      {
        name: "Brossard",
        acodes: [
          "450",
          "579"
        ]
      },
      {
        name: "Laval",
        acodes: [
          "450",
          "579"
        ]
      },
      {
        name: "Repentigny",
        acodes: [
          "450",
          "579"
        ]
      },
      {
        name: "Saint-Hyacinthe",
        acodes: [
          "450",
          "579"
        ]
      },
      {
        name: "Saint-Jean-sur-Richelieu",
        acodes: [
          "450",
          "579"
        ]
      },
      {
        name: "Saint-Jerome",
        acodes: [
          "450",
          "579"
        ]
      },
      {
        name: "Terrebonne",
        acodes: [
          "450",
          "579"
        ]
      },
      {
        name: "Montreal",
        acodes: [
          "514",
          "438"
        ]
      },
      {
        name: "Drummondville",
        acodes: [
          "819",
          "873"
        ]
      },
      {
        name: "Gatineau",
        acodes: [
          "819",
          "873"
        ]
      },
      {
        name: "Shawinigan",
        acodes: [
          "819",
          "873"
        ]
      },
      {
        name: "Sherbrooke",
        acodes: [
          "819",
          "873"
        ]
      },
      {
        name: "Trois-Rivieres",
        acodes: [
          "819",
          "873"
        ]
      }
      ]
    },
    {
      name: "Saskatchewan",
      cities: [{
        name: "Regina",
        acodes: [
          "306",
          "639"
        ]
      },
      {
        name: "Saskatoon",
        acodes: [
          "306",
          "639"
        ]
      }
      ]
    },
    {
      name: "Yukon",
      cities: [{
        name: "Whitehorse",
        acodes: [
          "867"
        ]
      },
      {
        name: "Dawson City",
        acodes: [
          "867"
        ]
      }
      ]
    }	
	
	
    ],
    defOption = '<option value="" disabled selected>Please select</option>';
  
  $('#sel2').add('#sel3').prop('disabled', true);
  
/*  for(var i = 0; i < a.length; i++) {
    $('#sel1').append('<option value="'+i+'">'+a[i].name+'</option>');
  }
  */
  $('#sel1').on('change', function(){
    $('#sel3').prop('disabled', true).html(defOption);
    $('#sel2').prop('disabled', false).html(defOption);
    
    for(var i = 0; i < a[$(this).val()].cities.length; i++) {
      $('#sel2').append('<option value="'+i+'">'+a[$(this).val()].cities[i].name+'</option>');
    }
  });
 
  $('#sel1').on('click', function(){
    $('#sel3').prop('disabled', true).html(defOption);
    $('#sel2').prop('disabled', false).html(defOption);
     if (document.getElementById('sel1').selectedIndex > 0)
	{
		for(var i = 0; i < a[$(this).val()].cities.length; i++) {
		$('#sel2').append('<option value="'+i+'">'+a[$(this).val()].cities[i].name+'</option>');
		}
	}
  });
  
  $('#sel2').on('change', function(){
    $('#sel3').prop('disabled', false).html(defOption);
  
    for(var i = 0; i < a[$('#sel1').val()].cities[$(this).val()].acodes.length; i++) {
      $('#sel3').append('<option value="'+i+'">'+a[$('#sel1').val()].cities[$(this).val()].acodes[i]+'</option>');
    }
  });
});
/* stage billing Help title tooltip 
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})*/
</script>
<!--</div>-->
 </div> 
</div>  <!-- End Stage Phone numbers  -->		
 
   
   
<!--   Stage Billing     ------------------------------------------------------- --> 
<div class="animate-switch" ng-switch-when="stageBilling">
<div class="container-triangle"></div>
<div class="contentcontain" style="height:800px"> 
<div class="container center_div">

    <fieldset class="scheduler-border" style="padding-top: 20px!important;">
        <legend class="scheduler-border" style="color: grey;">Total Due Today</legend>
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="row">
                <div class="col-sm-3 col-md-3 col-lg-3 ">
                    &nbsp;
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <span id="planname" style="font-size:18px;color:#31B404;  font-weight: bold;float: right;" ng-bind="formParams.plantypes" >  </span>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3 ">
                    <span style="font-size:17px;color:#31B404;font-weight:bold;"  id="planprice"  ng-bind="formParams.plancharge" >   </span><span style="font-size:17px;color:#31B404;font-weight:bold;"  > $</span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="row">
                <div class="col-sm-3 col-md-3 col-lg-3 ">
                    &nbsp;
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <span style="font-size:15px;color:grey;float:right"id="taxes"   >Taxes ( <label  style="font-wight:normal;" ng-bind="formParams.tax">  </label> %) </span> 
					 
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3 " style="font-size:15px;color:grey;" >
                    <span style="font-weight:bold;" id="taxesprice" ng-bind="formParams.taxVal"  >  </span><span style="font-size:15px;color:grey;"> $  </span>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="row">
                <div class="col-sm-3 col-md-3 col-lg-3 ">
                    &nbsp;
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <span id="total" style="font-weight: bold;float: right;font-size:17px;color:#31B404;" >Total</span>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3 " style="font-weight: bold;float: right;font-size:17px;color:#31B404;">
                    <span id="totalprice"  ng-bind="formParams.totalcharge"> </span> $
                </div>
            </div>
        </div>
        <hr />
        <div id="creditcard" style="margin-top: 20px;" >
        <div class="form-group">
            <input type="text"   class="form-control" id="cardholder" placeholder="Cardholder Name" required ng-pattern="/^[a-zA-Z ]*$/" ng-minlength="3" ng-maxlength="35"  ng-model="formParams.cardholder" name="cardholder"  /></input>        </div>
        <div class="form-group">
            <input type="number"  id="credit" name="creditCard" ng-model="formParams.creditCard"  required  data-credit-card-type   data-ng-pattern="/^[0-9]+$/"  data-ng-minlength="15"     maxlength="19" class="form-control" id="cardnumber" placeholder="Card Number" />
			<ul ng-show="!FormActivate.$valid">
      <li ng-show="FormActivate.creditCard.$error.pattern">Credit card must contain digits only</li>
      <li ng-show="FormActivate.creditCard.$error.minlength">Credit card must be 15-19 digits</li>
      <li ng-show="FormActivate.creditCard.$error.maxlength">Credit card must contain a maximum of 19 digits </li>
	  </ul>
        </div>
         <div class="row">
                            <div class="col-sm-3 form-group">
                                <input type="number" placeholder="Exp Mth" ng-model="formParams.emonth" class="form-control"  min="1" max="12" required  ng-model="month" name="emonth">
                            </div>  
                            <div class="col-sm-3 form-group">
                                <input type="number" placeholder="Exp Year" ng-model="formParams.eyear" class="form-control" min="2018" max="2050" required ng-model="year" name="eyear">
                            </div>  
                            <div class="col-sm-3 form-group">
                                 <input type="number" placeholder="CVV" class="form-control"    ng-model="formParams.cvv" name="cvv"    ng-model="securityCode"  required  data-ng-pattern="/^[0-9]+$/"  data-ng-minlength="3"  maxlength="4" >
                              <ul ng-show=" !FormActivate.$valid">
      <li ng-show="FormActivate.securityCode.$error.pattern">Security code must contain only numbers</li>
      <li ng-show="FormActivate.securityCode.$error.minlength">Security code must be 3-4 digits</li>

	  </ul></div>   
                            <div class="col-sm-1 form-group">
                                 <button type="button" class="btn btn-default" style="width: 30px; height: 30px; padding: 6px 0px; border-radius: 15px; text-align: center; font-size: 12px; 
                                 line-height: 1.42857;" data-toggle="tooltip" data-html="true" title="<em>Help</em> <u>Info</u> <b>TEXT</b>"><b>?</b></button> 
                            </div>  
                            <div class="col-sm-2 form-group">
                                 &nbsp;
                            </div>   
        </div>
        <div class="row" style="margin-left: 0px">
            <div class="checkbox" style="color: #464a4c;">
                <input type="hidden" name="transactionid" id="transactionid" ng-model="formParams.transactionid"/>
                <label><input id="atotopup" name="atotopup" ng-model="formParams.autopay" type="checkbox" value=""><span class="cr"><i class="cr-icon" style="font-size: 18px;left: 0px"><b>✓</b></i></span>  <b>Automatically Topup my account every 30 days</b></label>
            </div>
        </div>
		<div class="row" style="margin-top: 20px;">
			<!--<button ng-click="AutomaticPayment()">AutomaticPayment</button>-->
			</div>
        </div>
    </fieldset>

    <fieldset class="scheduler-border" >
        <legend class="scheduler-border" style="color: grey;">Terms of Service</legend>
        <div class="col-sm-12">
    <div class="row" style="margin-top: 20px;">
        <div class="scroller" style="height: 150px; overflow-y: scroll; padding-top: 20px; border: 2px solid LightGray;border-radius: 1rem; width: 100%!important;">
            <div class="form-group">
                <p style="padding-left: 20px;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis bibendum sapien. Nulla gravida id arcu et tristique. In non tempor ligula, volutpat euismod ligula. Nullam ultricies, leo ut dapibus pellentesque, arcu lorem posuere elit, id facilisis ligula diam quis orci. Maecenas facilisis condimentum enim eu pretium. Maecenas suscipit porta laoreet. Morbi sollicitudin interdum ligula, sed auctor eros porttitor ac. Vivamus pretium nisi massa, volutpat faucibus enim varius vitae. Nunc pulvinar mollis dolor et commodo. Mauris rutrum porta lectus at venenatis. Sed ullamcorper commodo odio, et suscipit diam consequat vitae.

                    Donec placerat consectetur massa, egestas pharetra lectus vulputate in. Maecenas imperdiet varius nisl, eget convallis libero mollis eu. Integer arcu velit, iaculis ut nibh vitae, faucibus gravida urna. Ut fermentum ex mattis blandit vestibulum. Phasellus interdum purus sit amet mauris tincidunt lacinia. Curabitur vel ultricies odio. Proin mattis massa quis lorem placerat congue vitae quis enim. Phasellus egestas, erat a porttitor semper, augue augue laoreet lorem, a posuere turpis ligula eget ipsum. Donec est nunc, tristique vitae felis id, sodales mattis elit.

                    Phasellus ut libero eros. Ut ultrices sem eu nulla interdum pellentesque. Nulla pulvinar est iaculis risus sodales euismod eget in felis. Maecenas ac urna purus. Quisque ac commodo nunc. Donec ultricies nisi neque, quis ultricies ipsum molestie eget. Proin scelerisque nisi a ligula facilisis, nec mattis lacus aliquet. Mauris eu aliquam risus. Fusce eget ante sagittis justo consectetur interdum. Suspendisse potenti.
                </p>
            </div>
        </div>
    </div>
    <div class="row" style="margin-left: -10px;margin-top: 20px;">
            <div class="checkbox" style="color: #464a4c;">
                <label><input required id="atotopup2" name="atotopup2" ng-model="atotopup2" type="checkbox" value=""><span class="cr"><i class="cr-icon" style="font-size: 18px;left: 0px"><b>✓</b></i></span>  <b>I accept the terms of services</b></label>
            </div>
        </div>
    </div>
    </fieldset>
 

	</div> 
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 ">
			<div class="row" style="margin-top: 20px;margin-left:30px;margin-right:30px;">
 			<div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
			<button type="button" class="btn btn-success btn-previous btn-md" ng-click="back('stagePhone')"><i class="icnleft"></i>  Back</button>  
			</div>
            <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
				<button style="float:right" type="button" style="float:right" class="btn btn-primary btn btn-success btn-previous btn-md" id="next5" ng-disabled="FormActivate.$pristine || FormActivate.$invalid"  ng-click="PaymentProcess()">Finish  </i></button>
            </div>
			</div>
            </div>
          </div>
</div><!--   End Stage  -->	
 
</div><!--   End container  -->		
		 
  
      </div>
    </form>
<!-- FORMPARAMS display
Form : <p>@{{formParams}}</p>-->
  </div>
  <input type="hidden" name="uinfo" id="uinfo" />
</main>
       
 
 
<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular-animate.min.js'></script> 


 <script  src="public/js/index.js"></script>
 
<div class="modal"><!-- Place at bottom of page --></div>


</div>


</body>

</html>


