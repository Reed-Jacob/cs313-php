<?php
session_start();
session_destroy();
echo "<SCRIPT LANGUAGE='JavaScript'>
        window.alert('You have successfully logged out.')
        window.location.href='http://guarded-meadow-36110.herokuapp.com/mymusicratings/';
        </SCRIPT>";
?>
