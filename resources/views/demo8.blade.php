@extends('layouts.mainlayout')
<style>
fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
            border-radius: 1rem;
}

    legend.scheduler-border {
        font-size: 1em !important;
        text-align: left !important;
        width:auto;
        padding:0 10px;
        border-bottom:none;
    }
</style>
@section('content')
<section class="jumbotron text-center">
<div class="container">
<h1 class="jumbotron-heading">Billing Details</h1>
</div>
</section>
<div class="container center_div">
<form>
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">Total Due Today</legend>
        <div class="control-group">
            <label class="control-label input-label" for="startTime">Start :</label>
            <div class="controls bootstrap-timepicker">
                <input type="text" class="datetime" type="text" id="startTime" name="startTime" placeholder="Start Time" />
                <i class="icon-time"></i>
            </div>
        </div>
    </fieldset>
</form>
</div>
<script>

</script>

@endsection
