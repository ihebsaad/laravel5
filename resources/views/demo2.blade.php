@extends('layouts.asklayout')


@section('content')

<section class="jumbotron text-center">
<div class="container">
<h1 class="jumbotron-heading">I AM ...</h1>
</div>
</section>
<div class="container-triangle"></div>
<div class="contentcontain">
<div class="container center_div"  style="max-width: 495px!important;">
<!--<div class="row">
<div class="form-group col-xs-5 col-lg-offset-5" style="text-align: center;">
		<input type="text" class="form-control form-rounded" placeholder="Your PIN" />
		<button type="button" class="btn btn-primary btn-round">Continue</button>

</div>
</div>
</div>-->
 <form name="customertype_form" id='customertype_form' class="form-inline">
        <div class="row">
            <ol id="selectable">
                <li class="ui-state-default"><h5>A New Customer</h5><p>I've never done business with Ice Wirless before</p></li>
                <li class="ui-state-default"><h5>A Existing Customer</h5><p>I have an account with Ice Wirless </p></li>
            </ol>   
        </div>
 </form>
 
</div>
</div>
@endsection
