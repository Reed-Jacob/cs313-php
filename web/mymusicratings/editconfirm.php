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

  // Get current username
  $loginquery = $db->prepare("SELECT username FROM public.user WHERE user_id = '$currentuser'");
  $loginquery->execute();
  $loginconfirm = $loginquery->setFetchMode(PDO::FETCH_ASSOC);
  $username = $loginconfirm[0]['username'];

  // Form data (album)
  $albumid = $_POST['albumid'];
	$albumartist = pg_escape_string($_POST['albumartist']);
  $albumtitle = pg_escape_string($_POST['albumtitle']);
  $albumyear = $_POST['albumyear'];
  if (isset($_POST['albumfavorite'])) {
    $albumfavorite = 't';
  } else {
    $albumfavorite = 'f'; }

  // Update album table
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $albumquery = $db->prepare("UPDATE public.album SET album_artist = '$albumartist', album_title = '$albumtitle', album_year = '$albumyear', album_favorite = '$albumfavorite' WHERE album_id = '$albumid'");
  $albumquery->execute();

  // Form data (track 1)
  if (isset($_POST['tracknumber1'])) {
    $tracknumber1 = $_POST['tracknumber1'];
  }
  if (isset($_POST['tracktitle1'])) {
    $tracktitle1 = pg_escape_string($_POST['tracktitle1']);
  }
  if (isset($_POST['trackfavorite1'])) {
    $trackfavorite1 = 't';
  } else {
    $trackfavorite1 = 'f'; }

    // Form data (track 2)
  if (isset($_POST['tracknumber2'])) {
    $tracknumber2 = $_POST['tracknumber2'];
  }
  if (isset($_POST['tracktitle2'])) {
    $tracktitle2 = pg_escape_string($_POST['tracktitle2']);
  }
  if (isset($_POST['trackfavorite2'])) {
    $trackfavorite2 = 't';
  } else {
    $trackfavorite2 = 'f'; }

  // Form data (track 3)
  if (isset($_POST['tracknumber3'])) {
    $tracknumber3 = $_POST['tracknumber3'];
  }
  if (isset($_POST['tracktitle3'])) {
    $tracktitle3 = pg_escape_string($_POST['tracktitle3']);
  }
  if (isset($_POST['trackfavorite3'])) {
    $trackfavorite3 = 't';
  } else {
    $trackfavorite3 = 'f'; }

  // Form data (track 4)
  if (isset($_POST['tracknumber4'])) {
    $tracknumber4 = $_POST['tracknumber4'];
  }
  if (isset($_POST['tracktitle4'])) {
    $tracktitle4 = pg_escape_string($_POST['tracktitle4']);
  }
  if (isset($_POST['trackfavorite4'])) {
    $trackfavorite4 = 't';
  } else {
    $trackfavorite4 = 'f'; }

  // Form data (track 5)
  if (isset($_POST['tracknumber5'])) {
    $tracknumber5 = $_POST['tracknumber5'];
  }
  if (isset($_POST['tracktitle5'])) {
    $tracktitle5 = pg_escape_string($_POST['tracktitle5']);
  }
  if (isset($_POST['trackfavorite5'])) {
    $trackfavorite5 = 't';
  } else {
    $trackfavorite5 = 'f'; }

  // Form data (track 6)
  if (isset($_POST['tracknumber6'])) {
    $tracknumber6 = $_POST['tracknumber6'];
  }
  if (isset($_POST['tracktitle6'])) {
    $tracktitle6 = pg_escape_string($_POST['tracktitle6']);
  }
  if (isset($_POST['trackfavorite6'])) {
    $trackfavorite6 = 't';
  } else {
    $trackfavorite6 = 'f'; }

  // Form data (track 7)
  if (isset($_POST['tracknumber7'])) {
    $tracknumber7 = $_POST['tracknumber7'];
  }
  if (isset($_POST['tracktitle7'])) {
    $tracktitle7 = pg_escape_string($_POST['tracktitle7']);
  }
  if (isset($_POST['trackfavorite7'])) {
    $trackfavorite7 = 't';
  } else {
    $trackfavorite7 = 'f'; }

  // Form data (track 8)
  if (isset($_POST['tracknumber8'])) {
    $tracknumber8 = $_POST['tracknumber8'];
  }
  if (isset($_POST['tracktitle8'])) {
    $tracktitle8 = pg_escape_string($_POST['tracktitle8']);
  }
  if (isset($_POST['trackfavorite8'])) {
    $trackfavorite8 = 't';
  } else {
    $trackfavorite8 = 'f'; }

  // Form data (track 9)
  if (isset($_POST['tracknumber9'])) {
    $tracknumber9 = $_POST['tracknumber9'];
  }
  if (isset($_POST['tracktitle9'])) {
    $tracktitle9 = pg_escape_string($_POST['tracktitle9']);
  }
  if (isset($_POST['trackfavorite9'])) {
    $trackfavorite9 = 't';
  } else {
    $trackfavorite9 = 'f'; }

  // Form data (track 10)
  if (isset($_POST['tracknumber10'])) {
    $tracknumber10 = $_POST['tracknumber10'];
  }
  if (isset($_POST['tracktitle10'])) {
    $tracktitle10 = pg_escape_string($_POST['tracktitle10']);
  }
  if (isset($_POST['trackfavorite10'])) {
    $trackfavorite10 = 't';
  } else {
    $trackfavorite10 = 'f'; }

  // Form data (track 11)
  if (isset($_POST['tracknumber11'])) {
    $tracknumber11 = $_POST['tracknumber11'];
  }
  if (isset($_POST['tracktitle11'])) {
    $tracktitle11 = pg_escape_string($_POST['tracktitle11']);
  }
  if (isset($_POST['trackfavorite11'])) {
    $trackfavorite11 = 't';
  } else {
    $trackfavorite11 = 'f'; }

  // Form data (track 12)
  if (isset($_POST['tracknumber12'])) {
    $tracknumber12 = $_POST['tracknumber12'];
  }
  if (isset($_POST['tracktitle12'])) {
    $tracktitle12 = pg_escape_string($_POST['tracktitle12']);
  }
  if (isset($_POST['trackfavorite12'])) {
    $trackfavorite12 = 't';
  } else {
    $trackfavorite12 = 'f'; }

  // Form data (track 13)
  if (isset($_POST['tracknumber13'])) {
    $tracknumber13 = $_POST['tracknumber13'];
  }
  if (isset($_POST['tracktitle13'])) {
    $tracktitle13 = pg_escape_string($_POST['tracktitle13']);
  }
  if (isset($_POST['trackfavorite13'])) {
    $trackfavorite13 = 't';
  } else {
    $trackfavorite13 = 'f'; }

  // Form data (track 14)
  if (isset($_POST['tracknumber14'])) {
    $tracknumber14 = $_POST['tracknumber14'];
  }
  if (isset($_POST['tracktitle14'])) {
    $tracktitle14 = pg_escape_string($_POST['tracktitle14']);
  }
  if (isset($_POST['trackfavorite14'])) {
    $trackfavorite14 = 't';
  } else {
    $trackfavorite14 = 'f'; }

  // Form data (track 15)
  if (isset($_POST['tracknumber15'])) {
  $tracknumber15 = $_POST['tracknumber15'];
  }
  if (isset($_POST['tracktitle15'])) {
    $tracktitle15 = pg_escape_string($_POST['tracktitle15']);
  }
  if (isset($_POST['trackfavorite15'])) {
    $trackfavorite15 = 't';
  } else {
    $trackfavorite15 = 'f'; }

  /* Insert data into track table */
  if (isset($_POST['tracknumber1'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $trackquery = $db->prepare("UPDATE public.track SET track_number = '$tracknumber1', track_favorite = '$trackfavorite1', track_title = '$tracktitle1' WHERE track_number = '$tracknumber1' AND album_id = '$albumid'");
    $trackquery->execute();
  }
  if (isset($_POST['tracknumber2'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $trackquery = $db->prepare("UPDATE public.track SET track_number = '$tracknumber2', track_favorite = '$trackfavorite2', track_title = '$tracktitle2' WHERE track_number = '$tracknumber2' AND album_id = '$albumid'");
    $trackquery->execute();
  }
  if (isset($_POST['tracknumber3'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $trackquery = $db->prepare("UPDATE public.track SET track_number = '$tracknumber3', track_favorite = '$trackfavorite3', track_title = '$tracktitle3' WHERE track_number = '$tracknumber3' AND album_id = '$albumid'");
    $trackquery->execute();
  }
  if (isset($_POST['tracknumber4'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $trackquery = $db->prepare("UPDATE public.track SET track_number = '$tracknumber4', track_favorite = '$trackfavorite4', track_title = '$tracktitle4' WHERE track_number = '$tracknumber4' AND album_id = '$albumid'");
    $trackquery->execute();
  }
  if (isset($_POST['tracknumber5'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $trackquery = $db->prepare("UPDATE public.track SET track_number = '$tracknumber5', track_favorite = '$trackfavorite5', track_title = '$tracktitle5' WHERE track_number = '$tracknumber5' AND album_id = '$albumid'");
    $trackquery->execute();
  }
  if (isset($_POST['tracknumber6'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $trackquery = $db->prepare("UPDATE public.track SET track_number = '$tracknumber6', track_favorite = '$trackfavorite6', track_title = '$tracktitle6' WHERE track_number = '$tracknumber6' AND album_id = '$albumid'");
    $trackquery->execute();
  }
  if (isset($_POST['tracknumber7'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $trackquery = $db->prepare("UPDATE public.track SET track_number = '$tracknumber7', track_favorite = '$trackfavorite7', track_title = '$tracktitle7' WHERE track_number = '$tracknumber7' AND album_id = '$albumid'");
    $trackquery->execute();
  }
  if (isset($_POST['tracknumber8'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $trackquery = $db->prepare("UPDATE public.track SET track_number = '$tracknumber8', track_favorite = '$trackfavorite8', track_title = '$tracktitle8' WHERE track_number = '$tracknumber8' AND album_id = '$albumid'");
    $trackquery->execute();
  }
  if (isset($_POST['tracknumber9'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $trackquery = $db->prepare("UPDATE public.track SET track_number = '$tracknumber9', track_favorite = '$trackfavorite9', track_title = '$tracktitle9' WHERE track_number = '$tracknumber9' AND album_id = '$albumid'");
    $trackquery->execute();
  }
  if (isset($_POST['tracknumber10'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $trackquery = $db->prepare("UPDATE public.track SET track_number = '$tracknumber10', track_favorite = '$trackfavorite10', track_title = '$tracktitle10' WHERE track_number = '$tracknumber10' AND album_id = '$albumid'");
    $trackquery->execute();
  }
  if (isset($_POST['tracknumber11'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $trackquery = $db->prepare("UPDATE public.track SET track_number = '$tracknumber11', track_favorite = '$trackfavorite11', track_title = '$tracktitle11' WHERE track_number = '$tracknumber11' AND album_id = '$albumid'");
    $trackquery->execute();
  }
  if (isset($_POST['tracknumber12'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $trackquery = $db->prepare("UPDATE public.track SET track_number = '$tracknumber12', track_favorite = '$trackfavorite12', track_title = '$tracktitle12' WHERE track_number = '$tracknumber12' AND album_id = '$albumid'");
    $trackquery->execute();
  }
  if (isset($_POST['tracknumber13'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $trackquery = $db->prepare("UPDATE public.track SET track_number = '$tracknumber13', track_favorite = '$trackfavorite13', track_title = '$tracktitle13' WHERE track_number = '$tracknumber13' AND album_id = '$albumid'");
    $trackquery->execute();
  }
  if (isset($_POST['tracknumber14'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $trackquery = $db->prepare("UPDATE public.track SET track_number = '$tracknumber14', track_favorite = '$trackfavorite14', track_title = '$tracktitle14' WHERE track_number = '$tracknumber14' AND album_id = '$albumid'");
    $trackquery->execute();
  }
  if (isset($_POST['tracknumber15'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $trackquery = $db->prepare("UPDATE public.track SET track_number = '$tracknumber15', track_favorite = '$trackfavorite15', track_title = '$tracktitle15' WHERE track_number = '$tracknumber15' AND album_id = '$albumid'");
    $trackquery->execute();
  }

  echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Success! Returning to your music.')
          window.location.href='mymusicratings.php';
          </SCRIPT>");

//  echo '<pre>' . print_r(get_defined_vars(), true) . '</pre>';
 ?>
