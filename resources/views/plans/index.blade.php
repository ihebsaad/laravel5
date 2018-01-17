@extends('./../layouts.asklayout')
<style type="text/css">

    #selectable {width: 850px!important; }
    #selectable li { width: 260px!important; height: 230px!important; padding-top: 50px!important;}
</style>
<html ng-app="myApp">

<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js">
</script>
<script>
    myApp=angular.module('myApp',[]);
    myApp.controller('myController',function($scope,$http) {
        //$http.get('https://jsonplaceholder.typicode.com/users').success(function(response){
        // $http.get(thedata).success(function (response) {
        //   $http.get(thedata).success(function(response){
        $http.get('https://gqnchpomjprsrfglg-mock.stoplight-proxy.io/plans').success(function (response) {
            $scope.myData = response;
        });
        $scope.removeName = function (row) {
            $scope.myData.splice($scope.myData.indexOf(row), 1);
        }
    });
</script>
@section('content')
    <div ng-controller="myController">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Select your plan</h1>
            <h5>Please select the plan that you wish to use below</h5>
        </div>
    </section>
    <div class="container center_div" style="max-width: 850px!important;">
        <form name="selectplan_form" id='selectplan_form' class="form-inline">
            <div class="row">
                <ol id="selectable" >
<div ng-repeat="data in myData.plans"  >
                <!--    <tr ng-repeat="data in myData.plans  | filter : search">-->
    <li  ng-attr-id='@{{$index}}' class="ui-state-default"><h5 ng-bind="data.planType"></h5><p><B  ng-bind="data.recurringCharge"> </B> $ / mth</br><br><I  ng-bind="data.billingType"></I></p></li>
</div>
                   <!--   <td><label ng-bind="data.planCode"></label></td>
                        <td><label ng-bind="data.billingType"></label></td>
                        <td><label ng-bind="data.active"></label></td>
                        <td><label ng-bind="data.planType"></label></td>
                     </tr>-->
                    <!--  <li class="ui-state-default"><h5>Talk, Text and Surf</h5><p>49$ / mth</br>Unlimited Local Calling</br>Unlimited Local Text</br>1 GB Data</p></li>
                      <li class="ui-state-default"><h5>Talk, Text and Surf</h5><p>59$ / mth</br>Unlimited Canada Calling</br>Unlimited Canada Text</br>2 GB Data</p></li>
                      <li class="ui-state-default"><h5>Talk, Text and Surf</h5><p>69$ / mth</br>Unlimited Canada/US Calling</br>Unlimited Canada/US Text</br>2 GB Data</p></li>
                 --> </ol>
            </div>
    </div>
    <div class="container center_div" style="max-width: 850px!important;">
        <!--<div class="col-sm-9 form-group">
            <button type="button" class="btn btn-success btn-previous" id="Previous"><i class="icnleft"></i> Previous</button>
        </div>
            <div class="text-right"><button type="button" class="btn btn-success btn-next text-right" style="float: right!important; margin-right: -155px!important;" id="Next">Next <i class="icnright"></i></button></div>-->
        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-9 form-group">
                <button type="button" class="btn btn-success btn-previous" id="Previous"><i class="icnleft"></i> Previous</button>
            </div>
            <div class="col-sm-3 form-group">
                <button type="button" class="btn btn-success btn-next" style="float: right;" id="Next">Next <i class="icnright"></i></button>
            </div>
        </div>
    </div>

    </form>



    </div>
    </html>

    @endsection



