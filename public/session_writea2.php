<?php 
session_start();

if (isset($_GET['usernameA'])) {$_SESSION['usernameA'] = $_GET['usernameA'];
echo '$_SESSION["usernameA"]='.$_SESSION["usernameA"];
}
?>