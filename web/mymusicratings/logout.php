<?php
session_start();
session_destroy();
unset($_SESSION['logged_in']);

 echo "<SCRIPT LANGUAGE='JavaScript'>
        window.alert('You have successfully logged out.')
        window.location.href='index.php';
        </SCRIPT>";
?>
