@extends('layouts.master')

@section('content')
<?php 
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Authorization");
    header("Access-Control-Allow-Methods: GET,HEAD,PUT,PATCH,POST,DELETE");

    print_r(session()->all()) ;
 
 ?>
 @if (Auth::check())
                  <?php \Log::debug('logged  2'. Auth::user()->name ); ?>    
                    @endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
email<input id="email" type="email"></input>
password<input id="password" type="password"></input>
<button onclick="login();">Login</button>



<script>
function login(){
	var datatosend="{\"grant_type\":\"password\",\"username\": \"myaccount3\",\"password\": \"mypassword\",\"audience\": \"https://raniasaad.eu.auth0.com/api/v2/\", \"scope\": \"openid\", \"client_id\": \"JBL90aJJc4ZG7DxcIfITrYB-UrjbvY_u\", \"client_secret\": \"XugxD0AsEQpw5pwatO6kPjXouUPdBfuumztpf3p6LllTAR27JTzLvhhEcaEkQrla\"}";
	console.log(datatosend);
var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://raniasaad.eu.auth0.com/oauth/token",
  "method": "POST",
  "headers": {
    "content-type": "application/json"
  },
  "processData": false,
  "data": datatosend
}


$.ajax(settings).done(function (response) {
  console.log(response);
});

}
</script>
 <?php
 

$curl = curl_init();

  curl_setopt_array($curl, array(
  CURLOPT_URL => "https://raniasaad.eu.auth0.com/authorize?response_type=code&client_id=JBL90aJJc4ZG7DxcIfITrYB-UrjbvY_u&connection=databaseserver&redirect_uri=http://127.0.0.1/simslaravel/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "{}",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6Ik4wWkRPVEZFT0RreE1qQTBOak00UmtaRU5UQXdRVVV6T1RRNU5FUkNOelU0UkRJME1VUTBNdyJ9.eyJpc3MiOiJodHRwczovL3Jhbmlhc2FhZC5ldS5hdXRoMC5jb20vIiwic3ViIjoiTjIydkxrdmtjcUZYajdqTWphaUpDbk1SUVhzcHFsaU1AY2xpZW50cyIsImF1ZCI6Imh0dHBzOi8vcmFuaWFzYWFkLmV1LmF1dGgwLmNvbS9hcGkvdjIvIiwiaWF0IjoxNTE1MTM4NzQ4LCJleHAiOjE1MTUyMjUxNDgsInNjb3BlIjoicmVhZDpjbGllbnRfZ3JhbnRzIGNyZWF0ZTpjbGllbnRfZ3JhbnRzIGRlbGV0ZTpjbGllbnRfZ3JhbnRzIHVwZGF0ZTpjbGllbnRfZ3JhbnRzIHJlYWQ6dXNlcnMgdXBkYXRlOnVzZXJzIGRlbGV0ZTp1c2VycyBjcmVhdGU6dXNlcnMgcmVhZDp1c2Vyc19hcHBfbWV0YWRhdGEgdXBkYXRlOnVzZXJzX2FwcF9tZXRhZGF0YSBkZWxldGU6dXNlcnNfYXBwX21ldGFkYXRhIGNyZWF0ZTp1c2Vyc19hcHBfbWV0YWRhdGEgY3JlYXRlOnVzZXJfdGlja2V0cyByZWFkOmNsaWVudHMgdXBkYXRlOmNsaWVudHMgZGVsZXRlOmNsaWVudHMgY3JlYXRlOmNsaWVudHMgcmVhZDpjbGllbnRfa2V5cyB1cGRhdGU6Y2xpZW50X2tleXMgZGVsZXRlOmNsaWVudF9rZXlzIGNyZWF0ZTpjbGllbnRfa2V5cyByZWFkOmNvbm5lY3Rpb25zIHVwZGF0ZTpjb25uZWN0aW9ucyBkZWxldGU6Y29ubmVjdGlvbnMgY3JlYXRlOmNvbm5lY3Rpb25zIHJlYWQ6cmVzb3VyY2Vfc2VydmVycyB1cGRhdGU6cmVzb3VyY2Vfc2VydmVycyBkZWxldGU6cmVzb3VyY2Vfc2VydmVycyBjcmVhdGU6cmVzb3VyY2Vfc2VydmVycyByZWFkOmRldmljZV9jcmVkZW50aWFscyB1cGRhdGU6ZGV2aWNlX2NyZWRlbnRpYWxzIGRlbGV0ZTpkZXZpY2VfY3JlZGVudGlhbHMgY3JlYXRlOmRldmljZV9jcmVkZW50aWFscyByZWFkOnJ1bGVzIHVwZGF0ZTpydWxlcyBkZWxldGU6cnVsZXMgY3JlYXRlOnJ1bGVzIHJlYWQ6cnVsZXNfY29uZmlncyB1cGRhdGU6cnVsZXNfY29uZmlncyBkZWxldGU6cnVsZXNfY29uZmlncyByZWFkOmVtYWlsX3Byb3ZpZGVyIHVwZGF0ZTplbWFpbF9wcm92aWRlciBkZWxldGU6ZW1haWxfcHJvdmlkZXIgY3JlYXRlOmVtYWlsX3Byb3ZpZGVyIGJsYWNrbGlzdDp0b2tlbnMgcmVhZDpzdGF0cyByZWFkOnRlbmFudF9zZXR0aW5ncyB1cGRhdGU6dGVuYW50X3NldHRpbmdzIHJlYWQ6bG9ncyByZWFkOnNoaWVsZHMgY3JlYXRlOnNoaWVsZHMgZGVsZXRlOnNoaWVsZHMgdXBkYXRlOnRyaWdnZXJzIHJlYWQ6dHJpZ2dlcnMgcmVhZDpncmFudHMgZGVsZXRlOmdyYW50cyByZWFkOmd1YXJkaWFuX2ZhY3RvcnMgdXBkYXRlOmd1YXJkaWFuX2ZhY3RvcnMgcmVhZDpndWFyZGlhbl9lbnJvbGxtZW50cyBkZWxldGU6Z3VhcmRpYW5fZW5yb2xsbWVudHMgY3JlYXRlOmd1YXJkaWFuX2Vucm9sbG1lbnRfdGlja2V0cyByZWFkOnVzZXJfaWRwX3Rva2VucyBjcmVhdGU6cGFzc3dvcmRzX2NoZWNraW5nX2pvYiBkZWxldGU6cGFzc3dvcmRzX2NoZWNraW5nX2pvYiByZWFkOmN1c3RvbV9kb21haW5zIGRlbGV0ZTpjdXN0b21fZG9tYWlucyBjcmVhdGU6Y3VzdG9tX2RvbWFpbnMgcmVhZDplbWFpbF90ZW1wbGF0ZXMgY3JlYXRlOmVtYWlsX3RlbXBsYXRlcyB1cGRhdGU6ZW1haWxfdGVtcGxhdGVzIiwiZ3R5IjoiY2xpZW50LWNyZWRlbnRpYWxzIn0.RhHY2wH1d9pMdX7RzSXIDKE6C1HUHAiLz32uxWRSEoe_1rcgLI8_T3Mj5-gutatsT3aMxEyKOwZ3nMzGIsn112pG-xziOC4Re1pTqRdsaLPALL1m5BFYxxX4AxLH2b2iCRCrxYHIjcJADraYkzkJ2_ZEF-b1atTc67kJReu9o03goZKVIodyIQfNtxY4FBWb-zZVWPpJxFxJW4wup-e3Jajq4jdQ031emJ0GXM6HWDQy1tIi-DsDCTzMEBpUHW4Tzdz6VBVu8fwkM8Nemfkb1kfAzr5_AN1jumT1q43XTsUZShQX0iQ1B5nZ88SN6xH6O9qxDNNG9jR8HGO_8B2kuw"

  ),
));


$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "     cURL Error authorize#:" . $err;
} else {
  echo '    response authorize   '.$response.'***';
}

$curl5 = curl_init();

curl_setopt_array($curl5, array(
  CURLOPT_URL => "https://raniasaad.eu.auth0.com/userinfo",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "{}",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6Ik4wWkRPVEZFT0RreE1qQTBOak00UmtaRU5UQXdRVVV6T1RRNU5FUkNOelU0UkRJME1VUTBNdyJ9.eyJpc3MiOiJodHRwczovL3Jhbmlhc2FhZC5ldS5hdXRoMC5jb20vIiwic3ViIjoiYXV0aDB8NWE1MzJkZTBjYjI2MzI1MmQ5YmJmNGY4IiwiYXVkIjpbImh0dHBzOi8vcmFuaWFzYWFkLmV1LmF1dGgwLmNvbS9hcGkvdjIvIiwiaHR0cHM6Ly9yYW5pYXNhYWQuZXUuYXV0aDAuY29tL3VzZXJpbmZvIl0sImlhdCI6MTUxNTQ5NDU1NiwiZXhwIjoxNTE1NTgwOTU2LCJhenAiOiJKQkw5MGFKSmM0Wkc3RHhjSWZJVHJZQi1VcmpidllfdSIsInNjb3BlIjoib3BlbmlkIGVtYWlsIHJlYWQ6Y3VycmVudF91c2VyIHVwZGF0ZTpjdXJyZW50X3VzZXJfbWV0YWRhdGEgZGVsZXRlOmN1cnJlbnRfdXNlcl9tZXRhZGF0YSBjcmVhdGU6Y3VycmVudF91c2VyX21ldGFkYXRhIGNyZWF0ZTpjdXJyZW50X3VzZXJfZGV2aWNlX2NyZWRlbnRpYWxzIGRlbGV0ZTpjdXJyZW50X3VzZXJfZGV2aWNlX2NyZWRlbnRpYWxzIHVwZGF0ZTpjdXJyZW50X3VzZXJfaWRlbnRpdGllcyIsImd0eSI6InBhc3N3b3JkIn0.B1qfcGyqVpcNwIwNp5bS66EstSNucDmRS8chtYtJmVWUZosU5eCKNyIYmx37QlnWPwpIvxaiIFtZfWbrei1D0Wl9cqH9Vr0-OibWmTWSuxH_uiVr1jyoQ83mERID4yO9_YjRYE4IZkASZJ66S2Kiet_U9HaV9U7Kup6YAc-3zdwLgN72TvW1tqSQPs1Bx4sok3x59R_V8uxdi7t8VxBbq3Cag6uzUU5P2ulQ25HiroQyXf6lSYryZyEr_aS2i8WLf4xSxTiSa8eCRVdVdg3VJKvHBRk1NJkvLkvs4uJK3pKbNLPp6bCfLn2reIcMmBIHMc-fi1kaWVHn203_yRUDTQ"
  ),
));

$response5 = curl_exec($curl5);
$err5 = curl_error($curl5);

curl_close($curl5);

if ($err5) {
  echo "   cURL Error userinfo#:" . $err5;
} else {
  echo '    response userinfo  '.$response5.'*************';
} 

/*$isLoggedIn = \Auth::check();
echo 'check='.$isLoggedIn;*/
 
?>

  <button onclick="logout();"> Logout</button>
<script src="https://cdn.auth0.com/js/auth0/9.0.1/auth0.min.js"></script>
<script type="text/javascript">

  function logout(){
	  // Script uses auth0.js. See Remarks for details.
  // Initialize client
  var webAuth = new auth0.WebAuth({
    domain:       'raniasaad.eu.auth0.com',
    clientID:     'JBL90aJJc4ZG7DxcIfITrYB-UrjbvY_u'
  });
  
  webAuth.logout({
    returnTo: 'http://127.0.0.1/laravel5/public/logout',
    client_id: 'JBL90aJJc4ZG7DxcIfITrYB-UrjbvY_u'
  });

	  
	  
  }
  </script>
 

  @stop