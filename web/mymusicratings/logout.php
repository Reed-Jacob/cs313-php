<?php
session_start();
session_destroy();
echo "<SCRIPT LANGUAGE='JavaScript'>
        window.alert('You have successfully logged out.')
        window.location.href='http://127.0.0.1/mymusicratings/index.php';
        </SCRIPT>";
?>
