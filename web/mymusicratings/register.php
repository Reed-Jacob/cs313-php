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

  $db = new PDO("pgsql:host=$dbHost port=$dbPort dbname=$dbName user=$dbUser password=$dbPassword");

  // Form data
	$username = $_POST['username'];
	$password = $_POST['password'];

  // Check if username already exists
  $registerquery = $db->prepare("SELECT username FROM public.user WHERE username = '$username'");
  $registerquery->execute();
  $numberofusers = $registerquery->fetchAll();

  if (!empty($numberofusers)) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Username already exists! Please try another.')
            window.location.href='http://127.0.0.1/mymusicratings/registeruser.php';
            </SCRIPT>");
  } else {
    // Insert data into user table
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $db->prepare("INSERT INTO public.user ("
    ."username, "
    ."password"
    .") VALUES ("
    .":username, "
    .":password"
    .")");
    $sql->execute(array(
    ":username" => $username,
    ":password" => $password
    ));
    echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Successfully registered! Please log in to continue.')
            window.location.href='http://127.0.0.1/mymusicratings/index.php';
            </SCRIPT>");
  }

 ?>
