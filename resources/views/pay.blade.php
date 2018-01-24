@extends('layouts.mainlayout')

<style>

fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
            border-radius: 1rem;
    padding-top: 20px;
}

    legend.scheduler-border {
        font-size: 1.2em !important;
        text-align: left !important;
        width:auto;
        padding:0 10px;
        border-bottom:none;
    }

    .checkbox label:after, 
.radio label:after {
    content: '';
    display: table;
    clear: both;
}

.checkbox .cr,
.radio .cr {
    position: relative;
    display: inline-block;
    border: 1px solid #a9a9a9;
    border-radius: .25em;
    width: 1.3em;
    height: 1.3em;
    float: left;
    margin-right: .5em;
}

.radio .cr {
    border-radius: 50%;
}

.checkbox .cr .cr-icon,
.radio .cr .cr-icon {
    position: absolute;
    font-size: .8em;
    line-height: 0;
    top: 50%;
    left: 20%;
}

.radio .cr .cr-icon {
    margin-left: 0.04em;
}

.checkbox label input[type="checkbox"],
.radio label input[type="radio"] {
    display: none;
}

.checkbox label input[type="checkbox"] + .cr > .cr-icon,
.radio label input[type="radio"] + .cr > .cr-icon {
    transform: scale(3) rotateZ(-20deg);
    opacity: 0;
    transition: all .3s ease-in;
}

.checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
.radio label input[type="radio"]:checked + .cr > .cr-icon {
    transform: scale(1) rotateZ(0deg);
    opacity: 1;
}

.checkbox label input[type="checkbox"]:disabled + .cr,
.radio label input[type="radio"]:disabled + .cr {
    opacity: .5;
}

</style>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular-animate.min.js'></script> 
    <script type="text/javascript">
        'use strict';

        angular.module('formApp', [
          'ngAnimate'
        ]).
        controller('formCtrl', ['$scope', '$http', function($scope, $http) {

                $scope.formParams = {PostDataResponse = 'test'};
               //.formParams.PostDataResponse = 'test';






        }]);
    </script>

@section('content')
<section class="jumbotron text-center">
<div class="container">
<h1 class="jumbotron-heading">Billing Details</h1>
</div>
</section>
<div class="container center_div">
<div ng-app="formApp" ng-controller="formCtrl">
 <div class="container center_div">

    <fieldset class="scheduler-border" style="padding-top: 20px!important;">
        <legend class="scheduler-border" style="color: grey;">Total Due Today</legend>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4">
                    &nbsp;
                </div>
                <div class="col-sm-6">
                    <span id="planname" style="font-size:18px;color:#31B404;  font-weight: bold;float: right;" ng-bind="formParams.plantypes" >  </span>
                </div>
                <div class="col-sm-2">
                    <span style="font-size:18px;color:#31B404;"  id="planprice"  ng-bind="formParams.plancharge" >   </span>$
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4">
                    &nbsp;
                </div>
                <div class="col-sm-6">
                    <span style="font-size:18px;color:grey;float:right"id="taxes"   >Taxes</span>
                </div>
                <div class="col-sm-2">
                    <span style="font-size:18px;color:grey;" id="taxesprice" >10$</span>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4">
                    &nbsp;
                </div>
                <div class="col-sm-6">
                    <span id="total" style="font-weight: bold;float: right;font-size:18px;color:#31B404;" >Total</span>
                </div>
                <div class="col-sm-2">
                    <span style="font-size:18px;color:#31B404;" id="totalprice" >79$</span>
                </div>
            </div>
        </div>
        <hr />
        <div id="creditcard" style="margin-top: 20px;" >
        <div class="form-group">
            <input type="text"   class="form-control" id="cardholder" placeholder="Cardholder Name" ng-pattern="/^[a-zA-Z ]*$/" ng-minlength="3" ng-maxlength="35"  ng-model="formParams.cardholder"  /></input>        </div>
        <div class="form-group">
            <input type="number"  id="credit" name="creditCard"  ng-model="formParams.creditCard"  required  data-credit-card-type   data-ng-pattern="/^[0-9]+$/"  data-ng-minlength="15"     maxlength="19" class="form-control" id="cardnumber" placeholder="Card Number" />
                <ul ng-show="!FormActivate.$valid">
      <li ng-show="FormActivate.creditCard.$error.pattern">Credit card must contain digits only</li>
      <li ng-show="FormActivate.creditCard.$error.minlength">Credit card must be 15-19 digits</li>
      <li ng-show="FormActivate.creditCard.$error.maxlength">Credit card must contain a maximum of 19 digits </li>
 
      </ul>
        </div>
         <div class="row">
                            <div class="col-sm-3 form-group">
                                <input type="number" placeholder="Exp Mth" ng-model="formParams.month" class="form-control"  min="1" max="12"  ng-model="month" >
                            </div>  
                            <div class="col-sm-3 form-group">
                                <input type="number" placeholder="Exp Year" ng-model="formParams.year" class="form-control" min="2018" max="2050"  ng-model="year" >
                            </div>  
                            <div class="col-sm-3 form-group">
                                 <input type="number" placeholder="CVV" class="form-control"    ng-model="formParams.cvv" name="securityCode"    ng-model="securityCode"  required  data-ng-pattern="/^[0-9]+$/"  data-ng-minlength="3"  maxlength="4">
                              <ul ng-show=" !FormActivate.$valid">
      <li ng-show="FormActivate.securityCode.$error.pattern">Security code must contain only numbers</li>
      <li ng-show="FormActivate.securityCode.$error.minlength">Security code must be 3-4 digits</li>

      </ul></div>   
                            <div class="col-sm-1 form-group">
                                 <button type="button" class="btn btn-default" style="width: 30px; height: 30px; padding: 6px 0px; border-radius: 15px; text-align: center; font-size: 12px; 
                                 line-height: 1.42857;" data-toggle="tooltip" data-html="true" title="<em>Help</em> <u>Info</u> <b>TEXT</b>"><b>?</b></button> 
                            </div>  
                            <div class="col-sm-2 form-group">
                                 &nbsp;
                            </div>   
        </div>
        <div class="row" style="margin-left: 0px">
            <div class="checkbox" style="color: #464a4c;">
                <label><input id="atotopup" name="atotopup" ng-model="formParams.autopay" type="checkbox" value=""><span class="cr"><i class="cr-icon" style="font-size: 18px;left: 0px"><b>✓</b></i></span>  <b>Automatically Topup my account every 30 days</b></label>
            </div>
        </div>
        </div>
    </fieldset>

    <fieldset class="scheduler-border" >
        <legend class="scheduler-border" style="color: grey;">Terms of Service</legend>
        <div class="col-sm-12">
    <div class="row" style="margin-top: 20px;">
        <div class="scroller" style="height: 150px; overflow-y: scroll; padding-top: 20px; border: 2px solid LightGray;border-radius: 1rem; width: 100%!important;">
            <div class="form-group">
                <p style="padding-left: 20px;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis bibendum sapien. Nulla gravida id arcu et tristique. In non tempor ligula, volutpat euismod ligula. Nullam ultricies, leo ut dapibus pellentesque, arcu lorem posuere elit, id facilisis ligula diam quis orci. Maecenas facilisis condimentum enim eu pretium. Maecenas suscipit porta laoreet. Morbi sollicitudin interdum ligula, sed auctor eros porttitor ac. Vivamus pretium nisi massa, volutpat faucibus enim varius vitae. Nunc pulvinar mollis dolor et commodo. Mauris rutrum porta lectus at venenatis. Sed ullamcorper commodo odio, et suscipit diam consequat vitae.

                    Donec placerat consectetur massa, egestas pharetra lectus vulputate in. Maecenas imperdiet varius nisl, eget convallis libero mollis eu. Integer arcu velit, iaculis ut nibh vitae, faucibus gravida urna. Ut fermentum ex mattis blandit vestibulum. Phasellus interdum purus sit amet mauris tincidunt lacinia. Curabitur vel ultricies odio. Proin mattis massa quis lorem placerat congue vitae quis enim. Phasellus egestas, erat a porttitor semper, augue augue laoreet lorem, a posuere turpis ligula eget ipsum. Donec est nunc, tristique vitae felis id, sodales mattis elit.

                    Phasellus ut libero eros. Ut ultrices sem eu nulla interdum pellentesque. Nulla pulvinar est iaculis risus sodales euismod eget in felis. Maecenas ac urna purus. Quisque ac commodo nunc. Donec ultricies nisi neque, quis ultricies ipsum molestie eget. Proin scelerisque nisi a ligula facilisis, nec mattis lacus aliquet. Mauris eu aliquam risus. Fusce eget ante sagittis justo consectetur interdum. Suspendisse potenti.
                </p>
            </div>
        </div>
    </div>
    <div class="row" style="margin-left: -10px;margin-top: 20px;">
            <div class="checkbox" style="color: #464a4c;">
                <label><input required id="atotopup2" name="atotopup2" ng-model="atotopup2" type="checkbox" value=""><span class="cr"><i class="cr-icon" style="font-size: 18px;left: 0px"><b>✓</b></i></span>  <b>I accept the terms of services</b></label>
            </div>
        </div>
    </div>
    </fieldset>
 

    </div> 
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 ">
            <div class="row" style="margin-top: 20px;">
            <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
            <button type="button" class="btn btn-success btn-previous btn-md" ng-click="back('stagePhone')"><i class="icnleft"></i>  Back</button>  
            </div>
            <div class="col-sm-6 col-md-6 col-xs-6 col-lg-6 form-group">
                <button style="float:right" type="button" style="float:right" class="btn btn-primary btn btn-success btn-previous btn-md" id="next5" ng-disabled="FormActivate.$pristine || FormActivate.$invalid"  ng-click="">Finish  </i></button>
            </div>
            </div>
            </div>




<hr />
@{{formParams.cardholder}}
</div>
<script>

</script>
<style type="text/css">
.scroller::-webkit-scrollbar {
    width: 20px;
    height: 18px;
}
.scroller::-webkit-scrollbar-thumb {
    height: 6px;
    border: 4px solid rgba(0, 0, 0, 0);
    background-clip: padding-box;
    -webkit-border-radius: 10px;
    background-color: rgba(0, 0, 0, 0.15);
    -webkit-box-shadow: inset -1px -1px 0px rgba(0, 0, 0, 0.05), inset 1px 1px 0px rgba(0, 0, 0, 0.05);
}
.scroller::-webkit-scrollbar-button {
    width: 0;
    height: 0;
    display: none;
}
.scroller::-webkit-scrollbar-corner {
    background-color: transparent;
}
</style>
@endsection
