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
	



	
	
	
}]);