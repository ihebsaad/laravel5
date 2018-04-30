'use strict';

angular.module('formApp', [
  'ngAnimate'
]).
controller('formCtrl', ['$scope', '$http', function($scope, $http) {
var newURL ='';
	if ( (window.location.host.indexOf("127.0.0.1") > -1 )|| ((window.location.host).indexOf("localhost")>-1)){
	var newURL ="http://127.0.0.1/simactivation/";  
	console.log('here1');
  }
else {	console.log('here2'); var newURL = window.location.protocol + "//" + window.location.host + window.location.pathname;}
	
	
	 $http.get('https://enterpriseesolutions.com/pins.php').success(function (responsepins) {
             $scope.DataPins = responsepins ;
          });
	
	if (document.getElementById('tokeninput').value == "")
	{ $scope.loggedin = false;}else {
		$scope.loggedin=true; 
}
//$scope.DataPins ={} ;
  	
	
 $scope.stage = "";
    // $scope.formParams = {};

   // Navigation functions
  $scope.next = function (stage) {
      $scope.direction = 1;
      $scope.stage = stage;
  };	 
	
  // Post to desired exposed web service.
  $scope.submitForm = function () {
    var wsUrl = "someURL";

    // Check form validity and submit data using $http
    if ($scope.FormActivate.$valid) {
      $scope.formValidation = false;

      $http({
        method: 'POST',
        url: wsUrl,
        data: JSON.stringify($scope.formParams)
      }).then(function successCallback(response) {
        if (response
          && response.data
          && response.data.status
          && response.data.status === 'success') {
          $scope.stage = "success";
        } else {
          if (response
            && response.data
            && response.data.status
            && response.data.status === 'error') {
            $scope.stage = "error";
          }
        }
      }, function errorCallback(response) {
        $scope.stage = "error";
        //console.log(response);
      });
    }
  }
  
  	 	$scope.checkPin = function () {
		$scope.ExistePin=false;
 		$scope.pin = document.getElementById('startsim0').value;
 
		for(var i = 0; i < ($scope.DataPins.length); i++) {
			// pin existe
				if ($scope.DataPins[i].pin == $scope.pin) {
				//console.log('pin exists');
				$scope.ExistePin=true;
				break;
				 }
			 
			
		} 
		return $scope.ExistePin;
}
	 

  
  
  
  $scope.resetpins = function() {
	  	
	 $http.get('https://enterpriseesolutions.com/pins.php').success(function (responsepins) {
             $scope.DataPins = responsepins ;
          });
  }
  $scope.reset = function() {
    // Clean up scope before destorying
    $scope.formParams = {};
    $scope.stage = "";
  }
 
	  $scope.loockup = function () {
 	 if ($scope.loggedin) {
		 $scope.check=$scope.checkPin();
	 if ($scope.check==false)
	 { 
 $("#pinnotfound").slideDown();
	}else{
  document.getElementById('pinarea').style.display="block";
    document.getElementById('searcharea').style.display="none";
	 }
 }else {alert('Please Login to do this action');}	

  };	
	  $scope.init = function () {
		  
    document.getElementById('pinnotfound').style.display="none";

  document.getElementById('searcharea').style.display="block";
  document.getElementById('pinarea').style.display="none";
  };	

  
	
$scope.showusermetadata = function(access_token,user_id) {
	     var settings2 = {
  "async": true,
  "crossDomain": true,
  "url": "https://iristelx.auth0.com/api/v2/users/"+user_id,
  "method": "GET",
  "headers": {
    "authorization": access_token
  },
  "data": "{}"
}

$.ajax(settings2).done(function (response) {
	//   var newURL = window.location.protocol + "//" + window.location.host ;
//if(newURL=="http://ype"){newURL=newURL+"/simactivation";}
	//console.log('response show metaddata1'+response.nickname);     
   document.getElementById('logoutbtn').style.display="block";
   document.getElementById('userinfo0').innerHTML="Logged in as ";
 
  document.getElementById('userinfo').innerHTML=response.nickname+'</B>';
  document.getElementById('uinfo').value=response.nickname;
//console.log('uinfo'+document.getElementById('uinfo').value);
//console.log(''+newURL+'/public/session_writea2.php?usernameA='+response.nickname);
	jQuery('#div_session_write2').load(''+newURL+'/public/session_writea2.php?usernameA='+response.nickname);
});
}


/*********          Login            ********/
   
 $scope.login = function () {
	 var done=false;
  
 var email= document.getElementById('useremail').value;
var upassword= document.getElementById('userpassword').value;
	var datatosend='{\"grant_type\":\"http://auth0.com/oauth/grant-type/password-realm\",\"username\": \"'+email+'\",\"password\": \"'+upassword+'\",\"audience\": \"https://iristelx.auth0.com/api/v2/\", \"realm\": \"Admin-Username-Password-Authentication\", \"client_id\": \"YoP9NqMrBM8vAN54ghQAHOh26x8vzY2g\", \"client_secret\": \"cpmLerk2uWdI2rA1hf9qMVpENpc-7kxf-4kVeM1HMeQq8JJpb54MNgsdUdVA9p19\",\"scope\":\"openid\"}';
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

  /*  var newURL = window.location.protocol + "//" + window.location.host;
	if(window.location.host=="127.0.0.1")
	{newURL="http://127.0.0.1/simactivation/";}*/
  var  token=response.access_token;

   var  access_token="Bearer "+token;
   //console.log(''+newURL+'/public/session_writea.php?access_tokenA='+token);
  	 jQuery('#div_session_write').load(''+newURL+'/public/session_writea.php?access_tokenA='+token);
 //console.log('after load');	
	document.getElementById('tokeninput').value = token;
	//show user info
	 //console.log('after save');
	if (document.getElementById('tokeninput').value == null){
	token= document.getElementById('div_session_write').innerHTML.substr(26);
	
	}
	else {token= document.getElementById('tokeninput').value;}
	 access_token="Bearer "+token;
		//console.log(access_token);
	$scope.showuserinfo(access_token);
//$scope.next('stageLouckup');
//$scope.$apply();
 document.getElementById('logindiv').style.display="none";
 document.getElementById('admindiv').style.display="block";
 
   $http.get('https://enterpriseesolutions.com/pins.php').success(function (responsepins) {
             $scope.DataPins = responsepins ;
          });
		  
  $("#admindiv").animate({height: "100px"});
   $("#admindiv").animate({height: "100px"});
   $("#admindiv").animate({height: "555px"});
   $("#admindiv").animate({height: "532"});
   
   $scope.loggedin=true;
 
   $scope.$apply();


 });
$.ajax(settings).fail(function (response) {
	$("#wrongLogin").slideDown();
//console.log('fail2');

});

if ( document.getElementById("nofileselected") != null ){document.getElementById("nofileselected").style.display="none";}
if ( document.getElementById("uploadfail") != null ){document.getElementById("uploadfail").style.display="none";}
if ( document.getElementById("uploadsuccess") != null ){document.getElementById("uploadsuccess").style.display="none";}
if ( document.getElementById("headers") != null ){document.getElementById("headers").style.display="none";}
if ( document.getElementById("delimeter") != null ){document.getElementById("delimeter").style.display="none";}
if ( document.getElementById("incorrectrange") != null ){ document.getElementById("incorrectrange").style.display="none";}
if ( document.getElementById("operationsuccessn") != null ){ document.getElementById("operationsuccessn").style.display="none";}
if ( document.getElementById("operationfail") != null ){ document.getElementById("operationfail").style.display="none";}
if ( document.getElementById("operationsuccess1") != null ){ document.getElementById("operationsuccess1").style.display="none";}
if ( document.getElementById("startrange") != null ){ document.getElementById("startrange").style.display="none";}
if ( document.getElementById("endrange") != null ){ document.getElementById("endrange").style.display="none";}
if ( document.getElementById("showdetails") != null ){document.getElementById("showdetails").style.display="none";}
if ( document.getElementById("wrongLogin") != null ){document.getElementById("wrongLogin").style.display="none";}
if ( document.getElementById("pinnotfound") != null ){document.getElementById("pinnotfound").style.display="none";}
if ( document.getElementById("pinenabled") != null ){document.getElementById("pinenabled").style.display="none";}
if ( document.getElementById("pindisabled") != null ){document.getElementById("pindisabled").style.display="none";}



} // end login



 $scope.showuserinfo = function (access_token) {

  var settings2 = {
  "async": true,
  "crossDomain": true,
  "url": "https://iristelx.auth0.com/userinfo",
  "method": "GET",
  "headers": {
    "authorization": access_token
  },
  "data": "{}"
}

$.ajax(settings2).done(function (response) {
  //console.log(response);
  //console.log('id= '+response.sub);
  $scope.showusermetadata(access_token,response.sub);

});
}
 
//$scope.formParams.idpin="";

$scope.enable = function (id){
 if ($scope.loggedin) {
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
$("#pinenabled").slideDown();
		//refresh PINs list 
	  $http.get('https://enterpriseesolutions.com/pins.php').success(function (responsepins) {
             $scope.DataPins = responsepins ;
          });	
});

$.ajax(setting).fail(function (response) {
	//console.log('fail enable  '+ response);
});
	
 }else {alert('Please Login to do this action');}	
 }	
 
 $scope.disable = function (id){
  if ($scope.loggedin) {

	 var setting = {
  "async": true,
  "crossDomain": true,
  "url": "http://test.enterpriseesolutions.com/admin/disable/"+id,
  "method": "GET",
  "headers": {
     'Access-Control-Allow-Origin': '*'
  },
  "processData": false 
 
  }
  
   
$.ajax(setting).done(function (response) {
	$("#pindisabled").slideDown();
	//refresh pins list 
	 $http.get('https://enterpriseesolutions.com/pins.php').success(function (responsepins) {
             $scope.DataPins = responsepins ;
          });	
});

$.ajax(setting).fail(function (response) {
	//console.log('fail disable '+ response);
});
	  }else {alert('Please Login to do this action');}	

 }
 
 
 /* var $body = $("body");

$(document).on({
    ajaxStart: function() { console.log('start');$body.addClass("loading");    },
     ajaxStop: function() { $body.removeClass("loading"); }    
}); 
*/
$scope.assignRange = function (){
	 if ($scope.loggedin) {

	  start=document.getElementById('startsim').value;
	  end=document.getElementById('endsim').value;
	    if (end < start){
		  alert('Incorrect range!');		  
	  }
   else{
	   var plans = [];
	   if (document.getElementById('radio1').checked){plans.push(document.getElementById('radio1').value);}
	   if (document.getElementById('radio2').checked){plans.push(document.getElementById('radio2').value);}
	   if (document.getElementById('radio3').checked){plans.push(document.getElementById('radio3').value);}
	
	 if (plans.length==0){  //console.log('delete');
	 	   	 	 var setting2 = {
  "async": true,
  "crossDomain": true,
  "url": "http://test.enterpriseesolutions.com/admin/deleterange/"+start+'/'+end,
  "method": "GET",
  "headers": {
     'Access-Control-Allow-Origin': '*'
  },
  "processData": false 
 
  }
  
   
$.ajax(setting2).done(function (response) {
	alert('done' + response);
});

$.ajax(setting2).fail(function (response) {
	alert('fail'+ response);
});
	 
	 
	 
	 }
	 else{
		 selectedplans=plans.toString();
		 //console.log('insert or update');
		 	 	 var setting = {
  "async": true,
  "crossDomain": true,
  "url": "http://test.enterpriseesolutions.com/admin/insertOrUpdate/"+start+'/'+end+'/'+selectedplans,
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

	 
	 //
   }
   	  }else {alert('Please Login to do this action');}	

   
   }// end function
  
}]);