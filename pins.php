<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "laravel");

$result = $conn->query("SELECT * from Sims");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Pin":"'  . $rs["pin"] . '",';
  //  $outp .= '"City":"'   . $rs["City"]        . '",';
    $outp .= '"Sim":"'. $rs["sim"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?>
