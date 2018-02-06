<?php session_start(); ?>
 <?php
 \Log::info('Visit Iristel Administration Portal');
  if (isset ($_SESSION['access_tokenA']))
 {echo ' <input type="hidden" id="tokeninput" value="'.$_SESSION["access_tokenA"].'" />';}
 else{echo ' <input type="hidden" id="tokeninput" />';}
?>

<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>IRISTEL ADMIN</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="public/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="public/assets/css/form-elements.css">
        <link rel="stylesheet" href="public/assets/css/style.css">
        <!--<link rel="stylesheet" href="public/css/style.css">-->
		<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.min.js'></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular-animate.min.js'></script>
        <style type="text/css">
        </style>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
 
    </head>

<body  ng-app="formApp" ng-controller="formCtrl" ng-cloak >
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
 echo '
<ul class="nav navbar-nav navbar-right" id="logoutbtn" style="'.$style.'">
<li><div class="row"><style> .logout a:hover{background-color:#049afe!important;}</style>
<div class="col-sm-10"><br><B style="font-size:12px;margin-top:20px;  " ><span id="userinfo0" style="font-size:16px;">'.$value1.'</span><span style="font-size:16px;color:#049afe" id="userinfo">'.$value2.'</span></B> </div>
<div class="logout col-sm-2"><a style="background-color:#006fb9;margin-top:10px" href="#" class="btn btn-info " onclick="logout();"> <span   class="glyphicon glyphicon-log-out"></span> Log out</a></div></div></li>

</ul>';
?>
        </div>
  <form name="FormActivate" class="form-validation" role="form" novalidate>
    <!--  <div ng-switch on="stage" ng-class="{forward: direction, backward:!direction}">-->
	  	
        <!-- Top content -->
        <div class="top-content">
        	
            <div style="padding-top:30px">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 ">
                            <a href="#" class="navbar-brand" style=" padding-bottom: 0px; padding-top: 0px; ">
                                <svg xmlns="http://www.w3.org/2000/svg" id="logo" viewBox="0 0 73.5 21.3" class="logo-small">
                                                    <style>.st-blue{fill:#fff}.st1{fill:#fff}</style>
                                                    <path d="M40.2.1c0-.1-.2-.1-.3-.1l-1.8.9c-4 1.9-13.7 6.3-17 6.4h-.2c-3.3 0-12-4.2-15.9-6.2C4.3.7 3.6.4 3 0h-.3c-.1.1-.1.2-.1.3l.1.1c.2.1.3.2.5.2.5.4 1.1.7 1.8 1.1 14.2 7.4 16 8.1 16.4 8.1h.1c.9-.6 12.2-6.1 16.8-8.3 1.1-.5 1.8-.8 1.9-.9.1-.2.1-.3 0-.5z" class="st-blue"></path>
                                                    <path d="M16.5 16.2c.5-.5.7-1.1.7-1.9 0-1-.4-1.8-1.1-2.2-.8-.5-1.9-.7-3.6-.7H5.7v9.9h2.8v-3.9h3.2l3 3.9h3.1l-3.3-4.1c.9-.2 1.5-.5 2-1zm-2.6-.9c-.4.2-1.1.3-2 .3H8.5v-2.5h3.4c1 0 1.6.1 2 .3.3.2.5.5.5 1 0 .4-.2.8-.5.9zM0 11.4h3v9.9H0zm19.5 0h3v9.9h-3zm18.3 1.7H42v8.2h2.9v-8.2h4.3v-1.7H37.8zm-1.7 3.1c-.7-.4-1.7-.6-3.2-.6h-3.7c-.6 0-1.1-.1-1.3-.3-.3-.2-.5-.5-.5-.8 0-.4.2-.8.5-1 .3-.2.9-.3 1.7-.3h6.9v-1.8h-7.3c-1.7 0-2.8.2-3.6.7-.7.5-1.1 1.3-1.1 2.3 0 1 .4 1.7 1.1 2.2.7.4 1.8.6 3.4.6h3.3c.7 0 1.3.1 1.5.3.3.2.5.5.5.9s-.2.7-.5.8c-.3.1-.9.3-1.7.3h-7v1.8h7.5c1.6 0 2.8-.2 3.5-.7.7-.5 1.1-1.3 1.1-2.2-.1-1.1-.4-1.8-1.1-2.2zm29.8 3.4v-8.2h-2.8v9.9h10.4v-1.7zm-14.6-6.9c-1 .8-1.5 2.1-1.5 3.9 0 .9.2 1.7.5 2.3.3.6.9 1.2 1.5 1.6.5.3 1.1.5 1.6.6.6.1 1.5.2 2.5.2h4.7v-1.8H56c-1.1 0-2-.1-2.4-.6-.5-.4-.7-1-.7-1.8h7.7v-1.8h-7.7c.1-.8.3-1.3.9-1.8.5-.4 1.3-.6 2.3-.6h4.6v-1.7H56c-2.1.2-3.7.6-4.7 1.5z" class="st1"></path>
                                                </svg>
                                
                              </a>
 
                        </div>
                    </div>

 <?php if ( !$loggedin ) { echo'
					<div class="row" style="max-height:400px!important"  id="logindiv">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3><strong>Admin</strong> Login </h3>
                            		<p>Enter your username and password to log on</p>
                        		</div>
 
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" id="useremail" name="form-username" placeholder="username" class="form-username form-control" >
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="form-password" placeholder="password" class="form-password form-control" id="userpassword">
			                        </div>
                                    <div class="row">
                                        <div class="col-sm-6 ">
                                            <a href="#">Password Reset</a>
                                        </div>
                                        <div class="col-sm-3 col-sm-offset-3">
			                                 <button type="submit" class="btn" ng-click="login();">Login</button>
                                        </div>
                                    </div>
			                    </form>
		                    </div>
                        </div>
					</div> ' 	;} ?>
 				
                 <div id="divadmin" class="row" style='<?php echo $style; ?>'>
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class=" ">
                        			<h3 style="color:white;"><center><strong>Administration</strong></center></h3>
                        		</div>
 
                            </div>
                            <div class="form-bottom" id="admins">
			                    <!-- Nav tabs 
                                    link: https://codepen.io/brylok/pen/zawdJ -->
                                <ul class="nav nav-tabs tabs" id="simpin_tabs">
                                    <!--top level tabs-->
                                  <li><a style="color:white!important" href="#sims" data-toggle="tab">SIMs</a></li>
                                  <li><a  style="color:white!important" href="#pins" data-toggle="tab">PINs</a></li>
                                </ul>

                                <!--top level tab content-->
                                <div class="tab-content">
                                    <!--all tab menu-->
                                    
                                    <!--sims tab menu-->
                                    <div id="sims" class="tab-pane">
                                        <ul class="nav nav-tabs" id="sims_tabs">
                                            <li><a href="#add_edit" data-toggle="tab">Add/Edit SIMs</a></li>
                                            <li><a href="#delete_sims" data-toggle="tab">Delete SIMs</a></li>
                                            <li><a href="#assign_plans" data-toggle="tab">Assign Plans</a></li>
                                        </ul>
                                    </div>
                                    
                                    <!--pins tab menu-->
                                    <div id="pins" class="tab-pane">
                                        <ul class="nav nav-tabs" id="pins_tabs">
                                            <li><a href="#lookup" data-toggle="tab">Lookup PIN</a></li>
                                            <!-- <li><a href="#enable_disable" data-toggle="tab">Enable / Disable PIN</a></li> -->
                                        </ul>
                                    </div>                 
                                 </div>                        
                                    <!--music tab content-->
                                    <div class="tab-content">
                                        <div id="add_edit" class="tab-pane fade in active">
                                            <div class="row" style="margin-top: 20px;">
                                                <div class="form-group col-xs-7">
                                                    <p>To add/edit SIMs, please upload a csv: </p>
                                                </div>
                                                <div class="form-group col-xs-5">
                                                    <a href="#">Download csv template</a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-xs-7">
                                                    <div class="input-group">
                                                      <input type="text" class="form-control fileuploader" style="height:40px!important;" readonly>
                                                        <div class="input-group-addon browse">
                                                          <input type="file">
                                                          Browse
                                                        </div>
                                                      </div>
                                                </div>
                                                <div class="form-group col-xs-4">
                                                    <button type="button" class="btn btn-primary "  style="height:40px!important;float: right!important;line-height:0px!important;" >Upload</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="delete_sims" class="tab-pane">
                                            <div class="row" style="margin-top: 20px;">
                                                <div class="form-group col-xs-12">
                                                    <p>To delete SIMs, please enter the range of SIMs you wish to delete:</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                    <input ng-model="formParams.startsim" type="number" name="startsim"  ng-pattern="/^[0-9]*$/" placeholder="Start SIM #" ng-minlength="1" id="startsim1" class="form-control">
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <input ng-model="formParams.endsim" type="number" name="endsim"  ng-pattern="/^[0-9]*$/" placeholder="End SIM #" ng-minlength="1" id="endsim" class="form-control">
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <button type="button" class="btn btn-primary "  style="height:35px!important;float: right!important;line-height:0px!important;" >Delete</button>
                                                </div>      
                                            </div>
                                        </div>
                                        <div id="assign_plans" class="tab-pane">
                                            <div class="row" style="margin-top: 20px;">
                                                <div class="form-group col-xs-12">
                                                    <p>To assign plans to SIMs, please enter the range of SIM Cards below and select the plans you wish to assign:</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                    <input ng-model="formParams.pstartsim" type="number" name="pstartsim"  ng-pattern="/^[0-9]*$/" placeholder="Start SIM #" ng-minlength="1" id="pstartsim" class="form-control">
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <input ng-model="formParams.pendsim" type="number" name="pendsim"  ng-pattern="/^[0-9]*$/" placeholder="End SIM #" ng-minlength="1" id="pendsim" class="form-control">
                                                </div> 

                                            </div>
                                            <div class="row">
                                                <div  class="col-sm-8 form-group">
                                                    <div class=" scroller  " style="height: 200px; overflow-y: scroll; padding-top: 20px; border: 2px solid LightGray;border-radius: 1rem; width: 100%!important;">
                                                        <ul class="radionc">
                                                            <li>
                                                                <input type='radio' value='1' name='radio' id='radio1'/>
                                                                <label for='radio1'>Talk, Text, Surf $49</label>
                                                            </li>
                                                            <li>
                                                                <input type='radio' value='2' name='radio'  id='radio2'/>
                                                                <label for='radio2'>Talk, Text, Surf $59</label>
                                                            </li>
                                                            <li>
                                                                <input type='radio' value='3' name='radio'  id='radio3'/>
                                                                <label for='radio3'>Talk, Text, Surf $69</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div> 
                                                <div class="col-sm-4 form-group">
                                                    <button type="button" class="btn btn-primary "  style="height:35px!important;float: right!important;line-height:0px!important;" >Assign</button>
                                                </div> 
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <!--sports tab content-->
                                    <div class="tab-content">
                                        <div id="lookup" class="tab-pane">
                                            <div class="row" style="margin-top: 20px;">
                                                <div class="form-group col-xs-12">
                                                    <p>Enter the PIN # you wish to retrieve below:</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <input ng-change="init()" ng-model="search.pin" type="number" name="startsim"  ng-pattern="/^[0-9]*$/" placeholder="PIN #" ng-minlength="1" id="startsim0" class="form-control">
                                                </div>   
                                                <div class="col-sm-4 form-group righ">
                                                    <button ng-click="loockup()" type="button" class="btn btn-primary "  style="height:35px!important;float: right!important;line-height:0px!important;" >Lookup</button>
                                                </div>      
                                            </div>
												<div id="searcharea" style="dispaly:block ">     
												<table id="searchObjResults" style="width:300px;">
												<tr><th style="color:black;width:150px">PIN</th><th style="color:black;width:150px">SIM</th></tr>
												<tr ng-repeat="data in DataPins |  filter : search | limitTo:5">
													<td style="font-weight:800" ng-bind="data.pin"> </td>
													<td style=";font-weight:800" ng-bind="data.sim"></td>
												</tr>
												</table> 
												</div> 
			
                                            <div id="pinarea"  class="pininfos" style="display:none;margin-top: 10px;padding:15px;background-color:white;color:rgb(0, 111, 185);background-color:white;font-weight:800;border:2px solid black; border-radius: 25px;min-height:250px">
                                               <div ng-repeat="data in DataPins | filter : search | limitTo:1">
											   <div class="row" >
                                                    <div class="col-sm-3 form-group">
                                                        <p style="color:rgb(165, 168, 171);">PIN #</p>
                                                    </div>
                                                    <div class="col-sm-5 form-group">
                                                        <p ng-bind="data.pin"></p>
                                                    </div>
                                                </div>
                                                <div class="row" >
                                                    <div class="col-sm-3 form-group">
                                                        <p  style="color:rgb(165, 168, 171);">SIM Card #</p>
                                                    </div>
                                                    <div class="col-sm-5 form-group">
                                                        <p ng-bind="data.sim"></p>
                                                    </div>
                                                </div>
                                                <div class="row" >
                                                    <div class="col-sm-3 form-group">
                                                        <p  style="color:rgb(165, 168, 171);">Status</p>
                                                    </div>
                                                    <div class="col-sm-5 form-group">
                                                        <p><span  ng-if="data.enabled == 1">Enabled</span> <span   ng-if="data.enabled == 0">Disabled</span></p>
                                                    </div>
                                                </div>
												  <div class="row">
												  <div  ng-if="data.enabled == 0">
												  <div class="col-sm-4 form-group"  >
														<span style="color:rgb(165, 168, 171);"> Change Status </span></div>	 
													<div class="col-sm-4 form-group"><button class="btn btn-primary " style="height:35px!important;float: right!important;line-height:0px!important;"ng-click="enable(data.id);" >Enable </button></div>

													</div>
													 <div  ng-if="data.enabled == 1">
												  <div class="col-sm-4 form-group" style="rgb(165, 168, 171);">
														<span style="color:rgb(165, 168, 171);"> Change Status </span> </div>	 
													<div class="col-sm-4 form-group"><button class="btn btn-primary " style="height:35px!important;float: right!important;line-height:0px!important;" ng-click="disable(data.id);" >Disable </button></div>

													</div>
												   </div>
												</div>
                                            </div>
                                        </div>
										
                                        <!--<div id="enable_disable" class="tab-pane">
                                            <div class="row" style="margin-top: 20px;">
                                                <div class="form-group col-xs-12">
                                                    <p>Enter the PIN # you wish to enable/disable below:</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                    <input ng-model="formParams.pinnum" type="number" name="pinnum"  ng-pattern="/^[0-9]*$/" placeholder="PIN #" ng-minlength="1" id="pinnum" class="form-control">
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <select class="form-control" id="endis">
                                                        <option value="enable">Enable</option>
                                                        <option value="disable">Disable</option>
                                                    </select>
                                                </div>  
                                                <div class="col-sm-2 form-group">
                                                    <button type="button" class="btn btn-primary "  style="height:35px!important;float: right!important;line-height:0px!important;" >GO</button>
                                                </div>      
                                            </div>
                                        </div>-->
                                    </div>


                                </div>
		                    </div>
                        </div>
 						
						
						
						
						
						
						
                    </div>
                </div>
            </div>
            
      <!--  </div>-->
		
    <script  src="public/js/admin.js"></script>

        <!-- Javascript -->
        <script src="public/assets/js/jquery-1.11.1.min.js"></script>
        <script src="public/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="public/assets/js/jquery.backstretch.min.js"></script>
        <script src="public/assets/js/scripts.js"></script>
        <script type="text/javascript">
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
 
		
             $('#simpin_tabs').on('click', 'a[data-toggle="tab"]', function(e) {
              e.preventDefault();

              var $link = $(this);

              if (!$link.parent().hasClass('active')) {

                //remove active class from other tab-panes
                $('.tab-content:not(.' + $link.attr('href').replace('#','') + ') .tab-pane').removeClass('active');

                // click first submenu tab for active section
                $('a[href="' + $link.attr('href') + '_all"][data-toggle="tab"]').click();

                // activate tab-pane for active section
                $('.tab-content.' + $link.attr('href').replace('#','') + ' .tab-pane:first').addClass('active');
              
                 // $('a[href="#add_edit"]').trigger('click');

				 $('a[data-toggle="tab"]:first').tab('show');

				  if ($link.attr('href')=='#sims')
			  { 
			 $link.css('background-color','#006fb9');
			$link.css('color','white!important');
			 $('a[href="#sims"]').css('color','white!important');

			 $('a[href="#pins"]').css('background-color','#a5a8ab');
			 $('a[href="#pins"]').css('color','black!important');

			   $('a[href="#add_edit"]').click();
			   $('a[href="#add_edit"]').trigger('click');
			$('#add_edit').addClass('active');

			  }
				 if ($link.attr('href')=='#pins')
			    {  
				 $link.css('background-color','#006fb9');
			$link.css('color','white!important');
			 $('a[href="#sims"]').css('background-color','#a5a8ab');
			 $('a[href="#sims"]').css('color','black!important');
			
			   $('a[href="#lookup"]').click();
			    $('a[href="#lookup"]').trigger('click');
			$('#lookup').addClass('active');
  				}
			  }

            });

            /* input file */
            $(".browse input:file").change(function(){
               var file = $(this).val();
               var filename = file.split(/[\\\/]/).pop();
               $(".fileuploader").val(filename);
            });



            // open first tab
            $(document).ready(function() { 
                  $('a[href="#sims"]').trigger('click');
                  $('a[href="#add_edit"]').trigger('click');

             });
			
        </script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
	<!--</div>	<!--All stages-->	
</form>		
</main>
</body>
</html>