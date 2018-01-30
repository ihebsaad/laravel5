<?php 
session_start();

if (isset($_GET['access_tokenA'])) {$_SESSION['access_tokenA'] = $_GET['access_tokenA'];
echo '$_SESSION["access_tokenA"]='.$_SESSION["access_tokenA"];
}
?>