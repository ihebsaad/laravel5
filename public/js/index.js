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
	console.log('response show metaddata'+response.nickname);   
	console.log('response show metaddata'+response.user_metadata['firstName']);   
   document.getElementById('logoutbtn').style.display="block";
  document.getElementById('userinfo').innerHTML='Logged in as '+response.user_metadata['firstName']+' '+response.user_metadata['lastName'];
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
$scope.DataPins ={} ;
    $http.get('https://enterpriseesolutions.com/pins.php').success(function (responsepins) {
             $scope.DataPins = responsepins ;
          });


   /*   $scope.existe=false;
    $scope.checkPin = function () {
        var pin = document.getElementById('pin').value;
          $('#pin').css('border', '1px solid #FA5858');

        for(var i = 0; i < $scope.DataPins.length; i++) {
            if ($scope.DataPins[i].pin == pin) {
            $scope.existe = true;
             $('#pin').css('border', '1px solid #5cb85c');

            break;
            } else {$scope.existe = false;
                    $('#pin').css('border', '1px solid #FA5858');
                    }
        }
         return $scope.existe;
 
     } 
	 */
	  
	 	$scope.init = function () {
			if(document.getElementById('pin').value >999){ $('#pin').css('border', '1px solid #5cb85c');}
			//document.getElementById('pinmessage').innerHTML='';
		 $('#pinmessage').css('display', 'none');
		 $('#pinmessage2').css('display', 'none');
		}
			
	 	$scope.checkPin = function () {
		 $('#pinmessage').css('display', 'none');
		 $('#pinmessage2').css('display', 'none');
		var pin = document.getElementById('pin').value;
	 	 $('#pin').css('border', '1px solid #FA5858');

		for(var i = 0; i < $scope.DataPins.length; i++) {
			// pin existe
			if ($scope.DataPins[i].pin == pin) {
				 if ($scope.DataPins[i].enabled==0)
				 { // pin not active
					 $scope.existe = true;
					 $('#pin').css('border', '1px solid #5cb85c');
					//$('#pinmessage').css('display', 'none');
					//
					//document.getElementById('pinmessage').innerHTML='';
						$scope.next('stageTypeCustomer');
						$('#pinmessage').css('display', 'none');
						$('#pinmessage2').css('display', 'none');
						//$scope.$apply();
				  break;
				 }
				 
				 else{
					 // Pin already Activated
					// $('#pinmessage').css('display', 'block');
					  $('#pin').css('border', '1px solid #FA5858');		
					//document.getElementById('pinmessage').innerHTML='Pin Already Activated' 
					$("#pinmessage2").slideDown();
					;break
				 }
			
				} else {
				$scope.existe = false;
					$('#pin').css('border', '1px solid #FA5858');
					//document.getElementById('pinmessage').innerHTML='Incorrect Pin' ;
					$("#pinmessage").slideDown();
					}
		}
		 return $scope.existe;
 
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
	var datatosend='{\"grant_type\":\"password\",\"username\": \"'+email+'\",\"password\": \"'+upassword+'\",\"audience\": \"https://iristelx.auth0.com/api/v2/\", \"scope\": \"openid\", \"client_id\": \"PBbe88ULTLh0kycpE0Db7g4AWjO21hYG\", \"client_secret\": \"b0As5Ty-RwfckGI6-08qNcmbJu3wP1qTE-QA9Kp7ER4PyZHPiSLVvf4auhHiXp1w\"}';
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
	$(".alert-danger").slideDown();
console.log('fail2');

});


}

 /******** end login ********/
 var $body = $("body");

$(document).on({
    ajaxStart: function() { console.log('start');$body.addClass("loading");    },
     ajaxStop: function() { $body.removeClass("loading"); }    
}); 
/***************** Add Automatic Payment  ******************/
 $scope.AutomaticPayment = function(serviceId) {
	 
	 var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://gqnchpomjprsrfglg-mock.stoplight-proxy.io/"+serviceId+"/automatic-payment",
  "method": "PATCH",
  "headers": {
    "authorization": "Bearer {token}.{secret}"
  },
  "data": "{\"enabled\":true,\"paymentSource\":\"CREDITCARD\",\"onDeclineSuspend\":false,\"onDaysAvailable\":{\"enabled\":true,\"trigger\":1,\"amount\":25.75},\"onDayOfMonth\":{\"enabled\":false,\"trigger\":15,\"amount\":25.55},\"onBalanceBelow\":{\"enabled\":false,\"trigger\":1,\"amount\":25.25},\"creditCard\":{\"cardType\":\"VISA\",\"number\":\"5555666677779999\",\"holder\":\"Mr John Doe\",\"expMonth\":\"09\",\"expYear\":\"2021\",\"CVV\":\"599\"}}"
}

$.ajax(settings).done(function (response) {
  console.log('done AutomaticPayment '+response);
});
$.ajax(settings).fail(function (response) {
  console.log('fail AutomaticPayment '+response);
});
 }
 /***************** End Automatic Payment  ******************/
/***************** Add Payment  ******************/
 $scope.AddPayment = function(serviceId) {
	 
	 var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://gqnchpomjprsrfglg-mock.stoplight-proxy.io/"+serviceId+"/payments",
  "method": "POST",
  "headers": {
    "authorization": "Bearer {token}.{secret}",
    "content-type": "application/json"
  },
  "processData": false,
  "data": "{\"amount\":55.25,\"currency\":\"CAD\",\"paymentMethod\":\"CASH\",\"reference\":\"A3454384949\"}"
}

$.ajax(settings).done(function (response) {
  console.log('done AddPayment '+response);
});
$.ajax(settings).fail(function (response) {
  console.log('fail AddPayment'+response);
});
 }
 /***************** End Add Payment  ******************/
 
/***************** AddSIM ******************/
 
 $scope.AddSIM = function(accountId,serviceId) {
		 var pin= $scope.formParams.pin ; 
	 var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://gqnchpomjprsrfglg-mock.stoplight-proxy.io/accounts/"+accountId+"/services/"+serviceId+"/sim",
  "method": "PATCH",
  "headers": {
    "authorization": "Bearer {token}.{secret}"
  },
  "data": '{\"sim\":\"'+pin+'\"}'
}

$.ajax(settings).done(function (response) {
  console.log('done add SIM '+response);
});
$.ajax(settings).fail(function (response) {
  console.log('fail add SIM'+response);
});
	 
 }
/***************** End AddSIM ******************/
/***************** AddTelephoneNumber ******************/
 
 $scope.AddTelephoneNumber = function(accountId,serviceId) {
	 var phonenumber= $scope.formParams.phonenumber ;
var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://gqnchpomjprsrfglg-mock.stoplight-proxy.io/accounts/"+accountId+"/services/"+serviceId+"/telephone-number",
  "method": "PATCH",
  "headers": {
   // "authorization": "Bearer {token}.{secret}"
  },
 "data": '{\"911\":{\"useServiceContact\":true},\"telephoneNumber\":\"'+phonenumber+'\"}'
}

$.ajax(settings).done(function (response) {
  console.log('done AddTelephoneNumber'+response);
    $scope.AddSIM(accountId,serviceId);
});
$.ajax(settings).fail(function (response) {
  console.log('fail AddTelephoneNumber'+response);
});


 }
 /***************** end AddTelephoneNumber ******************/
 
 /***************** CreateService ******************/
 
 $scope.CreateService = function(accountId) { 
 var fname= $scope.formParams.first ;
	 var lname= $scope.formParams.last ;
	 var address1=$scope.formParams.streetnum ;
	 var address2= $scope.formParams.streetname ;
	 var address3= $scope.formParams.unit ;
	 var city= $scope.formParams.city ;
	 var province= $scope.formParams.province ;
	 var country= $scope.formParams.box ;
	 var postalCode= $scope.formParams.postal ;
	 var emailAddress= $scope.formParams.email ;
	 var planCode= $scope.formParams.plancode ;
	 var recurringCharge= $scope.formParams.plancharge ;
  var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://gqnchpomjprsrfglg-mock.stoplight-proxy.io/accounts/"+accountId+"/services",
  "method": "POST",
  "headers": {
      },
  "data": '{\"provisioning\":{\"planCode\":\"'+planCode+'\"},\"billing\":{\"billParentAccount\":true,\"recurringCharge\":'+recurringCharge+'},\"contact\":{\"fname\":\"'+fname+'\",\"lname\":\"'+lname+'\",\"address1\":\"'+address1+'\",\"address2\":\"'+address2+'\",\"address3\":\"'+address3+'\",\"city\":\"'+city+'\",\"province\":\"'+province+'\",\"country\":\"'+country+'\",\"postalCode\":\"'+postalCode+'\",\"emailAddress\":\"'+emailAddress+'\"}}'

}

$.ajax(settings).done(function (response) {
  console.log('done create service'+response);
  console.log(' service ID '+response.serviceId);
  var serviceId=response.serviceId;
   $scope.AddTelephoneNumber(accountId,serviceId);
});
$.ajax(settings).fail(function (response) {
  console.log('fail create service'+response);
});
 
 }
/***************** end CreateService ******************/


/***************** CreateAccount ******************/
 $scope.CreateAccount = function() {
	 var fname= $scope.formParams.first ;
	 var lname= $scope.formParams.last ;
	 var address1=$scope.formParams.streetnum ;
	 var address2= $scope.formParams.streetname ;
	 var address3= $scope.formParams.unit ;
	 var city= $scope.formParams.city ;
	 var province= $scope.formParams.province ;
	 var country= $scope.formParams.box ;
	 var postalCode= $scope.formParams.postal ;
	 var emailAddress= $scope.formParams.email ;
	//var  datatosend= '{\"contact\":{\"fname\":\"'+fname+'\",\"lname\":\"'+lname+'\",\"address1\":\"'+address1+'\",\"address2\":\"'+address2+'\",\"address3\":\"'+address3+'\",\"city\":\"'+city+'\",\"province\":\"'+province+'\",\"country\":\"'+country+'\",\"postalCode\":\"'+postalCode+'\",\"emailAddress\":\"'+emailAddress+'\"}}';
//console.log('datatosend'+datatosend);
	var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://gqnchpomjprsrfglg-mock.stoplight-proxy.io/accounts",
  "method": "POST",
  "headers": {
  //  "authorization": "Bearer {token}.{secret}",
    "content-type": "application/json"
  },
  "processData": false,
  "data": '{\"contact\":{\"fname\":\"'+fname+'\",\"lname\":\"'+lname+'\",\"address1\":\"'+address1+'\",\"address2\":\"'+address2+'\",\"address3\":\"'+address3+'\",\"city\":\"'+city+'\",\"province\":\"'+province+'\",\"country\":\"'+country+'\",\"postalCode\":\"'+postalCode+'\",\"emailAddress\":\"'+emailAddress+'\"}}'
}


$.ajax(settings).done(function (response) {
  console.log('done'+response);
  console.log('id'+response.accountId);
  var accountId=response.accountId;
  $scope.CreateService(accountId);
}); 
$.ajax(settings).fail(function (response) {
  console.log('fail'+response);
}); 
	 
 }
/***************** End CreateAccount ******************/
/***************** SignUp ******************/
  
  $scope.signup = function() {
	  var upassword= document.getElementById('password').value;
 var email= document.getElementById('email').value;
 var fname= document.getElementById('firstname').value;
 var lname= document.getElementById('lastname').value;
 	var datatosend='{\"connection\":\"Username-Password-Authentication\",\"email\": \"'+email+'\",\"password\": \"'+upassword+'\",\"user_metadata\": { \"firstName\": \"'+fname+'\", \"lastName\": \"'+lname+'\" }}';
 console.log('data to send '+datatosend);
var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://iristelx.auth0.com/dbconnections/signup",
  "method": "POST",
  "headers": {
    "content-type": "application/json"
  },
  "processData": false,
  "data": datatosend
  }


$.ajax(settings).done(function (response) {
	console.log('done');
	console.log(response);
	$scope.loginsignup();
});
$.ajax(settings).fail(function (response) {console.log('fail');});

  }
/************* end sign up ***************/
  /*********          Login  after SignUp          ********/
   
  $scope.loginsignup = function() {

  var fname= document.getElementById('firstname').value;
 var lname= document.getElementById('lastname').value;

 var email= document.getElementById('email').value;
var upassword= document.getElementById('password').value;
	var datatosend='{\"grant_type\":\"password\",\"username\": \"'+email+'\",\"password\": \"'+upassword+'\",\"audience\": \"https://iristelx.auth0.com/api/v2/\", \"scope\": \"openid\", \"client_id\": \"PBbe88ULTLh0kycpE0Db7g4AWjO21hYG\", \"client_secret\": \"b0As5Ty-RwfckGI6-08qNcmbJu3wP1qTE-QA9Kp7ER4PyZHPiSLVvf4auhHiXp1w\"}';
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
  console.log('response login after signup'+response.user_id);
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
	
	//$scope.showuserinfo2(access_token);
	 document.getElementById('logoutbtn').style.display="block";
  document.getElementById('userinfo').innerHTML='Logged in as '+fname+' '+lname;
  	 jQuery('#div_session_write2').load(''+newURL+'public/session_write2.php?username='+fname+'/'+lname);

	$scope.next('stagePlans'); 
	$scope.$apply();
	//////////
});
$.ajax(settings).fail(function (response) {
	$(".alert-danger").slideDown();
console.log('fail2');


});


}
/********** end login after signup **********/
 

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
			
		  }
		  

   // })
//.controller('NumbersController',function($scope,$http) {
 

		//  here trigger
 $scope.setNum = function (num) {
  document.getElementById('phonenumber').value=num;
  
  document.getElementById('next4').disabled=false;
  		 $scope.formParams.phonenumber=num;

  
  
  }
  
   $scope.setFirst = function (num) {
  document.getElementById('phonenumber').value=num;
  
  document.getElementById('next4').disabled=false;
    		 $scope.formParams.phonenumber=num;


			 
  }
  
//});

}]);