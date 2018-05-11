'use strict';
//angular.module('myModule', ['ui.bootstrap']);
angular.module('formApp', [
  'ngAnimate'
]).
controller('formCtrl', ['$scope', '$http', function($scope, $http) {
	console.log('window.location.host'+window.location.host);
	var newURL ='';
console.log(window.location.host.indexOf("127.0.0.1"));
	if  (window.location.host.indexOf("127.0.0.1") > -1 ){
	var newURL ="http://127.0.0.1/simactivation/";  
	console.log('here1');
  }
  else if((window.location.host).indexOf("localhost")>-1){var newURL ="http://localhost/simactivation/";  }
else {	console.log('here2'); var newURL = window.location.protocol + "//" + window.location.host + window.location.pathname;}
	
  $scope.formParams = {};
  $scope.stage = "";
   $scope.formValidation = false;
 $scope.loggedin = false;
 
   // Navigation functions
 $scope.next = function (stage) {
  
  if (stage== 'stageLogin')
  {
	if ( $scope.loggedin)  
	{
		stage='stagePlans';
	}
  }
    if (stage== 'stageTypeCustomer')
  {
	if ( $scope.loggedin)  
	{
		stage='stagePlans';
	}
  }
  // change page heading section
      switch (stage) {
        case 'stageTypeCustomer':
            document.getElementById("pagetitle").innerHTML ="I AM ...";
            document.getElementById("pagesubtitle").innerHTML ="";
            break; 

        case 'stageAccount':
            document.getElementById("pagetitle").innerHTML ="Account Info";
            document.getElementById("pagesubtitle").innerHTML ="Please provide the details below to in order to create your new account";
            break;
        case 'stageLogin':
            document.getElementById("pagetitle").innerHTML ="Existing Customer Login";
            document.getElementById("pagesubtitle").innerHTML ="";
            break;  
        case 'stageForgotPassword':
            document.getElementById("pagetitle").innerHTML ="Forgot your password";
            document.getElementById("pagesubtitle").innerHTML ="Not a problem. Enter your email address below and well send you password reset instructions.";
            break; 
        case 'stagePlans':
            document.getElementById("pagetitle").innerHTML ="Select your plan";
            document.getElementById("pagesubtitle").innerHTML ="Please select the plan that you wish to use below";
            break; 
        case 'stagePhone':
            document.getElementById("pagetitle").innerHTML ="Select Your #";
            document.getElementById("pagesubtitle").innerHTML ="Please select the phone number that you wish to use below";
            break;
        case 'stageBilling':
            document.getElementById("pagetitle").innerHTML ="Billing Details";
            document.getElementById("pagesubtitle").innerHTML ="";
			$('#failpay').css('display', 'none');
			$('#failactivation').css('display', 'none');
            break;
        default: 
            document.getElementById("pagetitle").innerHTML ="Activate You SIM";
            document.getElementById("pagesubtitle").innerHTML ="To begin, enter the Activation PIN on your SIM KIT.";
    }
    //////$scope.formValidation = true;    
   ////// if ($scope.FormActivate.$valid) {
      $scope.direction = 1;
      $scope.stage = stage;
    /////  $scope.formValidation = false;
    /////}
  }
    
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
	  
	console.log('response show metaddata1'+response.nickname);   
	console.log('response show metaddata2'+response.user_metadata['firstName']);   
   document.getElementById('logoutbtn').style.display="block";
   document.getElementById('logoutb').style.display="block";
   document.getElementById('userinfo0').innerHTML="Logged in as ";
 
  document.getElementById('userinfo').innerHTML=response.user_metadata['firstName']+' '+response.user_metadata['lastName']+'</B>';
  document.getElementById('uinfo').value=response.user_metadata['firstName']+' '+response.user_metadata['lastName'];
console.log('uinfo'+document.getElementById('uinfo').value);
//response.user_metadata['firstName']=response.user_metadata['firstName'].replace(" ", "%20");
//response.user_metadata['lastName']=response.user_metadata['lastName'].replace(" ", "%20");
console.log('****new url****'+newURL);
var url=''+newURL+'public/session_write2.php?username='+response.user_metadata['firstName']+'/'+response.user_metadata['lastName'];

while ( url.indexOf(" ") > -1) {
url=url.replace(" ", "//");
}

	jQuery('.div_session_write2').load(url, function( response, status, xhr ) {
  if ( status == "error" ) {
    var msg = "Sorry but there was an error: ";
    console.log( msg + xhr.status + " " + xhr.statusText );
  }
  else{console.log('here');}
});
console.log('juste after load*****');
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
			
		 $('#pinmessage').css('display', 'none');
		 $('#pinmessage2').css('display', 'none');
		}
			
	 	$scope.checkPin = function () {
			console.log('enter to checkPin ');
		 $('#pinmessage').css('display', 'none');
		 $('#pinmessage2').css('display', 'none');
		$scope.pin = document.getElementById('pin').value;
	 	 $('#pin').css('border', '1px solid #FA5858');

		for(var i = 0; i < ($scope.DataPins.length); i++) {
			// pin existe
				if ($scope.DataPins[i].pin == $scope.pin) {
				console.log('pin exists');
				 if ($scope.DataPins[i].enabled==0)
				 { // pin not active
			 		 $scope.existe = true;
					 $('#pin').css('border', '1px solid #5cb85c');
						$scope.next('stageTypeCustomer');
						$('#pinmessage').css('display', 'none');
						$('#pinmessage2').css('display', 'none');
						//$scope.$apply();
				  break;
				 }
				 
				 else{
                     console.log('pin exists and enabled');
					 // Pin already Activated
					  $('#pin').css('border', '1px solid #FA5858');		
						$("#pinmessage2").slideDown();
						$('#pinmessage').css('display', 'none');
					break;
				 }
			
				} 
		}
	
		if ((i == ($scope.DataPins.length)) && ($scope.DataPins[($scope.DataPins.length)-1].pin != $scope.pin))
		{
					$('#pin').css('border', '1px solid #FA5858');
					$("#pinmessage").slideDown();
					console.log('Incorrect Pin !');
					console.log('I='+i);
					 $('#pinmessage2').css('display', 'none');

					}
  
 	}

	 	$scope.checkPin2 = function () {
			console.log('enter to checkPin2 ');
		 $('#pinmessage').css('display', 'none');
		 $('#pinmessage2').css('display', 'none');
		$scope.pin = document.getElementById('pin').value;
	 	 $('#pin').css('border', '1px solid #FA5858');

		for(var i = 0; i < $scope.DataPins.length; i++) {
			// pin existe
			if ($scope.DataPins[i].pin == $scope.pin) {
				 if ($scope.DataPins[i].enabled==0)
				 { // pin not active
					 $scope.existe = true;
					 $('#pin').css('border', '1px solid #5cb85c');
					//$('#pinmessage').css('display', 'none');
					//
					//document.getElementById('pinmessage').innerHTML='';
						$scope.next('stagePlans');
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
					break;
				
				 }
			
			
		}
		}
		if ((i == ($scope.DataPins.length)) && ($scope.DataPins[($scope.DataPins.length)-1].pin != $scope.pin))
		{
					$('#pin').css('border', '1px solid #FA5858');
					$("#pinmessage").slideDown();
					console.log('Incorrect Pin !');
					console.log('I='+i);
					 $('#pinmessage2').css('display', 'none');

					}
  
 	}	
	
      $http.get('https://gqnchpomjprsrfglg-mock.stoplight-proxy.io/plans').success(function (response2) {
            $scope.myData = response2;
        });
		
	  $http.get('https://gqnchpomjprsrfglg-mock.stoplight-proxy.io/telephone-numbers/reserved').success(function (response3) {
            $scope.NData = response3.telephoneNumbers; 		
        });
  
  /*********          Login            ********/
   
  $scope.login = function() {

  
 var email= document.getElementById('useremail').value;
var upassword= document.getElementById('userpassword').value;
	var datatosend='{\"grant_type\":\"password\",\"username\": \"'+email+'\",\"password\": \"'+upassword+'\",\"audience\": \"https://iristelx.auth0.com/api/v2/\", \"scope\": \"openid\", \"client_id\": \"PBbe88ULTLh0kycpE0Db7g4AWjO21hYG\", \"client_secret\": \"b0As5Ty-RwfckGI6-08qNcmbJu3wP1qTE-QA9Kp7ER4PyZHPiSLVvf4auhHiXp1w\"}';
//console.log('data to send '+datatosend);
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
  var  token=response.access_token;

   var  access_token="Bearer "+token;
   //console.log('before load');
  	 jQuery('#div_session_write').load(''+newURL+'public/session_write.php?access_token='+token);
 //console.log('after load');	
	document.getElementById('tokeninput').value = token;
	//show user info
	// console.log('after save');
	if (document.getElementById('tokeninput').value == null){
	token= document.getElementById('div_session_write').innerHTML.substr(26);
	
	}
	else {token= document.getElementById('tokeninput').value;}
	 access_token="Bearer "+token;
	
	$scope.showuserinfo(access_token);
	$scope.next('stagePlans');
	$scope.$apply()
	$scope.loggedin=true;
	//////////
});
$.ajax(settings).fail(function (response) {
	$(".alert-danger").slideDown();
var parsedData = JSON.parse(response.responseText);
		console.log('parsedData2'+parsedData.description);


});


}

 /******** end login ********/
 
 

 
 /******** Reset password ********/
  $scope.resetpassword = function() {
if ( document.getElementById("Ssent") != null ){document.getElementById("Ssent").style.display="none";}
if ( document.getElementById("Wmailrequired") != null ){document.getElementById("Wmailrequired").style.display="none";}
if ( document.getElementById("emailnotfound") != null ){document.getElementById("emailnotfound").style.display="none";}
	  
	 
	 var email= $scope.formParams.email;
if(email==""){$("#Wmailrequired").slideDown();}
else{
	
	var settings0 = { "async": true,"crossDomain": true,"url": "https://iristelx.auth0.com/oauth/token",  "method": "POST", "headers": {  "content-type": "application/json" },  "processData": false,
  "data": '{\"grant_type\":\"client_credentials\",\"client_id\": \"PBbe88ULTLh0kycpE0Db7g4AWjO21hYG\",\"client_secret\": \"b0As5Ty-RwfckGI6-08qNcmbJu3wP1qTE-QA9Kp7ER4PyZHPiSLVvf4auhHiXp1w\",\"audience\": \"https://iristelx.auth0.com/api/v2/\"}' }


$.ajax(settings0).done(function (response) {
	console.log('done token'+response);
  var  token=response.access_token;   var  access_token="Bearer "+token;
   	var settings1 = { "async": true,"crossDomain": true,"url": 'https://iristelx.auth0.com/api/v2/users?q="'+email+'"',"method": "GET","headers": {"content-type": "application/json","authorization": access_token }, "processData": false, "data": ''}
  $.ajax(settings1).done(function (response) {
	  	console.log('success q email'+response);
	  //	console.log('connection '+response[0].identities[0].connection);
  if(response[0].identities[0].connection== null){$("#emailnotfound").slideDown();}
  else if(response[0].identities[0].connection=="Username-Password-Authentication"){
	  	var datatosend='{\"client_id\": \"PBbe88ULTLh0kycpE0Db7g4AWjO21hYG\",\"email\": \"'+email+'\",\"connection\": \"Username-Password-Authentication\"}';

var settings = {"async": true,"crossDomain": true,"url": "https://iristelx.auth0.com/dbconnections/change_password",  "method": "POST", "headers": {"content-type": "application/json" },"processData": false,"data": datatosend }


$.ajax(settings).done(function (response) {
  console.log('success change password'+response);
  $(".alert-success").slideDown();
  });
  $.ajax(settings).fail(function (response) {
  console.log('fail change password'+response);

  
});
	  
  }
  });
  $.ajax(settings1).fail(function (response) {console.log('fail q email '+response);});
});
$.ajax(settings0).fail(function (response) {console.log('fail token '+response);});
	
		
	
	
	
	

	  
}	  
  }
  
 /******** end Reset password ********/
 var $body = $("body");

$(document).on({
    ajaxStart: function() { $body.addClass("loading");    },
    ajaxStop: function() { $body.removeClass("loading"); }    
}); 

/***************** ServiceAdditionEmail  ******************/
 $scope.ServiceAdditionEmail = function() {
	
var type=$scope.formParams.plantypes;
var charge=$scope.formParams.plancharge;
var phone=$scope.formParams.phonenumber;

	 	// console.log("Function send service addition mail");
 var mail=$scope.formParams.email;
 var reciever='';
 if ($scope.formParams.customer=="existing"){var firstname=reciever;var reciever=document.getElementById('uinfo').value;
 	  $.ajax({
  url: 'http://test.enterpriseesolutions.com/mail2?mail='+mail+'&reciever='+reciever+'&firstname='+firstname+'&type='+type+'&charge='+charge+'&phone='+phone,
  "method": "GET",
  // "data": { "mail": mail }, 
  success: function(data) {
  // console.log('success send'+data);
   //alert('Your account is activated successfully');
  /*var accountId= document.getElementById('accountId').value;
  $scope.loginsignup(accountId);*/
  $scope.enable($scope.formParams.pin);
   $scope.next('stageSuccess');
   $scope.$apply();
  },error: function(data) {
   //console.log('Fail send'+data);
  }
  
});
 }
 else if($scope.formParams.customer=="new") {  var firstname=$scope.formParams.first;
 var reciever= $scope.formParams.first+' '+$scope.formParams.last;
 	  $.ajax({
  url: 'http://test.enterpriseesolutions.com/mail2?mail='+mail+'&reciever='+reciever+'&firstname='+firstname+'&type='+type+'&charge='+charge+'&phone='+phone,
  "method": "GET",
  // "data": { "mail": mail }, 
  success: function(data) {
  // console.log('success send'+data);
   //alert('Your account is activated successfully');
   //$scope.loginsignup( document.getElementById('accountId').value );
   $scope.enable($scope.formParams.pin);
   $scope.next('stageSuccess');
   $scope.$apply();

  },error: function(data) {
   //console.log('Fail send'+data);
  }
  
});}
 else
 {
	var token=document.getElementById('tokeninput').value;
 var  access_token="Bearer "+token;	
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
  //console.log('email= '+response.email);
var mail=response.email;
var reciever=document.getElementById('userinfo').innerHTML;
var firstname=reciever;
	  $.ajax({
  url: 'http://test.enterpriseesolutions.com/mail2?mail='+mail+'&reciever='+reciever+'&firstname='+firstname+'&type='+type+'&charge='+charge+'&phone='+phone,
  "method": "GET",
  // "data": { "mail": mail }, 
  success: function(data) {
   //console.log('success send'+data);
   //alert('Your account is activated successfully');
   /*$scope.loginsignup( document.getElementById('accountId').value );*/
   $scope.enable($scope.formParams.pin);
   $scope.next('stageSuccess');
   $scope.$apply();
  },error: function(data) {
  // console.log('Fail send'+data);
  }
  
});
});
 }
   
	 
	  
  
 }
/***************** End ServiceAdditionEmail  ******************/ 

/***************** Finish  ******************/ 
$scope.Finish = function() {

 if($scope.formParams.customer=="new"){
	$scope.loginsignup( document.getElementById('accountId').value );
	//console.log('account id'+document.getElementById('accountId').value );
//redirect	
window.location.href = "https://www.icewireless.com/login";

	 
 }
 else{
	//redirect 
	 window.location.href = "https://www.icewireless.com/login";

 }
 }
/***************** End Finish  ******************/ 
 
 
/***************** Add Automatic Payment  ******************/
 $scope.AutomaticPayment = function(serviceId) {
 
	//var serviceId="d8e56f1e-c451-4b49-8068-b35ecefc3f4c";
	var cardholder=$scope.formParams.cardholder;
	var creditCard=$scope.formParams.creditCard;
	var emonth=$scope.formParams.emonth;
	if (emonth < 10){//console.log('smaller');
	emonth='0'+emonth;}
	var eyear=$scope.formParams.eyear;
	var cvv=$scope.formParams.cvv;
	var amount=parseFloat($scope.formParams.totalcharge);
	var datatosend='{\"enabled\":true,\"paymentSource\":\"CREDITCARD\",\"onDeclineSuspend\":false,\"onDaysAvailable\":{\"enabled\":true,\"trigger\":1,\"amount\":'+amount+'},\"creditCard\":{\"cardType\":\"VISA\",\"number\":\"'+creditCard+'\",\"holder\":\"'+cardholder+'\",\"expMonth\":\"'+emonth+'\",\"expYear\":\"'+eyear+'\",\"CVV\":\"'+cvv+'\"}}';
 //console.log('datatosend for automatic payment'+datatosend);

	 var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://gqnchpomjprsrfglg-mock.stoplight-proxy.io/billing/"+serviceId+"/automatic-payment",
  "method": "PATCH",
  "headers": {
    "authorization": "Bearer {token}.{secret}"
  },
  "data": datatosend
  }

$.ajax(settings).done(function (response) {
  //console.log('done AutomaticPayment '+response);
  $scope.ServiceAdditionEmail();
});
$.ajax(settings).fail(function (response) {
 // console.log('fail AutomaticPayment '+response);
  var parsedData = JSON.parse(response.responseText);
	//	console.log('parsedData2'+parsedData.description);

});
 }
 /***************** End Automatic Payment  ******************/
/***************** Add Payment  ******************/
 $scope.AddPayment = function(serviceId) {
	 console.log('add payment ***********');
	 var ref=document.getElementById('transactionid').value.replace(/(\r\n|\n|\r)/gm,"");
	// console.log('new ref'+ref);
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
  //console.log('done AddPayment '+response);
  if($scope.formParams.autopay == true){$scope.AutomaticPayment(serviceId);}
  else {$scope.ServiceAdditionEmail();}
   //$scope.ServiceAdditionEmail(); //remove this if automatic payment is fixed
});
$.ajax(settings).fail(function (response) {
  //console.log('fail AddPayment'+response);
  var parsedData = JSON.parse(response.responseText);
		//console.log('parsedData2'+parsedData.description);

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
 // console.log('done add SIM '+response);
  $scope.AddPayment(serviceId);
});
$.ajax(settings).fail(function (response) {
  //console.log('fail add SIM'+response);
  var parsedData = JSON.parse(response.responseText);
		//console.log('parsedData2'+parsedData.description);
$("#failactivation").slideDown();
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
  //console.log('done AddTelephoneNumber'+response);
    $scope.AddSIM(accountId,serviceId);
});
$.ajax(settings).fail(function (response) {
 // console.log('fail AddTelephoneNumber'+response);
  var parsedData = JSON.parse(response.responseText);
		//console.log('parsedData2'+parsedData.description);
		$("#failactivation").slideDown();
});


 }
 /***************** end AddTelephoneNumber ******************/
 
 /***************** CreateService ******************/
 
 $scope.CreateService = function(accountId) { 
 var fname= $scope.formParams.first ;
	 var lname= $scope.formParams.last ;
	 if($scope.formParams.unit != null){
		var address1=$scope.formParams.unit+'-'+$scope.formParams.streetnum+' '+ $scope.formParams.streetname; 
	 }
	 else{
		var address1=$scope.formParams.streetnum+' '+ $scope.formParams.streetname; 
	 }
	 if(country= $scope.formParams.box != null){
		var address2='PO BOX'+$scope.formParams.box;	 }
	 else {var address2='NULL';}
	  var city= $scope.formParams.city ;
	 var province= $scope.formParams.province ;
	 var country= 'CA';
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
  "data": '{\"provisioning\":{\"planCode\":\"'+planCode+'\"},\"billing\":{\"billParentAccount\":true,\"recurringCharge\":'+recurringCharge+'},\"contact\":{\"fname\":\"'+fname+'\",\"lname\":\"'+lname+'\",\"address1\":\"'+address1+'\",\"address2\":\"'+address2+'\",\"address3\":\"\",\"city\":\"'+city+'\",\"province\":\"'+province+'\",\"country\":\"'+country+'\",\"postalCode\":\"'+postalCode+'\",\"emailAddress\":\"'+emailAddress+'\"}}'

}

$.ajax(settings).done(function (response) {
 // console.log('done create service'+response);
  //console.log(' service ID '+response.serviceId);
  var serviceId=response.serviceId;
   $scope.AddTelephoneNumber(accountId,serviceId);
});
$.ajax(settings).fail(function (response) {
 // console.log('fail create service'+response);
  var parsedData = JSON.parse(response.responseText);
	//	console.log('parsedData2'+parsedData.description);
$("#failactivation").slideDown();
});
 
 }
/***************** end CreateService ******************/


/***************** CreateAccount ******************/
 $scope.CreateAccount = function() {
	 var fname= $scope.formParams.first ;
	 var lname= $scope.formParams.last ;
if($scope.formParams.unit != null){
		var address1=$scope.formParams.unit+'-'+$scope.formParams.streetnum+' '+ $scope.formParams.streetname; 
	 }
	 else{
		var address1=$scope.formParams.streetnum+' '+ $scope.formParams.streetname; 
	 }
	 if(country= $scope.formParams.box != null){
		var address2='PO BOX'+$scope.formParams.box;	 }
		else {var address2='NULL';}
	
	 var city= $scope.formParams.city ;
	 var province= $scope.formParams.province ;
	 var country= 'CA' ;
	 var postalCode= $scope.formParams.postal ;
	 var emailAddress= $scope.formParams.email ;
	//var  datatosend= '{\"contact\":{\"fname\":\"'+fname+'\",\"lname\":\"'+lname+'\",\"address1\":\"'+address1+'\",\"address2\":\"'+address2+'\",\"address3\":\"'+address3+'\",\"city\":\"'+city+'\",\"province\":\"'+province+'\",\"country\":\"'+country+'\",\"postalCode\":\"'+postalCode+'\",\"emailAddress\":\"'+emailAddress+'\"}}';
var  datatosend='{\"contact\":{\"fname\":\"'+fname+'\",\"lname\":\"'+lname+'\",\"address1\":\"'+address1+'\",\"address2\":\"'+address2+'\",\"address3\":\"\",\"city\":\"'+city+'\",\"province\":\"'+province+'\",\"country\":\"'+country+'\",\"postalCode\":\"'+postalCode+'\",\"emailAddress\":\"'+emailAddress+'\"}}';

	console.log('datatosend for payment'+datatosend);
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
  "data": datatosend}


$.ajax(settings).done(function (response) {
  //console.log('done'+response);
  //console.log('id'+response.accountId);
  var accountId=response.accountId;
  document.getElementById('accountId').value=accountId;
  $scope.signup(accountId);
 // $scope.CreateService(accountId);
}); 
$.ajax(settings).fail(function (response) {
  //console.log('fail'+response);
  var parsedData = JSON.parse(response.responseText);
		//console.log('parsedData2'+parsedData.description);

}); 
	 
 }
/***************** End CreateAccount ******************/

/***************** sendWelcomeemail ******************/
 $scope.sendWelcomeemail = function(accountId) {
	 //
	 //console.log("Function send welcome mail");
 
	  console.log('enter');
var mail=$scope.formParams.email;
var reciever= $scope.formParams.first+' '+$scope.formParams.last;
var reciever= $scope.formParams.first+' '+$scope.formParams.last;
if ($scope.formParams.unit==undefined){
	var address1= $scope.formParams.streetnum+' '+$scope.formParams.streetname;
}else{
var address1= $scope.formParams.streetnum+' '+$scope.formParams.streetname+' '+$scope.formParams.unit;}
if($scope.formParams.box==undefined){
var address2= $scope.formParams.postal+' '+$scope.formParams.city+' '+$scope.formParams.province;
	
}
else{
var address2= $scope.formParams.box+' '+$scope.formParams.postal+' '+$scope.formParams.city+' '+$scope.formParams.province;
	
}
 // console.log ("url= "+'http://test.enterpriseesolutions.com/mail?mail='+mail+'&reciever='+reciever+'&accountId='+accountId+'&address1='+address1+'&address2='+address2);
	 	  $.ajax({
  url: 'http://test.enterpriseesolutions.com/mail?mail='+mail+'&reciever='+reciever+'&accountId='+accountId+'&address1='+address1+'&address2='+address2,
  "method": "GET",
  // "data": { "mail": mail }, 
  success: function(data) {
   console.log('success send'+data);
  },error: function(data) {
   console.log('Fail send'+data);
  }
  
});
	  
  
 }
/***************** End sendWelcomeemail ******************/
/***************** SignUp ******************/
  
  $scope.signup = function(accountId) {
 var upassword=$scope.formParams.password;
 var email= $scope.formParams.email;
 var fname= $scope.formParams.first;
 var lname= $scope.formParams.last;
 	var datatosend='{\"connection\":\"Username-Password-Authentication\",\"email\": \"'+email+'\",\"password\": \"'+upassword+'\",\"user_metadata\": { \"firstName\": \"'+fname+'\", \"lastName\": \"'+lname+'\" }}';
 //console.log('data to send '+datatosend);
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
	//$scope.loginsignup(accountId);
	$scope.sendWelcomeemail(accountId);
	$scope.CreateService(accountId);
});
$.ajax(settings).fail(function (response) {console.log('fail');

var parsedData = JSON.parse(response.responseText);
		console.log('parsedData2'+parsedData.description);
		$scope.next('stageAccount'); 
	    $scope.$apply();
		if(parsedData.description=="The user already exists."){
		$("#alertUserExist").slideDown();}
		else{
	   $("#failsignup").slideDown();
		}
		//alert(parsedData.description);
		

});
  }
/************* end sign up ***************/
  /*********          Login  after SignUp          ********/
   
  $scope.loginsignup = function(accountId) {

  var fname=  $scope.formParams.first;
 var lname=  $scope.formParams.last;

 var email=  $scope.formParams.email;
var upassword=  $scope.formParams.password;
	var datatosend='{\"grant_type\":\"password\",\"username\": \"'+email+'\",\"password\": \"'+upassword+'\",\"audience\": \"https://iristelx.auth0.com/api/v2/\", \"scope\": \"openid\", \"client_id\": \"PBbe88ULTLh0kycpE0Db7g4AWjO21hYG\", \"client_secret\": \"b0As5Ty-RwfckGI6-08qNcmbJu3wP1qTE-QA9Kp7ER4PyZHPiSLVvf4auhHiXp1w\"}';
//console.log('data to send '+datatosend);
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
   // else {var newURL="<?php echo $url; ?>"}
//  var newURL = window.location.protocol + "//" + window.location.host + window.location.pathname;
  var  token=response.access_token;

   var  access_token="Bearer "+token;
   console.log('before load'+newURL+'****');
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
   document.getElementById('logoutb').style.display="block";
  document.getElementById('userinfo').innerHTML=fname+' '+lname ;
  document.getElementById('userinfo0').innerHTML="Logged in as ";

var url=''+newURL+'public/session_write2.php?username='+fname+'/'+lname;
//console.log('url before loop'+url);
while ( url.indexOf(" ") > -1) {
url=url.replace(" ", "//");
}  	
//console.log('url after loop'+url);
	jQuery('.div_session_write2').load(url    , function( response, status, xhr ) {
  if ( status == "error" ) {
    var msg = "Sorry but there was an error: ";
    console.log( msg + xhr.status + " " + xhr.statusText );
  }
});
	//$scope.next('stagePlans'); 
	//$scope.$apply();
	//////////
});
$.ajax(settings).fail(function (response) {
	$(".alert-danger").slideDown();
	
	var parsedData = JSON.parse(response.responseText);
		console.log('parsedData2'+parsedData.description);

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
  var parsedData = JSON.parse(response.responseText);
		console.log('parsedData2'+parsedData.description);

});

}
/********** End GetUser **********/


/********** PaymentProcess **********/

 $scope.PaymentProcess = function ( ) {
var datacvv=$scope.formParams.cvv;
var datacreditCard = $scope.formParams.creditCard;
var datacardholder = $scope.formParams.cardholder;
var datayr = $scope.formParams.eyear;
var datamth = $scope.formParams.emonth;
var dataamount = $scope.formParams.totalcharge;
var checkboxautomatic = $scope.formParams.autopay;

  console.log('data to send '+datacreditCard+' // '+datacvv+' // '+datacardholder+' // '+datayr+' // '+datamth);
  console.log('call url: '+newURL);

var settings = {
  "url": newURL+"/public/paymoneris.php", 
  "method": "POST",
   "data": { "cvv": datacvv,"creditCard" : datacreditCard,"cardholder" : datacardholder,"emonth" : datamth,"eyear" : datayr, "totalc" : dataamount,"atotopup": checkboxautomatic }
  }
 $scope.formParams.transactionid ="";

var res = $.ajax(settings).done(function (response) {

 console.log('response done payement :*' + response.replace(/(\r\n|\n|\r)/gm,"")+'*');
 console.log('response done payement :*' + response.replace(/\s/g,'')+'*');

    document.getElementById('transactionid').value=response.replace(/(\r\n|\n|\r)/gm,"");
    console.log('length : ' + document.getElementById('transactionid').value.length);
 
   if ((document.getElementById('transactionid').value == "empty") || 
   (document.getElementById('transactionid').value.startsWith("Array")) ||  (document.getElementById('transactionid').value.startsWith("null")))
  {
    //alert ( "Transaction Fail !");
    $("#failpay").slideDown();
    //$("#containerbilling").css("height", "1170px!important");
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      $("#containerbilling").css("cssText", "height: 1200px !important;");
    } else {
      $("#containerbilling").css("cssText", "height: 950px !important;");
    }
  }
  else{
	  if($scope.formParams.customer=="new"){
		  $scope.CreateAccount(); console.log('new');}
	//else $scope.CreateService(accountId);

	if (($scope.formParams.customer=="existing") || ((document.getElementById('tokeninput').value.length)>0) ){
		
		$scope.GetUser();
		 console.log('existing');
		}
	  
  }
 });

$.ajax(settings).fail(function (response) {
  console.log(response);
 var parsedData = JSON.parse(response.responseText);
		console.log('parsedData2'+parsedData.description);

 });

}

  $scope.back = function (stage) {
    $scope.direction = 0;
    $scope.stage = stage;
	// change page heading section
      switch (stage) {
        case 'stageTypeCustomer':
            document.getElementById("pagetitle").innerHTML ="I AM ...";
            document.getElementById("pagesubtitle").innerHTML ="";
            break; 

        case 'stageAccount':
            document.getElementById("pagetitle").innerHTML ="Account Info";
            document.getElementById("pagesubtitle").innerHTML ="Please provide the details below to in order to create your new account";
            break;
        case 'stageLogin':
            document.getElementById("pagetitle").innerHTML ="Existing Customer Login";
            document.getElementById("pagesubtitle").innerHTML ="";
            break;  
        case 'stageForgotPassword':
            document.getElementById("pagetitle").innerHTML ="Forgot your password";
            document.getElementById("pagesubtitle").innerHTML ="Not a problem. Enter your email address below and well send you password reset instructions.";
            break; 
        case 'stagePlans':
            document.getElementById("pagetitle").innerHTML ="Select your plan";
            document.getElementById("pagesubtitle").innerHTML ="Please select the plan that you wish to use below";
            break; 
        case 'stagePhone':
            document.getElementById("pagetitle").innerHTML ="Select Your #";
            document.getElementById("pagesubtitle").innerHTML ="Please select the phone number that you wish to use below";
            break;
        case 'stageBilling':
            document.getElementById("pagetitle").innerHTML ="Billing Details";
            document.getElementById("pagesubtitle").innerHTML ="";
            break;
        default: 
            document.getElementById("pagetitle").innerHTML ="Activate You SIM";
            document.getElementById("pagesubtitle").innerHTML ="To begin, enter the Activation PIN on your SIM KIT.";
    }
  }
  
    $scope.Next = "";
    $scope.Next2 = "";
	 $scope.chekPass = function () {
		 return (document.getElementById('confirm_password').value == document.getElementById('password').value) ;
	 }
	 
	  $scope.SetElmVal = function (id,val) {
	   document.getElementById(id).value=val;
}


  $scope.existingcust = function () {
 //function existingcust(){
document.getElementById('existcustomer').style.color='white';
document.getElementById('existcustomer').style.backgroundColor='rgb(165, 168, 171)';

document.getElementById('customer').value="existing"
 $scope.formParams.customer="existing";


document.getElementById('newcustomer').style.color='#464646';
document.getElementById('newcustomer').style.backgroundColor='rgb(246, 246, 246)';
document.getElementById('next1').disabled=false;

$scope.Next="stageLogin";
$scope.Next2="stagePlans";
//$scope.stage="stageLogin";
// $scope.$apply();	
}

//function newcustomer(){
  $scope.newcustomer = function () {

document.getElementById('newcustomer').style.color='white';
document.getElementById('newcustomer').style.backgroundColor='rgb(165, 168, 171)';

document.getElementById('customer').value="new";
  //var input = $('input');
  //  input.trigger('input'); 
	
document.getElementById('existcustomer').style.color='#464646';
document.getElementById('existcustomer').style.backgroundColor='rgb(246, 246, 246)';
document.getElementById('next1').disabled=false;

 $scope.formParams.customer="new";

$scope.Next="stageAccount";
$scope.Next2="stageAccount";
//document.getElementById("alertUserExist").style.display="none";
$('#alertUserExist').css('display', 'none');
$('#failsignup').css('display', 'none');
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

		  $('#plans ol li').css('color', '#464646');
		  $('#plans ol li').css('backgroundColor', 'rgb(246, 246, 246)');
		  
			   document.getElementById(plan).style.color='white';
			  // document.getElementById('@'+plan).style.color='white';
			   document.getElementById(plan).style.backgroundColor='rgb(165, 168, 171)';
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
  
/****************  SELECT PHONE NUMBER    *******************************/  
  $scope.search = {};
  
   $scope.province = function () 
{
	var Text="";
	var elt = document.getElementById('sel1');

    if (elt.selectedIndex == -1)
	{Text="";}
	else {
    Text=  elt.options[elt.selectedIndex].text;
	if (Text=='Ontario'){Text='On';}
	document.getElementById('provinceText').value=Text;
	document.getElementById('sel2').options[document.getElementById('sel2').selectedIndex].value=-1;$scope.search.city="";
	document.getElementById('sel3').options[document.getElementById('sel3').selectedIndex].value=-1; $scope.search.areaCode="";

	}
   $scope.search.province=Text;
   // $('#divnumbers').css('display', 'none');
	  document.getElementById('divnumbers').style.display="none";

$scope.formParams.phonenumber="";
  document.getElementById('next4').disabled=true;

  }

   $scope.city = function () 
{
	var Text="";
	  var elt = document.getElementById('sel2');

    if (elt.selectedIndex == -1)
	{Text="";}
	else { 
    Text=  elt.options[elt.selectedIndex].text;
	document.getElementById('cityText').value=Text;
	document.getElementById('sel3').options[document.getElementById('sel3').selectedIndex].value=-1;$scope.search.areaCode="";

	}
	   $scope.search.city=Text;
  // $('#divnumbers').css('display', 'none');
  document.getElementById('divnumbers').style.display="none";

 $scope.formParams.phonenumber="";
   document.getElementById('next4').disabled=true;

}

   $scope.area = function () 
{
	var Text="";
	  var elt = document.getElementById('sel3');

    if (elt.selectedIndex == -1)
	{Text="";}
	else {
    Text=  elt.options[elt.selectedIndex].text;
	document.getElementById('areaText').value=Text;
	}
	   $scope.search.areaCode=Text;

  // $('#divnumbers').css('display', 'block');
  document.getElementById('divnumbers').style.display="block";
$scope.formParams.phonenumber="";
  document.getElementById('next4').disabled=true;

  }
  //enable 
  
$scope.enable = function (id){

	 var setting = {
  "async": true,
  "crossDomain": true,
  "url": newURL+"admin/enable/"+id,
  "method": "GET",
  "headers": {
     'Access-Control-Allow-Origin': '*'
  },
  "processData": false 
 
  }
  
   
$.ajax(setting).done(function (response) {
$("#pinenabled").slideDown();
		//refresh PINs list 
	  $http.get(newURL+'pins').success(function (responsepins) {
             $scope.DataPins = responsepins ;
			 console.log('success enable');
          });	
});

$.ajax(setting).fail(function (response) {
	console.log('fail enable  '+ response);
});
	
	
 }


}]);