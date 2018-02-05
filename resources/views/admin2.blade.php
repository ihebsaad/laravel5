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

<input id="sortpicture" type="file" name="sortpic" />
<button id="upload">Upload</button>
<progress value="2" max="100" id="progress1"></progress>
</body>

  <script>
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
        }
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