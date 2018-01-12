@extends('layouts.mainlayout')
<?php
//define('ROOTUP', realpath(__DIR__ . '/public/moneris/lib/') . DS);
require '/var/www/vhosts/localhost.localdomain/httpdocs/Apps/Sales00/public/moneris/lib/Moneris.php';

$errors = array();

if (! empty($_POST)) {
    // use the testing server for the demo:
    $moneris = Moneris::create(
        array(
            'api_key' => 'yesguy', // Under Admin / Store Settings
            'store_id' => 'store1',
            'environment' => Moneris::ENV_STAGING
        )
    );

    try {

        // try to make the purchase:
        $result = $moneris->purchase($_POST);

        if ($result->was_successful()) {
            // display transaction ID
            /*$transaction = $moneris->void($result->transaction());
            echo "Transaction ID: ".$transaction;*/

            // hooray!
            exit("transaction was successful");

        } else {

            exit();

        }

    } catch (Moneris_Exception $e) {
        $errors[] = $e->getMessage();
    }
}
?>
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
<script>

        function doMonerisSubmit()
        {
            var monFrameRef = document.getElementById('monerisFrame').contentWindow;
            monFrameRef.postMessage('','https://esqa.moneris.com/HPPtoken/index.php');
            return false;
        }

        var respMsg = function(e)
        {
            var respData = eval("(" + e.data + ")");
            document.getElementById("monerisResponse").innerHTML = e.origin + " SENT " + " - " + respData.responseCode + "-" + respData.dataKey + "-" + respData.errorMessage;

            if (respData.dataKey) {
                document.getElementById('data_key').value = respData.dataKey;
                document.getElementById('form').submit();
            }

        }

        window.onload = function()
        {
            if (window.addEventListener)
            {
                window.addEventListener ("message", respMsg, false);
            }
            else
            {
                if (window.attachEvent)
                {
                    window.attachEvent("onmessage", respMsg);
                }
            }
        }
    </script>
@section('content')
<section class="jumbotron text-center">
<div class="container">
<h1 class="jumbotron-heading">Billing Details</h1>
</div>
</section>
<div class="container center_div">
<div id=monerisResponse></div>

<!-- Get token under Admin / Hosted Tokenization (domain must match URL where iFrame will be located) -->
<iframe id=monerisFrame src="https://esqa.moneris.com/HPPtoken/index.php?id=htFQK4LT37LV76Q&css_body=background:white;&css_textbox=border-width:2px;&css_textbox_pan=width:140px;&display_labels=1&enable_exp=1&css_textbox_exp=width:40px;&enable_cvd=1&css_textbox_cvd=width:40px" frameborder='0' width="200" height="120"></iframe>

<form method="post" id="form">
    <p><input name="amount" type="text" placeholder="Amount" required></p>
    <p><input name="order_id" type="text" placeholder="Order ID" required></p>
    <p><input name="data_key" id="data_key" type="text" placeholder="Data key" readonly></p>
</form>

<input type=button onClick=doMonerisSubmit() value="submit iframe">


<form>
    <fieldset class="scheduler-border" style="padding-top: 20px!important;">
        <legend class="scheduler-border" style="color: grey;">Total Due Today</legend>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4">
                    &nbsp;
                </div>
                <div class="col-sm-6">
                    <span id="planname" style="font-weight: bold;float: right;" >Talk, Text and Surf</span>
                </div>
                <div class="col-sm-2">
                    <span id="planprice" >69$</span>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4">
                    &nbsp;
                </div>
                <div class="col-sm-6">
                    <span id="taxes" style="font-weight: bold;float: right;" >Taxes</span>
                </div>
                <div class="col-sm-2">
                    <span id="taxesprice" >10$</span>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4">
                    &nbsp;
                </div>
                <div class="col-sm-6">
                    <span id="total" style="font-weight: bold;float: right;" >Total</span>
                </div>
                <div class="col-sm-2">
                    <span id="totalprice" >79$</span>
                </div>
            </div>
        </div>
        <hr />
        <div id="creditcard" style="margin-top: 20px;" >
        <div class="form-group">
            <input type="text" class="form-control" id="cardholder" placeholder="Cardholder Name">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" id="cardnumber" placeholder="Card Number">
        </div>
         <div class="row">
                            <div class="col-sm-3 form-group">
                                <input type="text" placeholder="Exp Mth" class="form-control">
                            </div>  
                            <div class="col-sm-3 form-group">
                                <input type="text" placeholder="Exp Year" class="form-control">
                            </div>  
                            <div class="col-sm-3 form-group">
                                 <input type="text" placeholder="CVV" class="form-control">
                            </div>   
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
                <label><input id="atotopup" name="atotopup" type="checkbox" value=""><span class="cr"><i class="cr-icon" style="font-size: 18px;left: 0px"><b>✓</b></i></span>  <b>Automatically Topup my account every 30 days</b></label>
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
                <label><input id="atotopup" name="atotopup" type="checkbox" value=""><span class="cr"><i class="cr-icon" style="font-size: 18px;left: 0px"><b>✓</b></i></span>  <b>I accept the terms of services</b></label>
            </div>
        </div>
    </div>
    </fieldset>
    <div class="row" style="margin-top: 20px;">
                            <div class="col-sm-9 form-group">
                                 <button type="button" class="btn btn-success btn-previous" id="Previous"><i class="icnleft"></i> Back</button>
                            </div>      
                            <div class="col-sm-3 form-group">
                                 <button type="button" class="btn btn-success btn-next" style="float: right;" id="Next">Finish</button>
                            </div>  
    </div>  
</form>
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
