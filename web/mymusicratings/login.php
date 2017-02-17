<?php

require ('/model/database.php');

// Form data
$username = $_POST['username'];
$password = $_POST['password'];

// Get hashed password
$query0 = $db->prepare("SELECT password FROM public.user WHERE username = '$username'");
$query0->execute();

// Check password
if ($query0)
	{
	$result0 = $query0->fetch();
	$hashedpass = $result0['password'];
	if (password_verify($password, $hashedpass))
		{

		// Store user_id in session for later use
		$query1 = $db->prepare("SELECT user_id FROM public.user WHERE username ='$username'");
		$query1->execute();
		$result1 = $query1->fetch();
		$_SESSION['userid'] = $result1['user_id'];

		// Set SESSION data and login
		$_SESSION['logged_in'] = true;
		header("location: mymusicratings.php");
		}
	  else
		{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
                 window.alert('Username or password is incorrect. Try again.')
                 window.location.href='index.php';
                 </SCRIPT>");
		}
	}

?>
