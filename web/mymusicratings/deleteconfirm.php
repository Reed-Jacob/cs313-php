<?php

  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  ob_start();
  session_start();

  // Redirect user if not logged in
  if (!isset($_SESSION['logged_in'])) {
  header('Location: index.php');
  }

  $currentuser = $_SESSION['userid'];

  $dbUrl = getenv('DATABASE_URL');

  $dbopts = parse_url($dbUrl);

  $dbHost = $dbopts["host"];
  $dbPort = $dbopts["port"];
  $dbUser = $dbopts["user"];
  $dbPassword = $dbopts["pass"];
  $dbName = ltrim($dbopts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost port=$dbPort dbname=$dbName user=$dbUser password=$dbPassword");
  if (!$db) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Unable to establish connection to database. Try again later.')
            window.location.href='index.php';
            </SCRIPT>");
    exit;
  }

  // Required form data
  $albumid = $_POST['albumid'];

  // Delete track data
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $trackquery = $db->prepare("DELETE FROM public.track WHERE album_id = '$albumid'");
  $trackquery->execute();

  // Delete album data
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $albumquery = $db->prepare("DELETE FROM public.album WHERE album_id = '$albumid'");
  $albumquery->execute();


 echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Album data successfully deleted. Returning to your music.')
          window.location.href='mymusicratings.php';
          </SCRIPT>"
      );

 ?>
