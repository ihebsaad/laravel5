'use strict';

angular.module('formApp', [
  'ngAnimate'
]).
controller('formCtrl', ['$scope', '$http', function($scope, $http) {
	
//$scope.DataPins ={} ;
    $http.get('https://enterpriseesolutions.com/pins.php').success(function (responsepins) {
             $scope.DataPins = responsepins ;
          });	
	
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
	   var newURL = window.location.protocol + "//" + window.location.host ;
if(newURL=="http://ype"){newURL=newURL+"/laravel5";}
	console.log('response show metaddata1'+response.nickname);     
   document.getElementById('logoutbtn').style.display="block";
   document.getElementById('userinfo0').innerHTML="Logged in as ";
 
  document.getElementById('userinfo').innerHTML=response.nickname+'</B>';
  document.getElementById('uinfo').value=response.nickname;
console.log('uinfo'+document.getElementById('uinfo').value);
console.log(''+newURL+'/public/session_writea2.php?usernameA='+response.nickname);
	jQuery('#div_session_write2').load(''+newURL+'/public/session_writea2.php?usernameA='+response.nickname);
});
}


/*********          Login            ********/
   
 $scope.login = function () {
  
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
    var newURL = window.location.protocol + "//" + window.location.host;
	if(window.location.host=="127.0.0.1")
	{newURL="http://127.0.0.1/laravel5/";}
  var  token=response.access_token;

   var  access_token="Bearer "+token;
   console.log(''+newURL+'/public/session_writea.php?access_tokenA='+token);
  	 jQuery('#div_session_write').load(''+newURL+'/public/session_writea.php?access_tokenA='+token);
 console.log('after load');	
	document.getElementById('tokeninput').value = token;
	//show user info
	 console.log('after save');
	if (document.getElementById('tokeninput').value == null){
	token= document.getElementById('div_session_write').innerHTML.substr(26);
	
	}
	else {token= document.getElementById('tokeninput').value;}
	 access_token="Bearer "+token;
		console.log(access_token);
	$scope.showuserinfo(access_token);
//$scope.next('stageLouckup');
//$scope.$apply();
 document.getElementById('logindiv').style.display="none";
 document.getElementById('admindiv').style.display="block";

 });
$.ajax(settings).fail(function (response) {
	$(".alert-danger").slideDown();
console.log('fail2');

});


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
  console.log(response);
  console.log('id= '+response.sub);
  $scope.showusermetadata(access_token,response.sub);

});
}
 
//$scope.formParams.idpin="";

$scope.enable = function (id){
 
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
	console.log('done enable  ' + response);
		//refresh pins list 
	  $http.get('https://enterpriseesolutions.com/pins.php').success(function (responsepins) {
             $scope.DataPins = responsepins ;
          });	
});

$.ajax(setting).fail(function (response) {
	console.log('fail enable  '+ response);
});
	 
 }	
 
 $scope.disable = function (id){
 
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

	//refresh pins list 
	 $http.get('https://enterpriseesolutions.com/pins.php').success(function (responsepins) {
             $scope.DataPins = responsepins ;
          });	
});

$.ajax(setting).fail(function (response) {
	console.log('fail disable '+ response);
});
	 
 }
	
}]);