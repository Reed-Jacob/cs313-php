<?php

  require('/model/database.php');

  $currentuser = $_SESSION['userid'];

  // Redirect user if not logged in
  if (!isset($_SESSION['logged_in'])) {
  header('Location: index.php');
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
