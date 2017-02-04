<?php

  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  ob_start();
  session_start();

  $dbUrl = getenv('DATABASE_URL');

  $dbopts = parse_url($dbUrl);

  $dbHost = $dbopts["host"];
  $dbPort = $dbopts["port"];
  $dbUser = $dbopts["user"];
  $dbPassword = $dbopts["pass"];
  $dbName = ltrim($dbopts["path"],'/');

  $db = pg_connect("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  // Form data
	$username = $_POST['username'];
	$password = $_POST['password'];

  // Check username and password
  $query = "SELECT username, password FROM public.user WHERE username = '$username' AND password = '$password'";
  $result = pg_query($query) or die('Query failed: ' . pg_last_error());
  $confirm = pg_num_rows($result);

  // Store user_id in session for later use
  $result2 = pg_query($db, "SELECT user_id FROM public.user WHERE username ='$username' AND password = '$password'");
  $row = pg_fetch_row($result2);
  $_SESSION['userid'] = $row[0];

  // Redirect based on credentials
  if ($confirm == 1) {
    header("location: mymusicratings.php");
  } else {
     echo ("<SCRIPT LANGUAGE='JavaScript'>
             window.alert('Username or password is incorrect. Try again.')
             window.location.href='http://127.0.0.1/mymusicratings/index.php';
             </SCRIPT>");
  }
 ?>