@extends('layouts.newaccountlayout')

@section('content')
<section class="jumbotron text-center">
<div class="container">
<h1 class="jumbotron-heading">Account Info</h1>
<h5>Please provide the details below to in order to create your new account</h5>
</div>
</section>
<div class="container center_div">
    <div class="col-lg-12 well">
    <div class="row">
                <form>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <input type="text" placeholder="First Name" class="form-control">
                            </div>
                            <div class="col-sm-6 form-group">
                                <input type="text" placeholder="Last Name" class="form-control">
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <input type="text" placeholder="Street #" class="form-control">
                            </div>      
                            <div class="col-sm-8 form-group">
                                <input type="text" placeholder="Street Name" class="form-control">
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <input type="text" placeholder="Unit #" class="form-control">
                            </div>  
                            <div class="col-sm-4 form-group">
                                <input type="text" placeholder="PO BOX" class="form-control">
                            </div>  
                            <div class="col-sm-4 form-group">
                                <input type="text" placeholder="Postal Code" class="form-control">
                            </div>      
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <input type="text" placeholder="City" class="form-control">
                            </div>      
                            <div class="col-sm-6 form-group">
                                <input type="text" placeholder="Province" class="form-control">
                            </div>  
                        </div>
                            
                    <div class="form-group">
                        <input type="text" placeholder="Email Address" class="form-control">
                    </div>  
                     <div class="row" style="margin-bottom: 20px;">
                         <div class="col-sm-6 form-group" style="margin-top: 20px!important;">
                             <input id="password" type="password" class="form-control ex-input" placeholder="Password" /></br>
                             <input id="confirm_password" type="password" class="form-control ex-input" placeholder="Re-Type Password" />
                             <span id='message' style="font-size: 12px;float:right;"></span>
                         </div>
                         <div class="col-sm-6 form-group" >
                             <div class="wrapper" style="margin: 0px!important;">
                                <div class="popover right show">
                                    <div class="arrow"></div>
                                    <div class="popover-content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
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
    </div>
</div>
<script>


</script>

@endsection
