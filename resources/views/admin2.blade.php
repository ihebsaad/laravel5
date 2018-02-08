<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">  
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
  <!--<link rel="stylesheet" href="public/css/style.css">-->
   <script  src="public/js/jquery-3.2.1.min.js" type="text/javascript"> </script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular-animate.min.js'></script>
</head>

<body>
<?php
$curlp = curl_init();

curl_setopt_array($curlp, array(
  CURLOPT_URL => "https://gqnchpomjprsrfglg-mock.stoplight-proxy.io/plans",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "{}"
));

$responsep = curl_exec($curlp);
$errp = curl_error($curlp);

curl_close($curlp);

if ($errp) {
  echo "cURL Error #:" . $errp;
} else {
 // echo $response;
  $obj = json_decode($responsep);
  $arrayPlans = array();

foreach($obj->plans as $plan){
	echo $plan->planCode;
	array_push($arrayPlans,$plan->planCode);
}} ?>
<button onclick="downloadtemplate();" id="btndownloadtemplate">Download csv template</button>

<input id="sortpicture" type="file" name="sortpic" />
<button id="upload">Upload</button>
<!--<progress value="2" max="100" id="progress1"></progress>-->

<div id="delete_sims" class="tab-pane active in">
                                            <div class="row" style="margin-top: 20px;">
                                                <div class="form-group col-xs-12">
                                                    <p>To delete SIMs, please enter the range of SIMs you wish to delete:</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                    <input ng-model="formParams.startsim" type="number" name="startsim" ng-pattern="/^[0-9]*$/" placeholder="Start SIM #" ng-minlength="1" id="startsim" class="form-control">
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <input ng-model="formParams.endsim" type="number" name="endsim" ng-pattern="/^[0-9]*$/" placeholder="End SIM #" ng-minlength="1" id="endsim" class="form-control">
                                                </div>  
                                                <div class="col-sm-4 form-group">
                                                    <button type="button" onclick="deleteRange();" class="btn btn-primary " style="height:35px!important;float: right!important;line-height:0px!important;">Delete</button>
                                                </div>      
                                            </div>
                                        </div>


<div class="row">
                                                <div class="col-sm-8 form-group">
                                                    <div class=" scroller  " style="height: 200px; overflow-y: scroll; padding-top: 20px; border: 2px solid LightGray;border-radius: 1rem; width: 100%!important;">
                                                        <ul class="radionc">
														
                                                            <li>
                                                                <input type="checkbox" value="ICENP_PIA15" name="radio1" id="radio1">
                                                                <label for="radio1">Talk, Text, Surf $49</label>
                                                            </li>
															
															
                                                            <li>
                                                                <input type="checkbox" value="ICENP_PIA25" name="radio2" id="radio2">
                                                                <label for="radio2">Talk, Text, Surf $59</label>
                                                            </li>
                                                            <li>
                                                                <input type="checkbox" value="ICENP_PIA35" name="radio3" id="radio3">
                                                                <label for="radio3">Talk, Text, Surf $69</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div> 
                                                <div class="col-sm-4 form-group">
                                                    <button type="button" onclick="assignRange();" class="btn btn-primary " style="height:35px!important;float: right!important;line-height:0px!important;">Assign</button>
                                                </div> 
                                                
                                            </div>
</body>

  <script>
   function assignRange(){
	  start=document.getElementById('startsim').value;
	  end=document.getElementById('endsim').value;
	    if (end < start){
		  alert('Incorrect range!');		  
	  }
   else{
	   var plans = [];
	   if (document.getElementById('radio1').checked){plans.push(document.getElementById('radio1').value);}
	   if (document.getElementById('radio2').checked){plans.push(document.getElementById('radio2').value);}
	   if (document.getElementById('radio3').checked){plans.push(document.getElementById('radio3').value);}
	
	 if (plans.length==0){console.log('delete');
	 	   	 	 var setting2 = {
  "async": true,
  "crossDomain": true,
  "url": "http://test.enterpriseesolutions.com/admin/deleterange/"+start+'/'+end,
  "method": "GET",
  "headers": {
     'Access-Control-Allow-Origin': '*'
  },
  "processData": false 
 
  }
  
   
$.ajax(setting2).done(function (response) {
	alert('done' + response);
});

$.ajax(setting2).fail(function (response) {
	alert('fail'+ response);
});
	 
	 
	 
	 }
	 else{
		 selectedplans=plans.toString();
		 console.log('insert or update');
		 	 	 var setting = {
  "async": true,
  "crossDomain": true,
  "url": "http://test.enterpriseesolutions.com/admin/insertOrUpdate/"+start+'/'+end+'/'+selectedplans,
  "method": "GET",
  "headers": {
     'Access-Control-Allow-Origin': '*'
  },
  "processData": false 
 
  }
  
   
$.ajax(setting).done(function (response) {
	alert('done' + response);
});

$.ajax(setting).fail(function (response) {
	alert('fail'+ response);
});
	 }

	 
   }}
  function deleteRange(){
	  start=document.getElementById('startsim').value;
	  end=document.getElementById('endsim').value;
	    if (end < start){
		  alert('Incorrect range!');		  
	  }
	  else{
		   	 	 var setting = {
  "async": true,
  "crossDomain": true,
  "url": "http://test.enterpriseesolutions.com/admin/delete/"+start+'/'+end,
  "method": "GET",
  "headers": {
     'Access-Control-Allow-Origin': '*'
  },
  "processData": false 
 
  }
  
   
$.ajax(setting).done(function (response) {
	alert('done' + response);
});

$.ajax(setting).fail(function (response) {
	alert('fail'+ response);
});
	  }
	  
  }
  $('#upload').on('click', function() {
    var file_data = $('#sortpicture').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
	var newURL = window.location.protocol + "//" + window.location.host;
    if(newURL=="http://127.0.0.1"){
		url="http://127.0.0.1/laravel5/public/upload.php";		
	}
	else{
		url="http://test.enterpriseesolutions.com/public/upload.php";
}

    //alert(form_data);                             
    $.ajax({
               // url: 'http://test.enterpriseesolutions.com/public/upload.php', // point to server-side PHP script 
               url: url, // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(response){
                    alert('uploaded'); // display response from the PHP script, if any
					console.log(response);
					if (response.indexOf('Incorrect delimeter!') > -1){alert('Incorrect delimeter!');}
					else if (response.indexOf('Incorrect headers!') > -1){alert('Incorrect headers!');}
				   else if ( ((response.indexOf('Incorrect delimeter!') > -1)) 
					   || ((response.indexOf('Failed') > -1))
				       || ((response.indexOf('empty') > -1)) 
					   || ((response.indexOf('non-existent') > -1)) 
				       || ((response.indexOf('without') > -1))      )
				   {
					alert('Completed with errors');
				    }
				   else{
					alert('Completed successfully');
				}
				//	console.log( ' response json'+JSON.parse(JSON.stringify(response)));
			
                },fail: function(error){
                    alert(error); // display response from the PHP script, if any
                }/*,
        // Custom XMLHttpRequest
        xhr: function() {
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) {
                // For handling the progress of the upload
                myXhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                        $('#progress1').attr({
                            value: e.loaded,
                            max: e.total,
                        });
                    }
                } , false);
            }
            return myXhr;
        }*/
     });
});

 

   function downloadtemplate() {


	var settings = {
  "async": true,
  "crossDomain": true,
  "url": "http://test.enterpriseesolutions.com/downloadtemplate",
  "method": "POST",
  "processData": false }


$.ajax(settings).done(function (response) {console.log(response);
  window.location ="http://test.enterpriseesolutions.com/downloadtemplate";})
$.ajax(settings).fail(function (response) {console.log(response);})
;  

    }
   </script>