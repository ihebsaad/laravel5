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
 
  $("#admindiv").animate({height: "100px"});
   $("#admindiv").animate({height: "100px"});
   $("#admindiv").animate({height: "555px"});
   $("#admindiv").animate({height: "532"});
   
 
$scope.$apply();


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
 
 
  var $body = $("body");

$(document).on({
    ajaxStart: function() { console.log('start');$body.addClass("loading");    },
     ajaxStop: function() { $body.removeClass("loading"); }    
}); 

$scope.assignRange = function (){
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
	
	 if (plans.length==0){console.log('delete');
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
		 console.log('insert or update');
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

	 
   }}
   $scope.deleteRange = function (){
 
	  start=document.getElementById('startsim').value;
	  end=document.getElementById('endsim').value;
	    if (end < start){
		  alert('Incorrect range!');		  
	  }
	  else{
		   	 	 var setting = {
  "async": true,
  "crossDomain": true,
  "url": "http://test.enterpriseesolutions.com/admin/delete/"+start+'/'+end,
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
	  
  }
     $scope.upload = function (){
    var file_data = $('#sortpicture').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
	var newURL = window.location.protocol + "//" + window.location.host;
    if(newURL=="http://127.0.0.1"){
		url="http://127.0.0.1/laravel5/public/upload.php";		
	}
	else{
		url="http://test.enterpriseesolutions.com/public/upload.php";
}

    //alert(form_data);                             
    $.ajax({
               // url: 'http://test.enterpriseesolutions.com/public/upload.php', // point to server-side PHP script 
               url: url, // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(response){
                    alert('uploaded'); // display response from the PHP script, if any
					console.log(response);
					if (response.indexOf('Incorrect delimeter!') > -1){alert('Incorrect delimeter!');}
					else if (response.indexOf('Incorrect headers!') > -1){alert('Incorrect headers!');}
				   else if ( ((response.indexOf('Incorrect delimeter!') > -1)) 
					   || ((response.indexOf('Failed') > -1))
				       || ((response.indexOf('empty') > -1)) 
					   || ((response.indexOf('non-existent') > -1)) 
				       || ((response.indexOf('without') > -1))      )
				   {
					alert('Completed with errors');
				    }
				   else{
					alert('Completed successfully');
				}
				//	console.log( ' response json'+JSON.parse(JSON.stringify(response)));
			
                },fail: function(error){
                    alert(error); // display response from the PHP script, if any
                }/*,
        // Custom XMLHttpRequest
        xhr: function() {
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) {
                // For handling the progress of the upload
                myXhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                        $('#progress1').attr({
                            value: e.loaded,
                            max: e.total,
                        });
                    }
                } , false);
            }
            return myXhr;
        }*/
     });
});

 
	
}]);