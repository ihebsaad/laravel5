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

</body>
    
  <script>
   function downloadtemplate() {
data="";
var xhr = new XMLHttpRequest();
xhr.withCredentials = true;

xhr.addEventListener("readystatechange", function () {
  if (this.readyState === this.DONE) {
    console.log(this.responseText);
  }
});

xhr.open("POST", "http://test.enterpriseesolutions.com/downloadtemplate");


xhr.send(data);
	 /*
  type: "PATCH",
  url: "http://test.enterpriseesolutions.com/downloadtemplate",
  headers: {
                    'Access-Control-Allow-Origin': '*'
                },
  data: "{}"
}).done(function( output ) {
 // alert( "Data Saved: " + msg );
     document.location.href =(output.url);
}).fail(function( msg ) {
  alert( "Template uploaded only in server " + msg );*/
  

    }
   </script>