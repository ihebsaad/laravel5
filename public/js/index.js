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
	   var newURL = window.location.protocol + "//" + window.location.host + window.location.pathname;

	console.log('response show metaddata1'+response.nickname);   
	console.log('response show metaddata2'+response.user_metadata['firstName']);   
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


$scope.initTax = function () {
		 $scope.formParams.tax=0;
		$scope.formParams.taxVal=0
        var province =  $scope.formParams.province2 ;
	if (province !="")
	{	
switch (parseInt(province)) {
    case 0:
        $scope.formParams.tax = 0.05;
        break;
    case 1:
        $scope.formParams.tax = 0.12;
        break;
    case 2:
        $scope.formParams.tax = 0.13;
        break;
    case 3:
        $scope.formParams.tax = 0.15;
        break;
    case 4:
        $scope.formParams.tax = 0.15;
        break;
    case 5:
        $scope.formParams.tax = 0.05;
        break;
    case 6:
        $scope.formParams.tax = 0.15;
		break;
    case 7:
        $scope.formParams.tax = 0.05;
        break;
    case 8:
        $scope.formParams.tax = 0.13;
        break;
    case 9:
        $scope.formParams.tax = 0.15;
        break;
    case 10:
        $scope.formParams.tax = 0.1498;
        break;
    case 11:
        $scope.formParams.tax = 0.11;
        break;
    case 12:
        $scope.formParams.tax = 0.05;
		} 
	
	$scope.formParams.taxVal= (parseFloat(parseFloat($scope.formParams.plancharge) * parseFloat($scope.formParams.tax)) ).toFixed(2);
	
	$scope.formParams.totalcharge= (parseFloat($scope.formParams.plancharge)  + parseFloat($scope.formParams.taxVal)).toFixed(2) ;
	
	} else{alert('error ! Please go back and select a Province');}
	
}
	  
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
		
		// $http.get('https://jsonplaceholder.typicode.com/users').success(function (response3) {
		  $http.get('https://gqnchpomjprsrfglg-mock.stoplight-proxy.io/telephone-numbers/reserved').success(function (response3) {
  //$http.get('https://jsonplaceholder.typicode.com/todos').success(function (response) {
            $scope.NData = response3.telephoneNumbers;
		 		
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
 
 

 
 /******** Reset password ********/
  $scope.resetpassword = function() {

	  document.getElementById("Ssent").style.display="none";
	  document.getElementById("Wmailrequired").style.display="none";
	 var email= $scope.formParams.email;
if(email==""){$(".alert-warning").slideDown();}
else{
	var datatosend='{\"client_id\": \"PBbe88ULTLh0kycpE0Db7g4AWjO21hYG\",\"email\": \"'+email+'\",\"connection\": \"Username-Password-Authentication\"}';


	console.log('data to send '+datatosend);
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
  console.log(response);
  $(".alert-success").slideDown();
});
	  
}	  
  }
  
 /******** end Reset password ********/
 var $body = $("body");

$(document).on({
    ajaxStart: function() { console.log('start');$body.addClass("loading");    },
     ajaxStop: function() { $body.removeClass("loading"); }    
}); 

/***************** ServiceAdditionEmail  ******************/
 $scope.ServiceAdditionEmail = function() {}
/***************** End ServiceAdditionEmail  ******************/ 
 
 
/***************** Add Automatic Payment  ******************/
 $scope.AutomaticPayment = function() {
 //$scope.AutomaticPayment = function(serviceId) {
	 var serviceId="d8e56f1e-c451-4b49-8068-b35ecefc3f4c";
	var cardholder=$scope.formParams.cardholder;
	var creditCard=$scope.formParams.creditCard;
	var emonth=$scope.formParams.emonth;
	var eyear=$scope.formParams.eyear;
	var cvv=$scope.formParams.cvv;
	var datatosend='{\"enabled\":true,\"paymentSource\":\"CREDITCARD\",\"onDeclineSuspend\":false,\"onDaysAvailable\":{\"enabled\":true,\"trigger\":1},\"creditCard\":{\"cardType\":\"VISA\",\"number\":\"'+creditCard+'\",\"holder\":\"'+cardholder+'\",\"expMonth\":\"'+emonth+'\",\"expYear\":\"'+eyear+'\",\"CVV\":\"'+cvv+'\"}}';
 console.log('datatosend for automatic payment'+datatosend);

	 var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://gqnchpomjprsrfglg-mock.stoplight-proxy.io/"+serviceId+"/automatic-payment",
  "method": "PATCH",
  "headers": {
    "authorization": "Bearer {token}.{secret}"
  },
  "data": datatosend
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
	 var ref=document.getElementById('transactionid').value;
	 console.log('ref'+ref);
	var amount=parseFloat($scope.formParams.totalcharge);
	 var datatosend='{\"amount\":'+amount+',\"currency\":\"CAD\",\"paymentMethod\":\"CREDITCARD\",\"reference\":\"'+ref+'\"}';
 console.log('datatosend for payment'+datatosend);
	

	var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://gqnchpomjprsrfglg-mock.stoplight-proxy.io/billing/"+serviceId+"/payments",
  
  "method": "POST",
  "headers": {
    "authorization": "Bearer {token}.{secret}",
    "content-type": "application/json"
  },
  "processData": false,
  "data": datatosend
}

$.ajax(settings).done(function (response) {
  console.log('done AddPayment '+response);
  //if automatic Payment $scope.AutomaticPayment(serviceId);
  
  //else $scope.ServiceAdditionEmail();
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
  $scope.AddPayment(serviceId);
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

/***************** sendWelcomeemail ******************/
 $scope.sendWelcomeemail = function() {
	 //
	 console.log("Function send mail");

 }
/***************** End sendWelcomeemail ******************/
/***************** SignUp ******************/
  
  $scope.signup = function() {
 var upassword=$scope.formParams.password;
 var email= $scope.formParams.email;
 var fname= $scope.formParams.first;
 var lname= $scope.formParams.last;
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

  var fname=  $scope.formParams.first;
 var lname=  $scope.formParams.last;

 var email=  $scope.formParams.email;
var upassword=  $scope.formParams.password;
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
  //console.log('response login after signup'+response.user_id);
  var newURL = window.location.protocol + "//" + window.location.host + window.location.pathname;
  var  token=response.access_token;

   var  access_token="Bearer "+token;
   console.log('before load');
  	 jQuery('#div_session_write').load(''+newURL+'public/session_write.php?access_token='+token);

	document.getElementById('tokeninput').value = token;
	//show user info
	
	if (document.getElementById('tokeninput').value == null){
	token= document.getElementById('div_session_write').innerHTML.substr(26);
	
	}
	else {token= document.getElementById('tokeninput').value;}
	 access_token="Bearer "+token;
	
	//$scope.showuserinfo2(access_token);
	 document.getElementById('logoutbtn').style.display="block";
  document.getElementById('userinfo').innerHTML='Logged in as '+fname+' '+lname;
  	 jQuery('#div_session_write2').load(''+newURL+'public/session_write2.php?username='+fname+'/'+lname);
    $scope.sendWelcomeemail();
	$scope.CreateService(accountId);
	//$scope.next('stagePlans'); 
	//$scope.$apply();
	//////////
});
$.ajax(settings).fail(function (response) {
	$(".alert-danger").slideDown();
console.log('fail2');


});


}
/********** End login after signup **********/

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
});

}
/********** End GetUser **********/


/********** PaymentProcess **********/

 $scope.PaymentProcess = function ( ) {
   var newURL = window.location.protocol + "//" + window.location.host;
var datacvv=$scope.formParams.cvv;
var datacreditCard = $scope.formParams.creditCard;
var datacardholder = $scope.formParams.cardholder;
var datayr = $scope.formParams.eyear;
var datamth = $scope.formParams.emonth;
var dataamount = $scope.formParams.totalcharge;

  console.log('data to send '+datacreditCard+' // '+datacvv+' // '+datacardholder+' // '+datayr+' // '+datamth);
  console.log('call url: '+newURL);
  if(newURL=="http://127.0.0.1"){newURL=newURL+"/laravel5";}
var settings = {
  "url": newURL+"/public/paymoneris.php", 
  "method": "POST",
   "data": { "cvv": datacvv,"creditCard" : datacreditCard,"cardholder" : datacardholder,"emonth" : datamth,"eyear" : datayr, "totalc" : dataamount }
  }
 $scope.formParams.transactionid ="";

var res = $.ajax(settings).done(function (response) {

 console.log('response done payement : ' + response);

    document.getElementById('transactionid').value=response;
 
   if ((document.getElementById('transactionid').value == "empty") || (document.getElementById('transactionid').value.startsWith("Array")))
  {
    alert ( "Transaction Fail !");
  }
  else{
	  if($scope.formParams.customer=="new"){ $scope.CreateAccount(); console.log('new');}
	//else $scope.CreateService(accountId);
	if($scope.formParams.customer=="existing"){
		
		$scope.GetUser();
		 console.log('existing');
		}
	  
  }
 });

$.ajax(settings).fail(function (response) {
  console.log(response);
  alert(response);
 });

}

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