<?php

  require('/model/database.php');

  // Form data
	$username = $_POST['username'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

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
