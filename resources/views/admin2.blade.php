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
<!--<form enctype="multipart/form-data" id="upload_form" action="/activate/upload/" role="form" method="post">
    <input  type="file" name="uploadedfile" class="form-control" id="uploadedfile"/>
	 <div class="row" style="margin-left: 15px;">
    <input id="button1" type="button" value="Upload" />
	<progress value="2" max="100" id="progress1"></progress>
	</div>
</form>-->
<?php

print_r($_POST);
print_r($_FILES);
?>

<!--<form id="data" method="post" enctype="multipart/form-data">
    <input type="text" id="first" name="first" value="Bob" />
    <input type="text" name="middle" value="James" />
    <input type="text" name="last" value="Smith" />
    <input name="uploadedfile" id="uploadedfile" type="file" />
    <button>Submit</button>
</form>-->
<form enctype="multipart/form-data" method="post" name="fileinfo">
  <label>Votre adresse électronique :</label>
  <input type="email" autocomplete="on" autofocus name="userid" placeholder="email" required size="32" maxlength="64" /><br />
  <label>Étiquette du fichier personnalisé :</label>
  <input type="text" name="filelabel" size="12" maxlength="32" /><br />
  <label>Fichier à mettre de côté :</label>
  <input type="file" name="file" required />
  <input type="submit" value="Mettez le fichier de côté." />
</form>
<div></div>
</body>

  <script>
  var form = document.forms.namedItem("fileinfo");
form.addEventListener('submit', function(ev) {

  var oOutput = document.querySelector("div"),
      oData = new FormData(form);

  oData.append("CustomField", "Données supplémentaires");

  var oReq = new XMLHttpRequest();
  oReq.open("POST", "http://test.enterpriseesolutions.com/activate/upload/", true);
  oReq.onload = function(oEvent) {
    if (oReq.status == 200) {
      oOutput.innerHTML = "Envoyé !";
    } else {
      oOutput.innerHTML = "Erreur " + oReq.status + " lors de la tentative d’envoi du fichier.<br \/>";
    }
  };

  oReq.send(oData);
  ev.preventDefault();
}, false);
  /*$("form#data").submit(function(e) {
    e.preventDefault();    
  //  var formData = new FormData(this);
    var formData =  new FormData($("#form") [0] );
	
console.log('data to send'+JSON.stringify(formData));
formData.append('defect_type', 'type');
//console.log('formData'+formData);
console.log('data to send'+JSON.stringify(formData));
    $.ajax({
        url: "http://test.enterpriseesolutions.com/activate/upload/",
        type: 'POST',
        data: formData,
        success: function (data) {
            alert(data)
        },
        cache: false,
        contentType: false,
        processData: false,
		 success:function(data){
 //alert(data);
                console.log("success");
                console.log(data);
            },
            error: function(data){
                console.log("error");
				//alert(data);
                console.log('data='+data);
			//	 var parsedData = JSON.parse(data.responseText);
		console.log('parsedData1'+data.responseText);
		//console.log('parsedData2'+data.description);

            }
    });
});
 */
 /* $('#button1').on('click', function() {
console.log(new FormData($("#upload_form")[0]));
    $.ajax({
          url: 'http://test.enterpriseesolutions.com/activate/upload/',
        type: 'POST',

        // Form data
  data:new FormData($("#upload_form")[0]),
       /// data: new FormData($('#formupload1')),

        // Tell jQuery not to process data or worry about content-type
        // You *must* include these options!
      
      async:false,
       processData: false,
      contentType: false,
 success:function(data){
 //alert(data);
                console.log("success");
               // console.log(data);
            },
            error: function(data){
                console.log("error");
				//alert(data);
                console.log('data='+data);
			//	 var parsedData = JSON.parse(data.responseText);
		console.log('parsedData1'+data.responseText);
		//console.log('parsedData2'+data.description);

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
});*/

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