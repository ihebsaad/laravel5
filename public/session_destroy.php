<?php
session_start();
?>
<?php
    unset($_SESSION['access_token']);
    unset($_SESSION['username']);
    echo 'Session was destroyed';

?>