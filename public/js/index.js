'use strict';

angular.module('formApp', [
  'ngAnimate'
]).
controller('formCtrl', ['$scope', '$http', function($scope, $http) {
  $scope.formParams = {};
  $scope.stage = "";
  $scope.formValidation = false;
  $scope.toggleJSONView = false;
  $scope.toggleFormErrorsView = false;
  
 /* $scope.formParams = {
    ccEmail: '',
    ccEmailList: []
  };
  */
 
  // Navigation functions
  $scope.next = function (stage) {
    //$scope.direction = 1;
    //$scope.stage = stage;
    
    $scope.formValidation = true;
    
    if ($scope.FormActivate.$valid) {
      $scope.direction = 1;
      $scope.stage = stage;
      $scope.formValidation = false;
    }
  };

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
  };
  
  $scope.reset = function() {
    // Clean up scope before destorying
    $scope.formParams = {};
    $scope.stage = "";
  }
  
}])
.controller('PlansController',function($scope,$http) {
	//  $scope.formParams = {};
        //$http.get('https://jsonplaceholder.typicode.com/users').success(function(response){
        // $http.get(thedata).success(function (response) {
        //   $http.get(thedata).success(function(response){
        $http.get('https://gqnchpomjprsrfglg-mock.stoplight-proxy.io/plans').success(function (response) {
            $scope.myData = response;
        });
        /*$scope.removeName = function (row) {
            $scope.myData.splice($scope.myData.indexOf(row), 1);
        }*/
		  $scope.setPlan = function (plan,plantype,charge) {
 			  document.getElementById('plancode').value=plan;
		 $scope.formParams.plancode=plan;

		  $('#plans ol li').css('color', '#454545');
		  $('#plans ol li').css('backgroundColor', 'rgb(246, 246, 246)');
		  
			   document.getElementById('@'+plan).style.color='white';
			   document.getElementById('@'+plan).style.backgroundColor='rgb(92, 184, 92)';
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

    })
.controller('NumbersController',function($scope,$http) {
 // $scope.formParams = {};

  $http.get('https://jsonplaceholder.typicode.com/users').success(function (response) {
  //$http.get('https://jsonplaceholder.typicode.com/todos').success(function (response) {
            $scope.NData = response;
		 		
        });
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
  
});
