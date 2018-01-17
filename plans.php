<?php

$curl = curl_init();

curl_setopt_array($curl, array(
//CURLOPT_URL => "https://gqnchpomjprsrfglg-mock.stoplight-proxy.io/plans",
CURLOPT_URL => "https://jsonplaceholder.typicode.com/users",

CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_POSTFIELDS => "{}"/*,
/*CURLOPT_HTTPHEADER => array(
"authorization: Bearer {token}.{secret}"
)*/,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
echo "cURL Error #:" . $err;
} else {
 echo $response;

 
} 


?>