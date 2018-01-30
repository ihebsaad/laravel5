<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">  
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
  <link rel="stylesheet" href="css/style.css">
   <script  src="../public/js/jquery-3.2.1.min.js" type="text/javascript"> </script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular-animate.min.js'></script>
</head>

<body>

  

<main ng-app="formApp" ng-controller="formCtrl" ng-cloak>
  <div class="container">
    <div class="row">
      <div class="col-md-12">&nbsp;</div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
       </div>
    </div>
    <form name="FormActivate" class="form-validation" role="form" novalidate>
      <div ng-switch on="stage" ng-class="{forward: direction, backward:!direction}">
	  	
		<!--   Stage 0     -->
        <div class="animate-switch" ng-switch-when="stage0">
         
		 
		    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 ">
			<div class="row" style="margin-top: 20px;">
			<!-- Buttons Next & Previous -->
			<div class="col-sm-9 col-md-9 col-xs-9 col-lg-9 form-group">
			<button type="button" class="btn btn-success btn-previous btn-md" ng-click="back('')"><i class="icnleft"></i>  Back</button>  
			</div>
            <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3 form-group">
				<button type="button" style="float:right" class="btn btn-primary btn btn-success btn-previous btn-md" id="stage1"  ng-click="next('stage1')">Next  <i class="icnright"></i></button>
            </div>
			</div>
            </div>
        </div> <!-- End Stage  -->
		
		<!--   Stage 1     -->
		<div class="animate-switch" ng-switch-when="stage1">
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
		<!--<ul>
<div ng-repeat="data in DataPins"   >
         <li ng-bind="data.pin">  </li>
         <li ng-bind="data.sim">  </li>
     </div></ul>-->	
			
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 ">
			<div class="row" style="margin-top: 20px;">
			<!-- Buttons Next & Previous -->
			<div class="col-sm-9 col-md-9 col-xs-9 col-lg-9 form-group">
			<button type="button" class="btn btn-success btn-previous btn-md" ng-click="back('stage1')"><i class="icnleft"></i>  Back</button>  
			</div>
            <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3 form-group">
				<button type="button" style="float:right" class="btn btn-primary btn btn-success btn-previous btn-md" id="stage2"  ng-click="next('stage2')">Next  <i class="icnright"></i></button>
            </div>
			</div>
            </div>
        </div> <!-- End Stage 1 -->

		<!--   Stage 2     -->
		<div class="animate-switch" ng-switch-when="stage2">
				<h1>Stage 2</h1>

   <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 ">
			<div class="row" style="margin-top: 20px;">
			<!-- Buttons Next & Previous -->
			<div class="col-sm-9 col-md-9 col-xs-9 col-lg-9 form-group">
			<button type="button" class="btn btn-success btn-previous btn-md" ng-click="back('stage2')"><i class="icnleft"></i>  Back</button>  
			</div>
            <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3 form-group">
				<button type="button" style="float:right" class="btn btn-primary btn btn-success btn-previous btn-md" ng-click="next('stage3')">Next  <i class="icnright"></i></button>
            </div>
			</div>
            </div>
        </div> <!-- End Stage  2-->
		
		<!--   Stage 3     -->
		<div class="animate-switch" ng-switch-when="stage3">
				<h1>Stage 3</h1>

   <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 ">
			<div class="row" style="margin-top: 20px;">
			<!-- Buttons Next & Previous -->
			<div class="col-sm-9 col-md-9 col-xs-9 col-lg-9 form-group">
			<button type="button" class="btn btn-success btn-previous btn-md" ng-click="back('stage2')"><i class="icnleft"></i>  Back</button>  
			</div>
            <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3 form-group">
				<button type="button" style="float:right" class="btn btn-primary btn btn-success btn-previous btn-md"  ng-click="next('stage4')">Next  <i class="icnright"></i></button>
            </div>
			</div>
            </div>
        </div> <!-- End Stage  3-->
 
		<!--   Stage 4     -->
		<div class="animate-switch" ng-switch-when="stage4">
		<h1>Stage 4</h1>

		<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 ">
			<div class="row" style="margin-top: 20px;">
			<!-- Buttons Next & Previous -->
			<div class="col-sm-9 col-md-9 col-xs-9 col-lg-9 form-group">
			<button type="button" class="btn btn-success btn-previous btn-md" ng-click="back('stage3')"><i class="icnleft"></i>  Back</button>  
			</div>
            <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3 form-group">
				<button type="button" style="float:right" class="btn btn-primary btn btn-success btn-previous btn-md" ng-click="" >Next  <i class="icnright"></i></button>
            </div>
			</div>
            </div>
        </div> <!-- End Stage  -->

 
		
      </div> <!-- End  ALL Stages  -->	
  
<!--   Stage 4  : STAGE LOGIN   ------------------------------------------------------------>
<div class="animate-switch"  ng-switch-default>
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
     
            <a style="font-size: 16px;"  ng-click="next('stageForgotPassword')" href="#">Forgot Password?</a>
        </div>      
 <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
            <button ng-model="test" type="button" ng-click="login();" class="btn btn-success btn-round" style="float: right;margin-right: 0px;" >Login</button>
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
            <button type="button" ng-click="resetpassword();" class="btn btn-success btn-round" id="sendpwd" style="float: right;margin-right: 0px;" >Send</button>
        </div>  
   </div>
</form>
</div>
 <div class="col-md-2 col-sm-2 col-xs-2 col-lg-2 ">
 </div>
  </div>
</div>	


</div> <!-- End Stage  -->

</div>
  </form>

	
  </div><!-- container -->
</main>

    <script  src="../public/js/admin.js"></script>



</body>

</html>
