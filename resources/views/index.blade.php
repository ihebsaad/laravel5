<?php session_start(); ?>
<?php 
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Authorization");
    header("Access-Control-Allow-Methods: GET,HEAD,PUT,PATCH,POST,DELETE");
?>

<<<<<<< HEAD
@section('content')
<?php 
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Authorization");
    header("Access-Control-Allow-Methods: GET,HEAD,PUT,PATCH,POST,DELETE");

    print_r(session()->all()) ;
 
 ?>
 @if (Auth::check())
                  <?php \Log::debug('logged  2'. Auth::user()->name ); ?>    
                    @endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
email<input id="email" type="email"></input>
password<input id="password" type="password"></input>
<button onclick="login();">Login</button>



<script>
function login(){
	var datatosend="{\"grant_type\":\"password\",\"username\": \"myaccount3\",\"password\": \"mypassword\",\"audience\": \"https://raniasaad.eu.auth0.com/api/v2/\", \"scope\": \"openid\", \"client_id\": \"JBL90aJJc4ZG7DxcIfITrYB-UrjbvY_u\", \"client_secret\": \"XugxD0AsEQpw5pwatO6kPjXouUPdBfuumztpf3p6LllTAR27JTzLvhhEcaEkQrla\"}";
	console.log(datatosend);
=======
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
  <link rel="stylesheet" href="css/style.css">
 	 <script  src="js/jquery-3.2.1.min.js" type="text/javascript"> </script>
  <title>SIM Activation</title>
    <link href="https://cdn.auth0.com/styleguide/4.8.10/index.min.css" rel="stylesheet" />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://cdn.auth0.com/js/auth0/9.0.1/auth0.min.js"></script>

</head>

<body>
  <style> input.ng-valid.ng-dirty  {border:1px solid #5cb85c;}  input.ng-invalid.ng-dirty {border:1px solid #FA5858;}   </style>
<main ng-app="formApp" ng-controller="formCtrl" ng-cloak>
  <div class="container">
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

  
    <div class="row">
      <div class="col-md-12">&nbsp;</div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
       </div>
    </div>
    <form name="FormActivate" class="form-validation" role="form" novalidate>
      <div ng-switch on="stage" ng-class="{forward: direction, backward:!direction}">
	  	
		
		<!--   Stage 4  : STAGE LOGIN   ------------------------------------------------------------>
		<div class="animate-switch" ng-switch-when="stageLogin">
             <div class="row">
			 <h2> Login page</h2>
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 ">
			<div class="row" style="margin-top: 20px;">

            <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
			<button type="button" class="btn btn-success btn-previous btn-md" ng-click="back(default)"><i class="icnleft"></i>  Back</button>  
			</div>
            <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
				<button style="float:right" type="button" class="btn btn-primary btn btn-success btn-previous btn-md" ng-click="next(default)">Next  <i class="icnright"></i></button>
            </div>
			</div>
            </div>
          </div>
        </div> <!-- End Stage  --> 



 		
		<!--   Stage 0   Pin Step  ------------------------------------------------------------>
        <div class="animate-switch" ng-switch-default >
             <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 ">
			
<div class="container center_div">

         <div class="row">
            <div class="form-group col-sm-8 col-md-8 col-lg-8 col-xs-8">
                <input  id="pin" name="pin" type="number" min="999"  ng-pattern="/^[0-9]*$/"  class="form-control form-rounded" placeholder="Your PIN" ng-maxlength="25" ng-model="formParams.pin" required ng-class="{'input-error': formValidation && FormActivate.pin.$error.required}" >
            </div>
            <div class="form-group col-sm-4 col-md-4 col-lg-4 col-xs-4">
                 <button type="button" ng-click="next('stageTypeCustomer')" ng-disabled="FormActivate.$pristine || FormActivate.$invalid" class="btn btn-success btn-round">Continue</button> 
                <button type="button" ng-click="next('stageBilling')" ng-disabled="FormActivate.$pristine || FormActivate.$invalid" class="btn btn-success btn-round">Billing</button> 
            </div>
        </div>
		<div class="row">
		  <div class="form-group col-sm-6">
		       <span style="padding-left:10%" ng-show="FormActivate.pin.$error.number">
                  Incorrect PIN format.
                </span>
                <span  style="padding-left:10%" ng-show="FormActivate.pin.$error.maxlength">
                  Max character length reached.
                </span>
		  </div>		
		</div>		
<img src="./findyourpin.jpg" id="myImg"  alt="Find Your PIN" style="width:500px;margin-left:-16px;"/>

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
        </div> <!-- End Stage  -->
		
		<!--   Stage Type Customer     ------------------------------------------------------------>
		<div class="animate-switch" ng-switch-when="stageTypeCustomer">
		 <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
             <div class="row">
			 			<!-- <p>PIN : <span ng-bind="0.pin"></span></p>-->
<div class="container center_div" >
         <div class="row" >
            <ol id="selectable">
                <li style="width:250px;float:left;"   ng-click="newcustomer();" id="newcustomer" class="ui-state-default"><h5>A New Customer</h5><p>I've never done business with Ice Wirless before</p></li>
                <li style="width:250px;float:left;"   ng-click="existingcust();" id="existcustomer" class="ui-state-default"><h5>An Existing Customer</h5><p>I have an account with Ice Wirless </p></li>
            </ol>   
			<input   ng-model="formParams.customer" id="customer" type="text"    required ng-pattern="/^[a-zA-Z ]*$/"  />
        </div>
</div>	

			 <!--<p>PIN : <span ng-bind="formParams.pin"></span></p>-->
			 
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 ">
			<div class="row" style="margin-top: 20px;">
			<!-- Buttons Next & Previous -->
			<div class="col-sm-9 col-md-9 col-xs-9 col-lg-9 form-group">
			<button type="button" class="btn btn-success btn-previous btn-md" ng-click="back('')"><i class="icnleft"></i>  Back</button>  
			</div>
            <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3 form-group">
				<button type="button" style="float:right" class="btn btn-primary btn btn-success btn-previous btn-md" id="next1" disabled ng-click="next(Next)">Next  <i class="icnright"></i></button>
            </div>
			</div>
            </div>
          </div>
        </div> <!-- End Stage  -->

<!--   Stage ACCOUNT CUSTOMER   stageAccount  ------------------------------------------------------------>

<div class="animate-switch" ng-switch-when="stageAccount">
  <div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 " >
<div class="container center_div well" style="padding-bottom:80px;padding-top:60px">


                <div class="col-sm-12" >
                        <div class="row">
                            <div class="col-sm-6 form-group"> <!---->
                                <input  ng-model="formParams.first" required ng-pattern="/^[a-zA-Z ]*$/" ng-minlength="3" ng-maxlength="25" type="text" placeholder="First Name" id="firstname" class="form-control">
                            </div>
                            <div class="col-sm-6 form-group">
                                <input ng-model="formParams.last" type="text" required ng-pattern="/^[a-zA-Z ]*$/" ng-minlength="3" ng-maxlength="25" placeholder="Last Name" class="form-control">
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <input ng-model="formParams.streetnum"  required type="number" ng-pattern="/^[0-9]*$/" placeholder="Street #" min="1" max="99999" class="form-control">                         
						  </div>      
                            <div class="col-sm-8 form-group">
                                <input ng-model="formParams.streetname" required ng-pattern="/^[a-zA-Z ]*$/" ng-minlength="3" ng-maxlength="35" type="text" placeholder="Street Name" class="form-control">
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <input ng-model="formParams.unit" type="number" required ng-pattern="/^[0-9]*$/" placeholder="Unit #" min="1" max="99999" class="form-control">
                            </div>  
                            <div class="col-sm-4 form-group">
                                <input ng-model="formParams.box" type="text" required ng-pattern="/^[a-zA-Z0-9 ]*$/" ng-minlength="1" ng-maxlength="10" placeholder="PO BOX" class="form-control">
                            </div>  
                            <div class="col-sm-4 form-group">
                                <input ng-model="formParams.postal" type="text" required ng-pattern="/^[a-zA-Z0-9 ]*$/" ng-minlength="1" ng-maxlength="10" placeholder="Postal Code" class="form-control">
                            </div>      
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <input ng-model="formParams.city" type="text" required ng-pattern="/^[a-zA-Z ]*$/" ng-minlength="2" ng-maxlength="25" placeholder="City" class="form-control">
                            </div>      
                            <div class="col-sm-6 form-group">
                                <input ng-model="formParams.province" type="text" required ng-pattern="/^[a-zA-Z ]*$/" ng-minlength="2" ng-maxlength="25" placeholder="Province" class="form-control">
                            </div>  
                        </div>
                            
                    <div class="form-group">
                        <input type="email" required ng-model="formParams.email" placeholder="Email Address" ng-pattern="/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/" class="form-control">
                    </div>  
                     <div class="row" style="margin-bottom: 20px;">
                         <div class="col-sm-6 form-group" style="margin-top: 20px!important;">
                             <input ng-model="formParams.password" ng-pattern="/^(?=.*\d)(?=.*[A-Z])/"   required id="password" type="password" ng-minlength="8" ng-maxlength="25" class="form-control ex-input" placeholder="Password" /></br>
                             <input ng-model="formParams.confirm"  required id="confirm_password" type="password"  data-match="FormActivate.password" class="form-control ex-input" placeholder="Re-Type Password" />
                             <span id='message' style="font-size: 12px;float:right;"></span>
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

		
			
			<div class="row" style="margin-top: 20px;">
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
</div> <!-- End Stage  -->	
		
<!--   Stage 3  : STAGE PLANS    ------------------------------------------------------------>
	
<div class="animate-switch" ng-switch-when="stagePlans">
 <div ng-controller="PlansController" id="plans"  >

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
			<div class="row" style="margin-top: 20px;">
			<!-- Buttons Next & Previous -->
            <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
			<button type="button" class="btn btn-success btn-previous btn-md" ng-click="back('stageAccount')"><i class="icnleft"></i>  Back</button>  
			</div>
            <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
				<button  style="float:right"  type="button" class="btn btn-primary btn btn-success btn-previous btn-md" disabled id="next2" ng-click="next('stagePhone')">Next  <i class="icnright"></i></button>
            </div>
			</div>
            </div>
      <!-- </div>-->
 </div> <!-- Controller Plans>-->
	   
</div> <!-- End Stage  -->
 
   
	<!--   Stage 5  STAGE PHONE NUMBERS  ---------------------------------------------------------->
	<div class="animate-switch" ng-switch-when="stagePhone">
     
	<div ng-controller="NumbersController" class="container center_div"  style="max-width: 850px!important;" >

    <div class="form-group">
        <div class="col-sm-12">
        <div class="row">
        <div class="col-sm-4 form-group">
        <select class="form-control" id="sel1">
            <option value="" disabled selected>Province</option>
        </select>
        </div>
        <div class="col-sm-4 form-group">
        <select class="form-control" id="sel2">
            <option value="" disabled selected>City</option>
        </select>
        </div>
        <div class="col-sm-4 form-group">
        <select class="form-control" id="sel3">
            <option value="" disabled selected>Area code</option>
        </select>
        </div>
        </div>
        </div>
    </div> 
 
    <div class="col-sm-12">
    <div class="row" style="margin-top: 20px;">
        <div class="scroller  " style="height: 300px; overflow-y: scroll; padding-top: 20px; border: 2px solid LightGray;border-radius: 1rem; width: 100%!important;">
            <div class="form-group ">
            <ul style="list-style-type: none;margin-left: -20;" class="form">
					<div ng-repeat="data in NData"   >
 					<div ng-if="$first && ($index<10)" ng-init="setFirst(data.phone)" ><li><label  ng-click="setNum(data.phone)" class="radio inline"><input class="radio-inline"  ng-attr-id="@{{data.phone}}"  checked="checked"  type="radio" name="phonenum"   /><span for="@{{data.phone}}" ng-bind="data.phone"   class="labelradio control-label " ></label> </span></li></div>
					<div ng-if="!$first && ($index<10)" ><li><label ng-click="setNum(data.phone)" class="radio inline"><input class="radio-inline"  ng-attr-id="@{{data.phone}}"    type="radio"   name="phonenum"  /><span for="@{{data.phone}}" ng-bind="data.phone"   class="labelradio control-label"> </span></label></li></div>

					
            </ul>
			<input  type="text" name="phonenumber" id="phonenumber" ng-model="formParams.phonenumber"/>
            </div>
        </div>
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
      name: "Ontario",
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
    }
    ],
    defOption = '<option value="" disabled selected>Please select</option>';
  
  $('#sel2').add('#sel3').prop('disabled', true);
  
  for(var i = 0; i < a.length; i++) {
    $('#sel1').append('<option value="'+i+'">'+a[i].name+'</option>');
  }
  
  $('#sel1').on('change', function(){
    $('#sel3').prop('disabled', true).html(defOption);
    $('#sel2').prop('disabled', false).html(defOption);
    
    for(var i = 0; i < a[$(this).val()].cities.length; i++) {
      $('#sel2').append('<option value="'+i+'">'+a[$(this).val()].cities[i].name+'</option>');
    }
  });
  
  $('#sel2').on('change', function(){
    $('#sel3').prop('disabled', false).html(defOption);
  
    for(var i = 0; i < a[$('#sel1').val()].cities[$(this).val()].acodes.length; i++) {
      $('#sel3').append('<option value="'+i+'">'+a[$('#sel1').val()].cities[$(this).val()].acodes[i]+'</option>');
    }
  });
});

</script>
</div> 
	 
	 
			<div class="row" style="margin-top: 20px;">

            <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
			<button type="button" class="btn btn-success btn-previous btn-md" ng-click="back('')"><i class="icnleft"></i>  Back</button>  
			</div>
            <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
				<button style="float:right" type="button" class="btn btn-primary btn btn-success btn-previous btn-md" id="next4" disabled ng-click="next('stageBilling')">Next  <i class="icnright"></i></button>
            </div>
			</div>
            </div><!-- end controller  

	</div>  -- End Stage Phone numbers  -->		
 
  

  
  
<!--   Stage Billing     ----------------------------------------------------------->
<div class="animate-switch" ng-switch-when="stageBilling">
 

<div class="container center_div">

    <fieldset class="scheduler-border" style="padding-top: 20px!important;">
        <legend class="scheduler-border" style="color: grey;">Total Due Today</legend>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4">
                    &nbsp;
                </div>
                <div class="col-sm-6">
                    <span id="planname"   style="font-weight: bold;float: right;" ng-bind="formParams.plantypes" >  </span>
                </div>
                <div class="col-sm-2">
                    <span id="planprice"  ng-bind="formParams.plancharge" >   </span>$
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4">
                    &nbsp;
                </div>
                <div class="col-sm-6">
                    <span id="taxes" style="font-weight: bold;float: right;" >Taxes</span>
                </div>
                <div class="col-sm-2">
                    <span id="taxesprice" >10$</span>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4">
                    &nbsp;
                </div>
                <div class="col-sm-6">
                    <span id="total" style="font-weight: bold;float: right;" >Total</span>
                </div>
                <div class="col-sm-2">
                    <span id="totalprice" >79$</span>
                </div>
            </div>
        </div>
        <hr />
        <div id="creditcard" style="margin-top: 20px;" >
        <div class="form-group">
            <input type="text"   class="form-control" id="cardholder" placeholder="Cardholder Name" ng-pattern="/^[a-zA-Z ]*$/" ng-minlength="3" ng-maxlength="35"  ng-init="formParams.first" /></input>        </div>
        <div class="form-group">
            <input type="number"  id="credit" name="creditCard"  ng-model="formParams.creditCard"  required  data-credit-card-type   data-ng-pattern="/^[0-9]+$/"  data-ng-minlength="15"     maxlength="19" class="form-control" id="cardnumber" placeholder="Card Number" />
			    <ul ng-show="!FormActivate.$valid">
      <li ng-show="FormActivate.creditCard.$error.pattern">Credit card must contain digits only</li>
      <li ng-show="FormActivate.creditCard.$error.minlength">Credit card must be 15-19 digits</li>
      <li ng-show="FormActivate.creditCard.$error.maxlength">Credit card must contain a maximum of 19 digits </li>

	  
	  </ul>
        </div>
         <div class="row">
                            <div class="col-sm-3 form-group">
                                <input type="number" placeholder="Exp Mth" ng-model="formParams.month" class="form-control"  min="1" max="12"  ng-model="month" >
                            </div>  
                            <div class="col-sm-3 form-group">
                                <input type="number" placeholder="Exp Year" ng-model="formParams.year" class="form-control" min="2018" max="2050"  ng-model="year" >
                            </div>  
                            <div class="col-sm-3 form-group">
                                 <input type="number" placeholder="CVV" class="form-control"    ng-model="formParams.cvv" name="securityCode"    ng-model="securityCode"  required  data-ng-pattern="/^[0-9]+$/"  data-ng-minlength="3"  maxlength="4">
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
                <label><input id="atotopup" name="atotopup" ng-model="formParams.autopay" type="checkbox" value=""><span class="cr"><i class="cr-icon" style="font-size: 18px;left: 0px"><b>✓</b></i></span>  <b>Automatically Topup my account every 30 days</b></label>
            </div>
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
                <label><input required id="atotopup" name="atotopup" ng-model="atotopup" type="checkbox" value=""><span class="cr"><i class="cr-icon" style="font-size: 18px;left: 0px"><b>✓</b></i></span>  <b>I accept the terms of services</b></label>
            </div>
        </div>
    </div>
    </fieldset>
 

	</div>

 
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 ">
			<div class="row" style="margin-top: 20px;">
 			<div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
			<button type="button" class="btn btn-success btn-previous btn-md" ng-click="back('')"><i class="icnleft"></i>  Back</button>  
			</div>
            <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
				<button style="float:right" type="button" style="float:right" class="btn btn-primary btn btn-success btn-previous btn-md" id="next4" ng-disabled="FormActivate.$pristine || FormActivate.$invalid"  ng-click="next()">Finish  </i></button>
            </div>
			</div>
            </div>
</div><!--   End Stage  -->		
		

  
  
      </div>
    </form>

		  
  </div>
</main>
       

<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular-animate.min.js'></script> 


 <script  src="js/index.js"></script>
  <script type="text/javascript">
var token="";
function login(){
	
email= document.getElementById('email').value;
password= document.getElementById('password').value;
	var datatosend='{\"grant_type\":\"password\",\"username\": \"'+email+'\",\"password\": \"'+password+'\",\"audience\": \"https://raniasaad.eu.auth0.com/api/v2/\", \"scope\": \"openid\", \"client_id\": \"JBL90aJJc4ZG7DxcIfITrYB-UrjbvY_u\", \"client_secret\": \"XugxD0AsEQpw5pwatO6kPjXouUPdBfuumztpf3p6LllTAR27JTzLvhhEcaEkQrla\"}';
console.log('data to send '+datatosend);
>>>>>>> 7c1d4ab1400240b38e8e30eafe72b5d6123749f2
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
<<<<<<< HEAD
}


$.ajax(settings).done(function (response) {
  console.log(response);
});

}
</script>
 <?php
 

$curl = curl_init();

  curl_setopt_array($curl, array(
  CURLOPT_URL => "https://raniasaad.eu.auth0.com/authorize?response_type=code&client_id=JBL90aJJc4ZG7DxcIfITrYB-UrjbvY_u&connection=databaseserver&redirect_uri=http://127.0.0.1/simslaravel/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "{}",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6Ik4wWkRPVEZFT0RreE1qQTBOak00UmtaRU5UQXdRVVV6T1RRNU5FUkNOelU0UkRJME1VUTBNdyJ9.eyJpc3MiOiJodHRwczovL3Jhbmlhc2FhZC5ldS5hdXRoMC5jb20vIiwic3ViIjoiTjIydkxrdmtjcUZYajdqTWphaUpDbk1SUVhzcHFsaU1AY2xpZW50cyIsImF1ZCI6Imh0dHBzOi8vcmFuaWFzYWFkLmV1LmF1dGgwLmNvbS9hcGkvdjIvIiwiaWF0IjoxNTE1MTM4NzQ4LCJleHAiOjE1MTUyMjUxNDgsInNjb3BlIjoicmVhZDpjbGllbnRfZ3JhbnRzIGNyZWF0ZTpjbGllbnRfZ3JhbnRzIGRlbGV0ZTpjbGllbnRfZ3JhbnRzIHVwZGF0ZTpjbGllbnRfZ3JhbnRzIHJlYWQ6dXNlcnMgdXBkYXRlOnVzZXJzIGRlbGV0ZTp1c2VycyBjcmVhdGU6dXNlcnMgcmVhZDp1c2Vyc19hcHBfbWV0YWRhdGEgdXBkYXRlOnVzZXJzX2FwcF9tZXRhZGF0YSBkZWxldGU6dXNlcnNfYXBwX21ldGFkYXRhIGNyZWF0ZTp1c2Vyc19hcHBfbWV0YWRhdGEgY3JlYXRlOnVzZXJfdGlja2V0cyByZWFkOmNsaWVudHMgdXBkYXRlOmNsaWVudHMgZGVsZXRlOmNsaWVudHMgY3JlYXRlOmNsaWVudHMgcmVhZDpjbGllbnRfa2V5cyB1cGRhdGU6Y2xpZW50X2tleXMgZGVsZXRlOmNsaWVudF9rZXlzIGNyZWF0ZTpjbGllbnRfa2V5cyByZWFkOmNvbm5lY3Rpb25zIHVwZGF0ZTpjb25uZWN0aW9ucyBkZWxldGU6Y29ubmVjdGlvbnMgY3JlYXRlOmNvbm5lY3Rpb25zIHJlYWQ6cmVzb3VyY2Vfc2VydmVycyB1cGRhdGU6cmVzb3VyY2Vfc2VydmVycyBkZWxldGU6cmVzb3VyY2Vfc2VydmVycyBjcmVhdGU6cmVzb3VyY2Vfc2VydmVycyByZWFkOmRldmljZV9jcmVkZW50aWFscyB1cGRhdGU6ZGV2aWNlX2NyZWRlbnRpYWxzIGRlbGV0ZTpkZXZpY2VfY3JlZGVudGlhbHMgY3JlYXRlOmRldmljZV9jcmVkZW50aWFscyByZWFkOnJ1bGVzIHVwZGF0ZTpydWxlcyBkZWxldGU6cnVsZXMgY3JlYXRlOnJ1bGVzIHJlYWQ6cnVsZXNfY29uZmlncyB1cGRhdGU6cnVsZXNfY29uZmlncyBkZWxldGU6cnVsZXNfY29uZmlncyByZWFkOmVtYWlsX3Byb3ZpZGVyIHVwZGF0ZTplbWFpbF9wcm92aWRlciBkZWxldGU6ZW1haWxfcHJvdmlkZXIgY3JlYXRlOmVtYWlsX3Byb3ZpZGVyIGJsYWNrbGlzdDp0b2tlbnMgcmVhZDpzdGF0cyByZWFkOnRlbmFudF9zZXR0aW5ncyB1cGRhdGU6dGVuYW50X3NldHRpbmdzIHJlYWQ6bG9ncyByZWFkOnNoaWVsZHMgY3JlYXRlOnNoaWVsZHMgZGVsZXRlOnNoaWVsZHMgdXBkYXRlOnRyaWdnZXJzIHJlYWQ6dHJpZ2dlcnMgcmVhZDpncmFudHMgZGVsZXRlOmdyYW50cyByZWFkOmd1YXJkaWFuX2ZhY3RvcnMgdXBkYXRlOmd1YXJkaWFuX2ZhY3RvcnMgcmVhZDpndWFyZGlhbl9lbnJvbGxtZW50cyBkZWxldGU6Z3VhcmRpYW5fZW5yb2xsbWVudHMgY3JlYXRlOmd1YXJkaWFuX2Vucm9sbG1lbnRfdGlja2V0cyByZWFkOnVzZXJfaWRwX3Rva2VucyBjcmVhdGU6cGFzc3dvcmRzX2NoZWNraW5nX2pvYiBkZWxldGU6cGFzc3dvcmRzX2NoZWNraW5nX2pvYiByZWFkOmN1c3RvbV9kb21haW5zIGRlbGV0ZTpjdXN0b21fZG9tYWlucyBjcmVhdGU6Y3VzdG9tX2RvbWFpbnMgcmVhZDplbWFpbF90ZW1wbGF0ZXMgY3JlYXRlOmVtYWlsX3RlbXBsYXRlcyB1cGRhdGU6ZW1haWxfdGVtcGxhdGVzIiwiZ3R5IjoiY2xpZW50LWNyZWRlbnRpYWxzIn0.RhHY2wH1d9pMdX7RzSXIDKE6C1HUHAiLz32uxWRSEoe_1rcgLI8_T3Mj5-gutatsT3aMxEyKOwZ3nMzGIsn112pG-xziOC4Re1pTqRdsaLPALL1m5BFYxxX4AxLH2b2iCRCrxYHIjcJADraYkzkJ2_ZEF-b1atTc67kJReu9o03goZKVIodyIQfNtxY4FBWb-zZVWPpJxFxJW4wup-e3Jajq4jdQ031emJ0GXM6HWDQy1tIi-DsDCTzMEBpUHW4Tzdz6VBVu8fwkM8Nemfkb1kfAzr5_AN1jumT1q43XTsUZShQX0iQ1B5nZ88SN6xH6O9qxDNNG9jR8HGO_8B2kuw"

  ),
));


$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "     cURL Error authorize#:" . $err;
} else {
  echo '    response authorize   '.$response.'***';
}

$curl5 = curl_init();

curl_setopt_array($curl5, array(
  CURLOPT_URL => "https://raniasaad.eu.auth0.com/userinfo",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "{}",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6Ik4wWkRPVEZFT0RreE1qQTBOak00UmtaRU5UQXdRVVV6T1RRNU5FUkNOelU0UkRJME1VUTBNdyJ9.eyJpc3MiOiJodHRwczovL3Jhbmlhc2FhZC5ldS5hdXRoMC5jb20vIiwic3ViIjoiYXV0aDB8NWE1MzJkZTBjYjI2MzI1MmQ5YmJmNGY4IiwiYXVkIjpbImh0dHBzOi8vcmFuaWFzYWFkLmV1LmF1dGgwLmNvbS9hcGkvdjIvIiwiaHR0cHM6Ly9yYW5pYXNhYWQuZXUuYXV0aDAuY29tL3VzZXJpbmZvIl0sImlhdCI6MTUxNTQ5NDU1NiwiZXhwIjoxNTE1NTgwOTU2LCJhenAiOiJKQkw5MGFKSmM0Wkc3RHhjSWZJVHJZQi1VcmpidllfdSIsInNjb3BlIjoib3BlbmlkIGVtYWlsIHJlYWQ6Y3VycmVudF91c2VyIHVwZGF0ZTpjdXJyZW50X3VzZXJfbWV0YWRhdGEgZGVsZXRlOmN1cnJlbnRfdXNlcl9tZXRhZGF0YSBjcmVhdGU6Y3VycmVudF91c2VyX21ldGFkYXRhIGNyZWF0ZTpjdXJyZW50X3VzZXJfZGV2aWNlX2NyZWRlbnRpYWxzIGRlbGV0ZTpjdXJyZW50X3VzZXJfZGV2aWNlX2NyZWRlbnRpYWxzIHVwZGF0ZTpjdXJyZW50X3VzZXJfaWRlbnRpdGllcyIsImd0eSI6InBhc3N3b3JkIn0.B1qfcGyqVpcNwIwNp5bS66EstSNucDmRS8chtYtJmVWUZosU5eCKNyIYmx37QlnWPwpIvxaiIFtZfWbrei1D0Wl9cqH9Vr0-OibWmTWSuxH_uiVr1jyoQ83mERID4yO9_YjRYE4IZkASZJ66S2Kiet_U9HaV9U7Kup6YAc-3zdwLgN72TvW1tqSQPs1Bx4sok3x59R_V8uxdi7t8VxBbq3Cag6uzUU5P2ulQ25HiroQyXf6lSYryZyEr_aS2i8WLf4xSxTiSa8eCRVdVdg3VJKvHBRk1NJkvLkvs4uJK3pKbNLPp6bCfLn2reIcMmBIHMc-fi1kaWVHn203_yRUDTQ"
  ),
));

$response5 = curl_exec($curl5);
$err5 = curl_error($curl5);

curl_close($curl5);

if ($err5) {
  echo "   cURL Error userinfo#:" . $err5;
} else {
  echo '    response userinfo  '.$response5.'*************';
} 

/*$isLoggedIn = \Auth::check();
echo 'check='.$isLoggedIn;*/
 
?>

  <button onclick="logout();"> Logout</button>
<script src="https://cdn.auth0.com/js/auth0/9.0.1/auth0.min.js"></script>
<script type="text/javascript">

  function logout(){
	  // Script uses auth0.js. See Remarks for details.
  // Initialize client
  var webAuth = new auth0.WebAuth({
    domain:       'raniasaad.eu.auth0.com',
    clientID:     'JBL90aJJc4ZG7DxcIfITrYB-UrjbvY_u'
  });
  
  webAuth.logout({
    returnTo: 'http://127.0.0.1/laravel5/public/logout',
    client_id: 'JBL90aJJc4ZG7DxcIfITrYB-UrjbvY_u'
  });
=======
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
>>>>>>> 7c1d4ab1400240b38e8e30eafe72b5d6123749f2

	  
	  
  }
  </script>
 

<<<<<<< HEAD
  @stop
=======
>>>>>>> 7c1d4ab1400240b38e8e30eafe72b5d6123749f2
