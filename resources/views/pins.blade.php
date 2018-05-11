<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$hostdb=getenv('DB_HOST');
$userdb=getenv('DB_USERNAME');
$pwddb=getenv('DB_PASSWORD');
$namedb=getenv('DB_DATABASE');
$conn = new mysqli($hostdb, $userdb, $pwddb, $namedb);
$result = $conn->query("SELECT * from SIMs") or die('error 2');

 $sel= $conn->query("SELECT * from SIMs") or die('error 2');
$data = array();

while ($row = mysqli_fetch_array($sel)) {
 $data[] = array("id"=>$row['id'],"sim"=>$row['sim'],"pin"=>$row['pin'],"enabled"=>$row['enabled']);
 }
echo json_encode($data,JSON_PRETTY_PRINT);

?>
