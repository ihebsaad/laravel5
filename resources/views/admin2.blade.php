<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">  
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
  <!--<link rel="stylesheet" href="../public/css/style.css">-->
   <script  src="../public/js/jquery-3.2.1.min.js" type="text/javascript"> </script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular-animate.min.js'></script>
</head>

<body>
<button onclick="downloadtemplate();" id="btndownloadtemplate">Download csv template</button>
<form enctype="multipart/form-data" action="/upload/image" id="fdownloadcsv" method="post">
    <input id="uploadedfile" type="file" />
	 <div class="row" style="margin-left: 15px;">
    <input id="button1" type="button" value="Upload" />
	<progress value="2" max="100" id="progress1"></progress><img id="plus1" onclick="show();" src="/img/add.png" style="width: 20px;margin-left: 20px;    margin-bottom: 10px;" />
</div>
</form>
</body>
    
  <script>
  $('#button1').on('click', function() {

    $.ajax({
        // Your server script to process the upload
		//idi=document.getElementById('').value;
        url: '/documents/upload/'+idi,
        type: 'POST',

        // Form data
  data: new FormData($('#fdownloadcsv')),
       /// data: new FormData($('#formupload1')),

        // Tell jQuery not to process data or worry about content-type
        // You *must* include these options!
        cache: false,
        contentType: false,
        processData: false,
 success:function(data){
 //alert(data);
                console.log("success");
               // console.log(data);
            },
            error: function(data){
                console.log("error");
				//alert(data);
               // console.log(data);
            },
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
        },
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