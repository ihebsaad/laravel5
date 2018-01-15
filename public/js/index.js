'use strict';

angular.module('formApp', [
  'ngAnimate'
]).
controller('formCtrl', ['$scope', '$http', function($scope, $http) {
  $scope.formParams = {};
  $scope.stage = "";
  $scope.formValidation = false;
 
   // Navigation functions
  $scope.next = function (stage) {
  
  
    //////$scope.formValidation = true;
    
   ////// if ($scope.FormActivate.$valid) {
      $scope.direction = 1;
      $scope.stage = stage;
    /////  $scope.formValidation = false;
    /////}
  };
  
   $scope.showuserinfo = function(access_token) {

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
  //document.getElementById('ullogout').style="display:block;";
  document.getElementById('logoutbtn').style.display="block";
  document.getElementById('userinfo').innerHTML=response.nickname;

  
});
}
      $http.get('https://gqnchpomjprsrfglg-mock.stoplight-proxy.io/plans').success(function (response2) {
            $scope.myData = response2;
        });
		
		  $http.get('https://jsonplaceholder.typicode.com/users').success(function (response3) {
  //$http.get('https://jsonplaceholder.typicode.com/todos').success(function (response) {
            $scope.NData = response3;
		 		
        });
 
  /*********          Login            ********/
   
  $scope.login = function() {

  
 var email= document.getElementById('useremail').value;
var upassword= document.getElementById('userpassword').value;
	var datatosend='{\"grant_type\":\"password\",\"username\": \"'+email+'\",\"password\": \"'+upassword+'\",\"audience\": \"https://raniasaad.eu.auth0.com/api/v2/\", \"scope\": \"openid\", \"client_id\": \"JBL90aJJc4ZG7DxcIfITrYB-UrjbvY_u\", \"client_secret\": \"XugxD0AsEQpw5pwatO6kPjXouUPdBfuumztpf3p6LllTAR27JTzLvhhEcaEkQrla\"}';
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
    var newURL = window.location.protocol + "//" + window.location.host + window.location.pathname;
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
	$scope.showuserinfo(access_token);
	$scope.next('stagePlans'); 
	$scope.$apply();
	//////////
});
$.ajax(settings).fail(function (response) {
console.log('fail');
 $(".body1").css('display', 'none');
 $(".body2").css('display', 'block');

 $("body").css('background-color', '#337AB7');
});


}

  
 var $body = $("body");

$(document).on({
    ajaxStart: function() { console.log('start');$body.addClass("loading");    },
     ajaxStop: function() { $body.removeClass("loading"); }    
}); 
  

  $scope.back = function (stage) {
    $scope.direction = 0;
    $scope.stage = stage;
  };
  
    $scope.Next = "";
	 $scope.chekPass = function () {
		 return (document.getElementById('confirm_password').value == document.getElementById('password').value) ;
	 }
	 
	  $scope.SetElmVal = function (id,val) {
	   document.getElementById(id).value=val;
}

$scope.testing = function () {
	
	document.getElementById('useremail').value="existing";

}



  $scope.existingcust = function () {
 //function existingcust(){
document.getElementById('existcustomer').style.color='white';
document.getElementById('existcustomer').style.backgroundColor='rgb(92, 184, 92)';

document.getElementById('customer').value="existing"
 $scope.formParams.customer="existing";
  //var input = $('input');
    //input.trigger('input'); 
 ; 
    /* var e = document.getElementById("customer");
  var $e = angular.element(e);
  $e.triggerHandler('input');*/
document.getElementById('newcustomer').style.color='#454545';
document.getElementById('newcustomer').style.backgroundColor='rgb(246, 246, 246)';
document.getElementById('next1').disabled=false;

$scope.Next="stageLogin";
//$scope.stage="stageLogin";
// $scope.$apply();	
}

//function newcustomer(){
  $scope.newcustomer = function () {

document.getElementById('newcustomer').style.color='white';
document.getElementById('newcustomer').style.backgroundColor='rgb(92, 184, 92)';

document.getElementById('customer').value="new";
  //var input = $('input');
  //  input.trigger('input'); 
	
document.getElementById('existcustomer').style.color='#454545';
document.getElementById('existcustomer').style.backgroundColor='rgb(246, 246, 246)';
document.getElementById('next1').disabled=false;

 $scope.formParams.customer="new";

$scope.Next="stageAccount";
 /* var e = document.getElementById("customer");
  var $e = angular.element(e);
  $e.triggerHandler('input');*/
//$scope.stage="stageAccount";
}

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
  
  
  
 
 
  
  
  

//.controller('PlansController',function($scope,$http) {
 
    
        /*$scope.removeName = function (row) {
            $scope.myData.splice($scope.myData.indexOf(row), 1);
        }*/
		  $scope.setPlan = function (plan,plantype,charge) {
 			  document.getElementById('plancode').value=plan;
		 $scope.formParams.plancode=plan;

		  $('#plans ol li').css('color', '#454545');
		  $('#plans ol li').css('backgroundColor', 'rgb(246, 246, 246)');
		  
			   document.getElementById(plan).style.color='white';
			  // document.getElementById('@'+plan).style.color='white';
			   document.getElementById(plan).style.backgroundColor='rgb(92, 184, 92)';
			 //  document.getElementById('@'+plan).style.backgroundColor='rgb(92, 184, 92)';
			   document.getElementById('next2').disabled=false;
			    
 		 document.getElementById('plantypes').value=plantype;
		 $scope.formParams.plantypes=plantype;

		 document.getElementById('plancharge').value=charge;
		 $scope.formParams.plancharge=charge;
			
		  }/*
		  			    $scope.setData = function (plantype,charge) {

		 $scope.setData = function (plantype,charge) {
 		 document.getElementById('plantypes').value=plantype;
		 $scope.formParams.plantypes=plantype;

		 document.getElementById('plancharge').value=charge;
		 $scope.formParams.plancharge=charge;
 
		 
			
		  }*/

   // })
//.controller('NumbersController',function($scope,$http) {
 

		//  here trigger
 $scope.setNum = function (num) {
  document.getElementById('phonenumber').value=num;
  
  document.getElementById('next4').disabled=false;
  		 $scope.formParams.phonenumber=num;

   // var input2 = $('input');
	//		input2.trigger('input'); 
	  /*var e = document.getElementById("phonenumber");
  var $e = angular.element(e);
  $e.triggerHandler('input');*/
  }
  
   $scope.setFirst = function (num) {
  document.getElementById('phonenumber').value=num;
  
  document.getElementById('next4').disabled=false;
    		 $scope.formParams.phonenumber=num;

   /* var e = document.getElementById("phonenumber");
  var $e = angular.element(e);
  $e.triggerHandler('input');*/
   // var input2 = $('input');
	//input2.trigger('input'); 
  }
  
//});

}]);