@extends('layouts.mainlayout')
<style>
::-webkit-scrollbar {
    width: 20px;
    height: 18px;
}
::-webkit-scrollbar-thumb {
    height: 6px;
    border: 4px solid rgba(0, 0, 0, 0);
    background-clip: padding-box;
    -webkit-border-radius: 10px;
    background-color: rgba(0, 0, 0, 0.15);
    -webkit-box-shadow: inset -1px -1px 0px rgba(0, 0, 0, 0.05), inset 1px 1px 0px rgba(0, 0, 0, 0.05);
}
::-webkit-scrollbar-button {
    width: 0;
    height: 0;
    display: none;
}
::-webkit-scrollbar-corner {
    background-color: transparent;
}
</style>
@section('content')
<section class="jumbotron text-center">
<div class="container">
<h1 class="jumbotron-heading">Select Your #</h1>
<h5>Please select the phone number that you wish to use below</h5>
</div>
</section>
<div class="container-triangle"></div>
<div class="contentcontain">
<div class="container center_div"  style="max-width: 700px!important;">
    <div class="form-group"></div>
    <div class="form-group">
        <div class="col-sm-12">
        <div class="row">
        <div class="col-sm-4 form-group">
        <select class="form-control" id="sel1">
            <option value="" disabled selected>Province</option>
        </select>
        </div>
        <div class="col-sm-4 form-group">
        <select class="form-control" id="sel2">
            <option value="" disabled selected>City</option>
        </select>
        </div>
        <div class="col-sm-4 form-group">
        <select class="form-control" id="sel3">
            <option value="" disabled selected>Area code</option>
        </select>
        </div>
        </div>
        </div>
    </div> 
    <div class="col-sm-12">
    <div class="row" style="margin-top: 20px;">
        <div class="scroller" style="height: 300px; overflow-y: scroll; padding-top: 20px; border: 2px solid LightGray;border-radius: 1rem; width: 100%!important;">
            <div class="form-group">
                <ul style="list-style-type: none;margin-left: -20;">
                    <li><label class="radio-inline"><input type="radio" checked="checked" name="phonenum" /> 416-800-0001</label></li>
                    <li><label class="radio-inline"><input type="radio" name="phonenum" />  416-800-0002</label></li>
                    <li><label class="radio-inline"><input type="radio" name="phonenum" />  416-800-0003</label></li>
                    <li><label class="radio-inline"><input type="radio" name="phonenum" />  416-800-0004</label></li>
                    <li><label class="radio-inline"><input type="radio" name="phonenum" />  416-800-0005</label></li>
                    <li><label class="radio-inline"><input type="radio" name="phonenum" />  416-800-0006</label></li>
                    <li><label class="radio-inline"><input type="radio" name="phonenum" />  416-800-0007</label></li>
                    <li><label class="radio-inline"><input type="radio" name="phonenum" />  416-800-0008</label></li>
                    <li><label class="radio-inline"><input type="radio" name="phonenum" />  416-800-0009</label></li>
                    <li><label class="radio-inline"><input type="radio" name="phonenum" />  416-800-0010</label></li>
                    <li><label class="radio-inline"><input type="radio" name="phonenum" />  416-800-0011</label></li>

                </ul>
            </div>
        </div>
    </div>
    </div>
    <div class="row" style="margin-top: 20px;">
                            <div class="col-sm-9 form-group">
                                 <button type="button" class="btn btn-success btn-previous" id="Previous"><i class="icnleft"></i> Back</button>
                            </div>      
                            <div class="col-sm-3 form-group">
                                 <button type="button" class="btn btn-success btn-next" style="float: right;" id="Next">Next <i class="icnright"></i></button>
                            </div>  
    </div>  
</div>
</div>

<script>

</script>

@endsection
