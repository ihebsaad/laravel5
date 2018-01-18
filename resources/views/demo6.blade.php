@extends('layouts.asklayout')
<style type="text/css">
	
  #selectable {width: 850px!important; }
  #selectable li { width: 230px!important; height: 200px!important; padding-top: 20px!important;}
</style>

@section('content')

<section class="jumbotron text-center">
<div class="container">
<h1 class="jumbotron-heading">Select your plan</h1>
<h5>Please select the plan that you wish to use below</h5>
</div>
</section>
<div class="container-triangle"></div>
<div class="contentcontain">
<div class="container center_div" style="max-width: 750px!important;">
 <form name="selectplan_form" id='selectplan_form' class="form-inline">
        <div class="row" style="margin-top: 65px!important;">
            <ol id="selectable">
                <li class="ui-state-default"><h5>Talk, Text and Surf</h5><p>49$ / mth</br>Unlimited Local Calling</br>Unlimited Local Text</br>1 GB Data</p></li>
                <li class="ui-state-default"><h5>Talk, Text and Surf</h5><p>59$ / mth</br>Unlimited Canada Calling</br>Unlimited Canada Text</br>2 GB Data</p></li>
                <li class="ui-state-default"><h5>Talk, Text and Surf</h5><p>69$ / mth</br>Unlimited Canada/US Calling</br>Unlimited Canada/US Text</br>2 GB Data</p></li>
            </ol> 
        </div>
</div>
         <div class="container center_div" style="max-width: 750px!important;margin-top: 65px!important;">
            <!--<div class="col-sm-9 form-group">
                <button type="button" class="btn btn-success btn-previous" id="Previous"><i class="icnleft"></i> Previous</button>
            </div>      
                <div class="text-right"><button type="button" class="btn btn-success btn-next text-right" style="float: right!important; margin-right: -155px!important;" id="Next">Next <i class="icnright"></i></button></div>-->
             <div class="row" style="margin-top: 20px;">
                            <div class="col-sm-9 form-group">
                                 <button type="button" class="btn btn-success btn-previous" id="Previous"><i class="icnleft"></i> Back</button>
                            </div>      
                            <div class="col-sm-3 form-group">
                                 <button type="button" class="btn btn-success btn-next" style="float: right;" id="Next">Next <i class="icnright"></i></button>
                            </div>  
             </div>	 
         </div>                    
      
 </form>
</div>
</div>
@endsection
