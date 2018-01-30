<?php
session_start();
?>
<?php
    unset($_SESSION['access_tokenA']);
    unset($_SESSION['usernameA']);
    echo 'Session was destroyed';

?>