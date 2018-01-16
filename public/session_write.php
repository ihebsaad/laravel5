<?php 
session_start();

if (isset($_GET['access_token'])) {$_SESSION['access_token'] = $_GET['access_token'];
echo '$_SESSION["access_token"]='.$_SESSION["access_token"];
}
?>