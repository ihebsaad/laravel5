'use strict';

angular.module('formApp', [
  'ngAnimate'
]).
controller('formCtrl', ['$scope', '$http', function($scope, $http) {
	
$scope.DataPins ={} ;
    $http.get('https://enterpriseesolutions.com/pins.php').success(function (responsepins) {
             $scope.DataPins = responsepins ;
          });	
	
	 
 $scope.stage = "";
  
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
        console.log(response);
      });
    }
  }
  $scope.reset = function() {
    // Clean up scope before destorying
    $scope.formParams = {};
    $scope.stage = "";
  }
 
	  $scope.loockup = function () {
  document.getElementById('pinarea').style.display="block";
    document.getElementById('searcharea').style.display="none";

  };	
	  $scope.init = function () {
  document.getElementById('searcharea').style.display="bloc!important";
  document.getElementById('pinarea').style.display="none";
  };	
	
//@Ran
    
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
	   var newURL = window.location.protocol + "//" + window.location.host + window.location.pathname;

	console.log('response show metaddata1'+response.nickname);   
	console.log('response show metaddata2'+response.user_metadata['firstName']);   
   document.getElementById('logoutbtn').style.display="block";
   document.getElementById('userinfo0').innerHTML="Logged in as ";
 
  document.getElementById('userinfo').innerHTML=response.user_metadata['firstName']+' '+response.user_metadata['lastName']+'</B>';
  document.getElementById('uinfo').value=response.user_metadata['firstName']+' '+response.user_metadata['lastName'];
console.log('uinfo'+document.getElementById('uinfo').value);
	jQuery('#div_session_write2').load(''+newURL+'public/session_write2.php?username='+response.user_metadata['firstName']+'/'+response.user_metadata['lastName']);


});
}
      $scope.showuserinfo = function(access_token) {

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
  console.log(response);
  console.log('id= '+response.sub);
  $scope.showusermetadata(access_token,response.sub);

});
}



 
  
    /*********          Login            ********/
   
  function login() {

  
 var email= document.getElementById('useremail').value;
var upassword= document.getElementById('userpassword').value;
	var datatosend='{\"grant_type\":\"http://auth0.com/oauth/grant-type/password-realm\",\"username\": \"'+email+'\",\"password\": \"'+upassword+'\",\"audience\": \"https://iristelx.auth0.com/api/v2/\", \"realm\": \"Admin-Username-Password-Authentication\", \"client_id\": \"YoP9NqMrBM8vAN54ghQAHOh26x8vzY2g\", \"client_secret\": \"cpmLerk2uWdI2rA1hf9qMVpENpc-7kxf-4kVeM1HMeQq8JJpb54MNgsdUdVA9p19\"}';
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
    var newURL = window.location.protocol + "//" + window.location.host;
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
  //console.log(response[0].identities[0].connection);
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
	  
  }
  });
  $.ajax(settings1).fail(function (response) {console.log(response);});
});
 
}	  
  }
	
  /******** end Reset password ********/
 var $body = $("body");

$(document).on({
    ajaxStart: function() { console.log('start');$body.addClass("loading");    },
     ajaxStop: function() { $body.removeClass("loading"); }    
}); 

/********** GetUser **********/
$scope.GetUser = function () {
	var email=$scope.formParams.email;
	var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://gqnchpomjprsrfglg-mock.stoplight-proxy.io/accounts?query="+email,
  "method": "GET",
  "headers": {
    "authorization": "Bearer {token}.{secret}"
  },
  "data": "{}"
}

$.ajax(settings).done(function (response) {
  console.log('done get user '+response);
  $scope.CreateService(response.accountId);
});
$.ajax(settings).fail(function (response) {
  console.log('fail get user '+response);
  var parsedData = JSON.parse(response.responseText);
		console.log('parsedData2'+parsedData.description);

});

}
/********** End GetUser **********/
 
	
	
	
	
	
}]);