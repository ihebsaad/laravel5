@extends('layouts.master')

@section('content')
 @if (Auth::check())
                  <?php \Log::debug('logged  2'. Auth::user()->name ); ?>    
                    @endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
email<input id="email" type="email"></input>
password<input id="password" type="password"></input>
<button onclick="register();">Register</button>
<button onclick="clickfn();">Click</button>

<?php
/*
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://raniasaad.eu.auth0.com/api/v2/users",
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
  echo "cURL Error #:" . $err;
} else {
  echo $response;
} 
*/

?>

<script>
/*function clickfn(){
var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://raniasaad.eu.auth0.com/api/v2/users",
  "method": "GET",
  "headers": {
    "authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6Ik4wWkRPVEZFT0RreE1qQTBOak00UmtaRU5UQXdRVVV6T1RRNU5FUkNOelU0UkRJME1VUTBNdyJ9.eyJpc3MiOiJodHRwczovL3Jhbmlhc2FhZC5ldS5hdXRoMC5jb20vIiwic3ViIjoiTjIydkxrdmtjcUZYajdqTWphaUpDbk1SUVhzcHFsaU1AY2xpZW50cyIsImF1ZCI6Imh0dHBzOi8vcmFuaWFzYWFkLmV1LmF1dGgwLmNvbS9hcGkvdjIvIiwiaWF0IjoxNTE1MTM4NzQ4LCJleHAiOjE1MTUyMjUxNDgsInNjb3BlIjoicmVhZDpjbGllbnRfZ3JhbnRzIGNyZWF0ZTpjbGllbnRfZ3JhbnRzIGRlbGV0ZTpjbGllbnRfZ3JhbnRzIHVwZGF0ZTpjbGllbnRfZ3JhbnRzIHJlYWQ6dXNlcnMgdXBkYXRlOnVzZXJzIGRlbGV0ZTp1c2VycyBjcmVhdGU6dXNlcnMgcmVhZDp1c2Vyc19hcHBfbWV0YWRhdGEgdXBkYXRlOnVzZXJzX2FwcF9tZXRhZGF0YSBkZWxldGU6dXNlcnNfYXBwX21ldGFkYXRhIGNyZWF0ZTp1c2Vyc19hcHBfbWV0YWRhdGEgY3JlYXRlOnVzZXJfdGlja2V0cyByZWFkOmNsaWVudHMgdXBkYXRlOmNsaWVudHMgZGVsZXRlOmNsaWVudHMgY3JlYXRlOmNsaWVudHMgcmVhZDpjbGllbnRfa2V5cyB1cGRhdGU6Y2xpZW50X2tleXMgZGVsZXRlOmNsaWVudF9rZXlzIGNyZWF0ZTpjbGllbnRfa2V5cyByZWFkOmNvbm5lY3Rpb25zIHVwZGF0ZTpjb25uZWN0aW9ucyBkZWxldGU6Y29ubmVjdGlvbnMgY3JlYXRlOmNvbm5lY3Rpb25zIHJlYWQ6cmVzb3VyY2Vfc2VydmVycyB1cGRhdGU6cmVzb3VyY2Vfc2VydmVycyBkZWxldGU6cmVzb3VyY2Vfc2VydmVycyBjcmVhdGU6cmVzb3VyY2Vfc2VydmVycyByZWFkOmRldmljZV9jcmVkZW50aWFscyB1cGRhdGU6ZGV2aWNlX2NyZWRlbnRpYWxzIGRlbGV0ZTpkZXZpY2VfY3JlZGVudGlhbHMgY3JlYXRlOmRldmljZV9jcmVkZW50aWFscyByZWFkOnJ1bGVzIHVwZGF0ZTpydWxlcyBkZWxldGU6cnVsZXMgY3JlYXRlOnJ1bGVzIHJlYWQ6cnVsZXNfY29uZmlncyB1cGRhdGU6cnVsZXNfY29uZmlncyBkZWxldGU6cnVsZXNfY29uZmlncyByZWFkOmVtYWlsX3Byb3ZpZGVyIHVwZGF0ZTplbWFpbF9wcm92aWRlciBkZWxldGU6ZW1haWxfcHJvdmlkZXIgY3JlYXRlOmVtYWlsX3Byb3ZpZGVyIGJsYWNrbGlzdDp0b2tlbnMgcmVhZDpzdGF0cyByZWFkOnRlbmFudF9zZXR0aW5ncyB1cGRhdGU6dGVuYW50X3NldHRpbmdzIHJlYWQ6bG9ncyByZWFkOnNoaWVsZHMgY3JlYXRlOnNoaWVsZHMgZGVsZXRlOnNoaWVsZHMgdXBkYXRlOnRyaWdnZXJzIHJlYWQ6dHJpZ2dlcnMgcmVhZDpncmFudHMgZGVsZXRlOmdyYW50cyByZWFkOmd1YXJkaWFuX2ZhY3RvcnMgdXBkYXRlOmd1YXJkaWFuX2ZhY3RvcnMgcmVhZDpndWFyZGlhbl9lbnJvbGxtZW50cyBkZWxldGU6Z3VhcmRpYW5fZW5yb2xsbWVudHMgY3JlYXRlOmd1YXJkaWFuX2Vucm9sbG1lbnRfdGlja2V0cyByZWFkOnVzZXJfaWRwX3Rva2VucyBjcmVhdGU6cGFzc3dvcmRzX2NoZWNraW5nX2pvYiBkZWxldGU6cGFzc3dvcmRzX2NoZWNraW5nX2pvYiByZWFkOmN1c3RvbV9kb21haW5zIGRlbGV0ZTpjdXN0b21fZG9tYWlucyBjcmVhdGU6Y3VzdG9tX2RvbWFpbnMgcmVhZDplbWFpbF90ZW1wbGF0ZXMgY3JlYXRlOmVtYWlsX3RlbXBsYXRlcyB1cGRhdGU6ZW1haWxfdGVtcGxhdGVzIiwiZ3R5IjoiY2xpZW50LWNyZWRlbnRpYWxzIn0.RhHY2wH1d9pMdX7RzSXIDKE6C1HUHAiLz32uxWRSEoe_1rcgLI8_T3Mj5-gutatsT3aMxEyKOwZ3nMzGIsn112pG-xziOC4Re1pTqRdsaLPALL1m5BFYxxX4AxLH2b2iCRCrxYHIjcJADraYkzkJ2_ZEF-b1atTc67kJReu9o03goZKVIodyIQfNtxY4FBWb-zZVWPpJxFxJW4wup-e3Jajq4jdQ031emJ0GXM6HWDQy1tIi-DsDCTzMEBpUHW4Tzdz6VBVu8fwkM8Nemfkb1kfAzr5_AN1jumT1q43XTsUZShQX0iQ1B5nZ88SN6xH6O9qxDNNG9jR8HGO_8B2kuw"

  },
  "data": "{}"
}

$.ajax(settings).done(function (response) {
  console.log(response);
});
}*/
/*
function clickfn(){


	var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://raniasaad.eu.auth0.com/oauth/ro",
  "method": "POST",
  "headers": {
    "authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6Ik4wWkRPVEZFT0RreE1qQTBOak00UmtaRU5UQXdRVVV6T1RRNU5FUkNOelU0UkRJME1VUTBNdyJ9.eyJpc3MiOiJodHRwczovL3Jhbmlhc2FhZC5ldS5hdXRoMC5jb20vIiwic3ViIjoiTjIydkxrdmtjcUZYajdqTWphaUpDbk1SUVhzcHFsaU1AY2xpZW50cyIsImF1ZCI6Imh0dHBzOi8vcmFuaWFzYWFkLmV1LmF1dGgwLmNvbS9hcGkvdjIvIiwiaWF0IjoxNTE1MTM4NzQ4LCJleHAiOjE1MTUyMjUxNDgsInNjb3BlIjoicmVhZDpjbGllbnRfZ3JhbnRzIGNyZWF0ZTpjbGllbnRfZ3JhbnRzIGRlbGV0ZTpjbGllbnRfZ3JhbnRzIHVwZGF0ZTpjbGllbnRfZ3JhbnRzIHJlYWQ6dXNlcnMgdXBkYXRlOnVzZXJzIGRlbGV0ZTp1c2VycyBjcmVhdGU6dXNlcnMgcmVhZDp1c2Vyc19hcHBfbWV0YWRhdGEgdXBkYXRlOnVzZXJzX2FwcF9tZXRhZGF0YSBkZWxldGU6dXNlcnNfYXBwX21ldGFkYXRhIGNyZWF0ZTp1c2Vyc19hcHBfbWV0YWRhdGEgY3JlYXRlOnVzZXJfdGlja2V0cyByZWFkOmNsaWVudHMgdXBkYXRlOmNsaWVudHMgZGVsZXRlOmNsaWVudHMgY3JlYXRlOmNsaWVudHMgcmVhZDpjbGllbnRfa2V5cyB1cGRhdGU6Y2xpZW50X2tleXMgZGVsZXRlOmNsaWVudF9rZXlzIGNyZWF0ZTpjbGllbnRfa2V5cyByZWFkOmNvbm5lY3Rpb25zIHVwZGF0ZTpjb25uZWN0aW9ucyBkZWxldGU6Y29ubmVjdGlvbnMgY3JlYXRlOmNvbm5lY3Rpb25zIHJlYWQ6cmVzb3VyY2Vfc2VydmVycyB1cGRhdGU6cmVzb3VyY2Vfc2VydmVycyBkZWxldGU6cmVzb3VyY2Vfc2VydmVycyBjcmVhdGU6cmVzb3VyY2Vfc2VydmVycyByZWFkOmRldmljZV9jcmVkZW50aWFscyB1cGRhdGU6ZGV2aWNlX2NyZWRlbnRpYWxzIGRlbGV0ZTpkZXZpY2VfY3JlZGVudGlhbHMgY3JlYXRlOmRldmljZV9jcmVkZW50aWFscyByZWFkOnJ1bGVzIHVwZGF0ZTpydWxlcyBkZWxldGU6cnVsZXMgY3JlYXRlOnJ1bGVzIHJlYWQ6cnVsZXNfY29uZmlncyB1cGRhdGU6cnVsZXNfY29uZmlncyBkZWxldGU6cnVsZXNfY29uZmlncyByZWFkOmVtYWlsX3Byb3ZpZGVyIHVwZGF0ZTplbWFpbF9wcm92aWRlciBkZWxldGU6ZW1haWxfcHJvdmlkZXIgY3JlYXRlOmVtYWlsX3Byb3ZpZGVyIGJsYWNrbGlzdDp0b2tlbnMgcmVhZDpzdGF0cyByZWFkOnRlbmFudF9zZXR0aW5ncyB1cGRhdGU6dGVuYW50X3NldHRpbmdzIHJlYWQ6bG9ncyByZWFkOnNoaWVsZHMgY3JlYXRlOnNoaWVsZHMgZGVsZXRlOnNoaWVsZHMgdXBkYXRlOnRyaWdnZXJzIHJlYWQ6dHJpZ2dlcnMgcmVhZDpncmFudHMgZGVsZXRlOmdyYW50cyByZWFkOmd1YXJkaWFuX2ZhY3RvcnMgdXBkYXRlOmd1YXJkaWFuX2ZhY3RvcnMgcmVhZDpndWFyZGlhbl9lbnJvbGxtZW50cyBkZWxldGU6Z3VhcmRpYW5fZW5yb2xsbWVudHMgY3JlYXRlOmd1YXJkaWFuX2Vucm9sbG1lbnRfdGlja2V0cyByZWFkOnVzZXJfaWRwX3Rva2VucyBjcmVhdGU6cGFzc3dvcmRzX2NoZWNraW5nX2pvYiBkZWxldGU6cGFzc3dvcmRzX2NoZWNraW5nX2pvYiByZWFkOmN1c3RvbV9kb21haW5zIGRlbGV0ZTpjdXN0b21fZG9tYWlucyBjcmVhdGU6Y3VzdG9tX2RvbWFpbnMgcmVhZDplbWFpbF90ZW1wbGF0ZXMgY3JlYXRlOmVtYWlsX3RlbXBsYXRlcyB1cGRhdGU6ZW1haWxfdGVtcGxhdGVzIiwiZ3R5IjoiY2xpZW50LWNyZWRlbnRpYWxzIn0.RhHY2wH1d9pMdX7RzSXIDKE6C1HUHAiLz32uxWRSEoe_1rcgLI8_T3Mj5-gutatsT3aMxEyKOwZ3nMzGIsn112pG-xziOC4Re1pTqRdsaLPALL1m5BFYxxX4AxLH2b2iCRCrxYHIjcJADraYkzkJ2_ZEF-b1atTc67kJReu9o03goZKVIodyIQfNtxY4FBWb-zZVWPpJxFxJW4wup-e3Jajq4jdQ031emJ0GXM6HWDQy1tIi-DsDCTzMEBpUHW4Tzdz6VBVu8fwkM8Nemfkb1kfAzr5_AN1jumT1q43XTsUZShQX0iQ1B5nZ88SN6xH6O9qxDNNG9jR8HGO_8B2kuw",
    "content-type": "application/json"
  },
  "processData": false,
 "data": {"client_id": "JBL90aJJc4ZG7DxcIfITrYB-UrjbvY_u",
  "connection": "databaseserver",
  "grant_type": "password",
  "password": "mypassword2",
  "scope": "openid name email",
  "username": "myaccount2"
}
}

$.ajax(settings).done(function (response) {
  console.log("done"+response);
})
.fail( function(xhr, textStatus, errorThrown) {
        alert('failure'+textStatus);
    });
}*/
/*function register(){
	var email=document.getElementById('email').value;
	var pw=document.getElementById('password').value;
	var datatosend= '{\"user_id\":\"\",\"connection\":\"Username-Password-Authentication\",\"email\":"'+email+'",\"password\":"'+pw+'",\"user_metadata\":{},\"email_verified\":false,\"verify_email\":false,\"app_metadata\":{}}';
 console.log(datatosend);
	var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://raniasaad.eu.auth0.com/api/v2/users",
  "method": "POST",
  "headers": {
    "authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6Ik4wWkRPVEZFT0RreE1qQTBOak00UmtaRU5UQXdRVVV6T1RRNU5FUkNOelU0UkRJME1VUTBNdyJ9.eyJpc3MiOiJodHRwczovL3Jhbmlhc2FhZC5ldS5hdXRoMC5jb20vIiwic3ViIjoiTjIydkxrdmtjcUZYajdqTWphaUpDbk1SUVhzcHFsaU1AY2xpZW50cyIsImF1ZCI6Imh0dHBzOi8vcmFuaWFzYWFkLmV1LmF1dGgwLmNvbS9hcGkvdjIvIiwiaWF0IjoxNTE1MTM4NzQ4LCJleHAiOjE1MTUyMjUxNDgsInNjb3BlIjoicmVhZDpjbGllbnRfZ3JhbnRzIGNyZWF0ZTpjbGllbnRfZ3JhbnRzIGRlbGV0ZTpjbGllbnRfZ3JhbnRzIHVwZGF0ZTpjbGllbnRfZ3JhbnRzIHJlYWQ6dXNlcnMgdXBkYXRlOnVzZXJzIGRlbGV0ZTp1c2VycyBjcmVhdGU6dXNlcnMgcmVhZDp1c2Vyc19hcHBfbWV0YWRhdGEgdXBkYXRlOnVzZXJzX2FwcF9tZXRhZGF0YSBkZWxldGU6dXNlcnNfYXBwX21ldGFkYXRhIGNyZWF0ZTp1c2Vyc19hcHBfbWV0YWRhdGEgY3JlYXRlOnVzZXJfdGlja2V0cyByZWFkOmNsaWVudHMgdXBkYXRlOmNsaWVudHMgZGVsZXRlOmNsaWVudHMgY3JlYXRlOmNsaWVudHMgcmVhZDpjbGllbnRfa2V5cyB1cGRhdGU6Y2xpZW50X2tleXMgZGVsZXRlOmNsaWVudF9rZXlzIGNyZWF0ZTpjbGllbnRfa2V5cyByZWFkOmNvbm5lY3Rpb25zIHVwZGF0ZTpjb25uZWN0aW9ucyBkZWxldGU6Y29ubmVjdGlvbnMgY3JlYXRlOmNvbm5lY3Rpb25zIHJlYWQ6cmVzb3VyY2Vfc2VydmVycyB1cGRhdGU6cmVzb3VyY2Vfc2VydmVycyBkZWxldGU6cmVzb3VyY2Vfc2VydmVycyBjcmVhdGU6cmVzb3VyY2Vfc2VydmVycyByZWFkOmRldmljZV9jcmVkZW50aWFscyB1cGRhdGU6ZGV2aWNlX2NyZWRlbnRpYWxzIGRlbGV0ZTpkZXZpY2VfY3JlZGVudGlhbHMgY3JlYXRlOmRldmljZV9jcmVkZW50aWFscyByZWFkOnJ1bGVzIHVwZGF0ZTpydWxlcyBkZWxldGU6cnVsZXMgY3JlYXRlOnJ1bGVzIHJlYWQ6cnVsZXNfY29uZmlncyB1cGRhdGU6cnVsZXNfY29uZmlncyBkZWxldGU6cnVsZXNfY29uZmlncyByZWFkOmVtYWlsX3Byb3ZpZGVyIHVwZGF0ZTplbWFpbF9wcm92aWRlciBkZWxldGU6ZW1haWxfcHJvdmlkZXIgY3JlYXRlOmVtYWlsX3Byb3ZpZGVyIGJsYWNrbGlzdDp0b2tlbnMgcmVhZDpzdGF0cyByZWFkOnRlbmFudF9zZXR0aW5ncyB1cGRhdGU6dGVuYW50X3NldHRpbmdzIHJlYWQ6bG9ncyByZWFkOnNoaWVsZHMgY3JlYXRlOnNoaWVsZHMgZGVsZXRlOnNoaWVsZHMgdXBkYXRlOnRyaWdnZXJzIHJlYWQ6dHJpZ2dlcnMgcmVhZDpncmFudHMgZGVsZXRlOmdyYW50cyByZWFkOmd1YXJkaWFuX2ZhY3RvcnMgdXBkYXRlOmd1YXJkaWFuX2ZhY3RvcnMgcmVhZDpndWFyZGlhbl9lbnJvbGxtZW50cyBkZWxldGU6Z3VhcmRpYW5fZW5yb2xsbWVudHMgY3JlYXRlOmd1YXJkaWFuX2Vucm9sbG1lbnRfdGlja2V0cyByZWFkOnVzZXJfaWRwX3Rva2VucyBjcmVhdGU6cGFzc3dvcmRzX2NoZWNraW5nX2pvYiBkZWxldGU6cGFzc3dvcmRzX2NoZWNraW5nX2pvYiByZWFkOmN1c3RvbV9kb21haW5zIGRlbGV0ZTpjdXN0b21fZG9tYWlucyBjcmVhdGU6Y3VzdG9tX2RvbWFpbnMgcmVhZDplbWFpbF90ZW1wbGF0ZXMgY3JlYXRlOmVtYWlsX3RlbXBsYXRlcyB1cGRhdGU6ZW1haWxfdGVtcGxhdGVzIiwiZ3R5IjoiY2xpZW50LWNyZWRlbnRpYWxzIn0.RhHY2wH1d9pMdX7RzSXIDKE6C1HUHAiLz32uxWRSEoe_1rcgLI8_T3Mj5-gutatsT3aMxEyKOwZ3nMzGIsn112pG-xziOC4Re1pTqRdsaLPALL1m5BFYxxX4AxLH2b2iCRCrxYHIjcJADraYkzkJ2_ZEF-b1atTc67kJReu9o03goZKVIodyIQfNtxY4FBWb-zZVWPpJxFxJW4wup-e3Jajq4jdQ031emJ0GXM6HWDQy1tIi-DsDCTzMEBpUHW4Tzdz6VBVu8fwkM8Nemfkb1kfAzr5_AN1jumT1q43XTsUZShQX0iQ1B5nZ88SN6xH6O9qxDNNG9jR8HGO_8B2kuw",
    "content-type": "application/json"
  },
  "processData": false,
 "data": datatosend
}

$.ajax(settings).done(function (response) {
  console.log(response);
})
.fail( function(xhr, textStatus, errorThrown) {
        alert(xhr.responseText);
    });
}*/
</script>
<!-- <script  src="require.js"></script>
<script>
var request = require("request");

var options = { method: 'POST',
  url: 'https://raniasaad.eu.auth0.com/oauth/ro',
  headers: { 'content-type': 'application/json', 'accept': 'application/json' },
  body:
   { connection: 'CONNECTION',
     grant_type: 'PASSWORD',
     username: 'USERNAME',
     client_id: 'JBL90aJJc4ZG7DxcIfITrYB-UrjbvY_u',
     password: 'PASSWORD',
     scope: 'SCOPE',
     id_token: 'ID_TOKEN',
     device: 'DEVICE'},
  json: true };

request(options, function (error, response, body) {
  if (error) throw new Error(error);

  console.log(body);
});
</script>-->
  <!--<script src="https://cdn.auth0.com/js/auth0/9.0.1/auth0.min.js"></script>
  <script type="text/javascript">
    var auth0 = new auth0.WebAuth({
      clientID: 'JBL90aJJc4ZG7DxcIfITrYB-UrjbvY_u',
      domain: 'raniasaad.eu.auth0.com'
    });
    auth0.crossOriginVerification();
  </script>-->
  <!-- <script data-main="scripts/main.js" src="public/require.js"></script>-->
  <script src="http://requirejs.org/docs/release/2.1.18/minified/require.js"></script>
  <script>
  define(['require', 'request'], function (require) {
    var request = require("request");
	var options = { method: 'POST',
  url: 'https://raniasaad.eu.auth0.com/oauth/ro',
  headers: { 'content-type': 'application/json', 'accept': 'application/json' },
  body:
   { connection: 'databaseserver',
     grant_type: 'PASSWORD',
     username: 'myaccount2',
     client_id: 'JBL90aJJc4ZG7DxcIfITrYB-UrjbvY_u',
     password: 'mypassword2',
     scope: '',
    // id_token: 'ID_TOKEN',
     device: ''},
  json: true };

request(options, function (error, response, body) {
  if (error) throw new Error(error);

  console.log(body);
});

});
/*
  var request = require("request");

var options = { method: 'POST',
  url: 'https://raniasaad.eu.auth0.com/oauth/ro',
  headers: { 'content-type': 'application/json', 'accept': 'application/json' },
  body:
   { connection: 'databaseserver',
     grant_type: 'PASSWORD',
     username: 'myaccount2',
     client_id: 'JBL90aJJc4ZG7DxcIfITrYB-UrjbvY_u',
     password: 'mypassword2',
     scope: '',
    // id_token: 'ID_TOKEN',
     device: ''},
  json: true };

request(options, function (error, response, body) {
  if (error) throw new Error(error);

  console.log(body);
});*/
  </script>
@stop