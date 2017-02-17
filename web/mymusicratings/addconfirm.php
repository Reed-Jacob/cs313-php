<?php

  require('model/database.php');

  // Redirect user if not logged in
  if (!isset($_SESSION['logged_in'])) {
  header('Location: index.php');
  }

  $currentuser = $_SESSION['userid'];

  // Get current username
  $loginquery = $db->prepare("SELECT username FROM public.user WHERE user_id = '$currentuser'");
  $loginquery->execute();
  $loginconfirm = $loginquery->setFetchMode(PDO::FETCH_ASSOC);
  $username = $loginconfirm[0]['username'];

  // Form data (album)
	$albumartist = $_POST['albumartist'];
  $albumtitle = $_POST['albumtitle'];
  $albumyear = $_POST['albumyear'];
  $albumart = pg_escape_string($_POST['albumart']);
  if (isset($_POST['albumfavorite'])) {
    $albumfavorite = 't';
  } else {
    $albumfavorite = 'f'; }

  // Insert data into album table
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = $db->prepare("INSERT INTO public.album ("
  ."album_artist, "
  ."album_title, "
  ."album_year, "
  ."album_favorite, "
  ."album_art, "
  ."user_id"
  .") VALUES ("
  .":album_artist, "
  .":album_title, "
  .":album_year, "
  .":album_favorite, "
  .":album_art, "
  .":user_id"
  .")");
  $sql->execute(array(
  ":album_artist" => $albumartist,
  ":album_title" => $albumtitle,
  ":album_year" => $albumyear,
  ":album_favorite" => $albumfavorite,
  ":album_art" => $albumart,
  ":user_id" => $currentuser
  ));

  // Form data (track 1)
  $newid = $db->lastInsertId('album_album_id_seq');
  $newalbumid = $newid;
  if (isset($_POST['tracknumber0'])) {
    $tracknumber1 = $_POST['tracknumber0'];
  }
  if (isset($_POST['tracktitle0'])) {
    $tracktitle1 = $_POST['tracktitle0'];
  }
  if (isset($_POST['trackfavorite0'])) {
    $trackfavorite1 = 't';
  } else {
    $trackfavorite1 = 'f'; }

    // Form data (track 2)
  $newid = $db->lastInsertId('album_album_id_seq');
  $newalbumid = $newid;
  if (isset($_POST['tracknumber1'])) {
    $tracknumber2 = $_POST['tracknumber1'];
  }
  if (isset($_POST['tracktitle1'])) {
    $tracktitle2 = $_POST['tracktitle1'];
  }
  if (isset($_POST['trackfavorite1'])) {
    $trackfavorite2 = 't';
  } else {
    $trackfavorite2 = 'f'; }

  // Form data (track 3)
  $newid = $db->lastInsertId('album_album_id_seq');
  $newalbumid = $newid;
  if (isset($_POST['tracknumber2'])) {
    $tracknumber3 = $_POST['tracknumber2'];
  }
  if (isset($_POST['tracktitle2'])) {
    $tracktitle3 = $_POST['tracktitle2'];
  }
  if (isset($_POST['trackfavorite2'])) {
    $trackfavorite3 = 't';
  } else {
    $trackfavorite3 = 'f'; }

  // Form data (track 4)
  $newid = $db->lastInsertId('album_album_id_seq');
  $newalbumid = $newid;
  if (isset($_POST['tracknumber3'])) {
    $tracknumber4 = $_POST['tracknumber3'];
  }
  if (isset($_POST['tracktitle3'])) {
    $tracktitle4 = $_POST['tracktitle3'];
  }
  if (isset($_POST['trackfavorite3'])) {
    $trackfavorite4 = 't';
  } else {
    $trackfavorite4 = 'f'; }

  // Form data (track 5)
  $newid = $db->lastInsertId('album_album_id_seq');
  $newalbumid = $newid;
  if (isset($_POST['tracknumber4'])) {
    $tracknumber5 = $_POST['tracknumber4'];
  }
  if (isset($_POST['tracktitle4'])) {
    $tracktitle5 = $_POST['tracktitle4'];
  }
  if (isset($_POST['trackfavorite4'])) {
    $trackfavorite5 = 't';
  } else {
    $trackfavorite5 = 'f'; }

  // Form data (track 6)
  $newid = $db->lastInsertId('album_album_id_seq');
  $newalbumid = $newid;
  if (isset($_POST['tracknumber5'])) {
    $tracknumber6 = $_POST['tracknumber5'];
  }
  if (isset($_POST['tracktitle5'])) {
    $tracktitle6 = $_POST['tracktitle5'];
  }
  if (isset($_POST['trackfavorite5'])) {
    $trackfavorite6 = 't';
  } else {
    $trackfavorite6 = 'f'; }

  // Form data (track 7)
  $newid = $db->lastInsertId('album_album_id_seq');
  $newalbumid = $newid;
  if (isset($_POST['tracknumber6'])) {
    $tracknumber7 = $_POST['tracknumber6'];
  }
  if (isset($_POST['tracktitle6'])) {
    $tracktitle7 = $_POST['tracktitle6'];
  }
  if (isset($_POST['trackfavorite6'])) {
    $trackfavorite7 = 't';
  } else {
    $trackfavorite7 = 'f'; }

  // Form data (track 8)
  $newid = $db->lastInsertId('album_album_id_seq');
  $newalbumid = $newid;
  if (isset($_POST['tracknumber7'])) {
    $tracknumber8 = $_POST['tracknumber7'];
  }
  if (isset($_POST['tracktitle7'])) {
    $tracktitle8 = $_POST['tracktitle7'];
  }
  if (isset($_POST['trackfavorite7'])) {
    $trackfavorite8 = 't';
  } else {
    $trackfavorite8 = 'f'; }

  // Form data (track 9)
  $newid = $db->lastInsertId('album_album_id_seq');
  $newalbumid = $newid;
  if (isset($_POST['tracknumber8'])) {
    $tracknumber9 = $_POST['tracknumber8'];
  }
  if (isset($_POST['tracktitle8'])) {
    $tracktitle9 = $_POST['tracktitle8'];
  }
  if (isset($_POST['trackfavorite8'])) {
    $trackfavorite9 = 't';
  } else {
    $trackfavorite9 = 'f'; }

  // Form data (track 10)
  $newid = $db->lastInsertId('album_album_id_seq');
  $newalbumid = $newid;
  if (isset($_POST['tracknumber9'])) {
    $tracknumber10 = $_POST['tracknumber9'];
  }
  if (isset($_POST['tracktitle9'])) {
    $tracktitle10 = $_POST['tracktitle9'];
  }
  if (isset($_POST['trackfavorite9'])) {
    $trackfavorite10 = 't';
  } else {
    $trackfavorite10 = 'f'; }

  // Form data (track 11)
  $newid = $db->lastInsertId('album_album_id_seq');
  $newalbumid = $newid;
  if (isset($_POST['tracknumber10'])) {
    $tracknumber11 = $_POST['tracknumber10'];
  }
  if (isset($_POST['tracktitle10'])) {
    $tracktitle11 = $_POST['tracktitle10'];
  }
  if (isset($_POST['trackfavorite10'])) {
    $trackfavorite11 = 't';
  } else {
    $trackfavorite11 = 'f'; }

  // Form data (track 12)
  $newid = $db->lastInsertId('album_album_id_seq');
  $newalbumid = $newid;
  if (isset($_POST['tracknumber11'])) {
    $tracknumber12 = $_POST['tracknumber11'];
  }
  if (isset($_POST['tracktitle11'])) {
    $tracktitle12 = $_POST['tracktitle11'];
  }
  if (isset($_POST['trackfavorite11'])) {
    $trackfavorite12 = 't';
  } else {
    $trackfavorite12 = 'f'; }

  // Form data (track 12)
  $newid = $db->lastInsertId('album_album_id_seq');
  $newalbumid = $newid;
  if (isset($_POST['tracknumber11'])) {
    $tracknumber12 = $_POST['tracknumber11'];
  }
  if (isset($_POST['tracktitle11'])) {
    $tracktitle12 = $_POST['tracktitle11'];
  }
  if (isset($_POST['trackfavorite11'])) {
    $trackfavorite12 = 't';
  } else {
    $trackfavorite12 = 'f'; }

  // Form data (track 13)
  $newid = $db->lastInsertId('album_album_id_seq');
  $newalbumid = $newid;
  if (isset($_POST['tracknumber12'])) {
    $tracknumber13 = $_POST['tracknumber12'];
  }
  if (isset($_POST['tracktitle12'])) {
    $tracktitle13 = $_POST['tracktitle12'];
  }
  if (isset($_POST['trackfavorite12'])) {
    $trackfavorite13 = 't';
  } else {
    $trackfavorite13 = 'f'; }

  // Form data (track 14)
  $newid = $db->lastInsertId('album_album_id_seq');
  $newalbumid = $newid;
  if (isset($_POST['tracknumber13'])) {
    $tracknumber14 = $_POST['tracknumber13'];
  }
  if (isset($_POST['tracktitle13'])) {
    $tracktitle14 = $_POST['tracktitle13'];
  }
  if (isset($_POST['trackfavorite13'])) {
    $trackfavorite14 = 't';
  } else {
    $trackfavorite14 = 'f'; }

  // Form data (track 15)
  $newid = $db->lastInsertId('album_album_id_seq');
  $newalbumid = $newid;
  if (isset($_POST['tracknumber14'])) {
  $tracknumber15 = $_POST['tracknumber14'];
  }
  if (isset($_POST['tracktitle14'])) {
    $tracktitle15 = $_POST['tracktitle14'];
  }
  if (isset($_POST['trackfavorite14'])) {
    $trackfavorite15 = 't';
  } else {
    $trackfavorite15 = 'f'; }

  // Insert data into track table
  if (isset($_POST['tracknumber0'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $db->prepare("INSERT INTO public.track ("
    ."track_number, "
    ."track_favorite, "
    ."track_title, "
    ."album_id "
    .") VALUES ("
    .":track_number, "
    .":track_favorite, "
    .":track_title, "
    .":album_id "
    .")");
    $sql->execute(array(
    ":track_number" => $tracknumber1,
    ":track_favorite" => $trackfavorite1,
    ":track_title" => $tracktitle1,
    ":album_id" => $newalbumid
    ));
  }
  if (isset($_POST['tracknumber1'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $db->prepare("INSERT INTO public.track ("
    ."track_number, "
    ."track_favorite, "
    ."track_title, "
    ."album_id "
    .") VALUES ("
    .":track_number, "
    .":track_favorite, "
    .":track_title, "
    .":album_id "
    .")");
    $sql->execute(array(
    ":track_number" => $tracknumber2,
    ":track_favorite" => $trackfavorite2,
    ":track_title" => $tracktitle2,
    ":album_id" => $newalbumid
    ));
  }
  if (isset($_POST['tracknumber2'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $db->prepare("INSERT INTO public.track ("
    ."track_number, "
    ."track_favorite, "
    ."track_title, "
    ."album_id "
    .") VALUES ("
    .":track_number, "
    .":track_favorite, "
    .":track_title, "
    .":album_id "
    .")");
    $sql->execute(array(
    ":track_number" => $tracknumber3,
    ":track_favorite" => $trackfavorite3,
    ":track_title" => $tracktitle3,
    ":album_id" => $newalbumid
    ));
  }
  if (isset($_POST['tracknumber3'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $db->prepare("INSERT INTO public.track ("
    ."track_number, "
    ."track_favorite, "
    ."track_title, "
    ."album_id "
    .") VALUES ("
    .":track_number, "
    .":track_favorite, "
    .":track_title, "
    .":album_id "
    .")");
    $sql->execute(array(
    ":track_number" => $tracknumber4,
    ":track_favorite" => $trackfavorite4,
    ":track_title" => $tracktitle4,
    ":album_id" => $newalbumid
    ));
  }
  if (isset($_POST['tracknumber4'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $db->prepare("INSERT INTO public.track ("
    ."track_number, "
    ."track_favorite, "
    ."track_title, "
    ."album_id "
    .") VALUES ("
    .":track_number, "
    .":track_favorite, "
    .":track_title, "
    .":album_id "
    .")");
    $sql->execute(array(
    ":track_number" => $tracknumber5,
    ":track_favorite" => $trackfavorite5,
    ":track_title" => $tracktitle5,
    ":album_id" => $newalbumid
    ));
  }
  if (isset($_POST['tracknumber5'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $db->prepare("INSERT INTO public.track ("
    ."track_number, "
    ."track_favorite, "
    ."track_title, "
    ."album_id "
    .") VALUES ("
    .":track_number, "
    .":track_favorite, "
    .":track_title, "
    .":album_id "
    .")");
    $sql->execute(array(
    ":track_number" => $tracknumber6,
    ":track_favorite" => $trackfavorite6,
    ":track_title" => $tracktitle6,
    ":album_id" => $newalbumid
    ));
  }
  if (isset($_POST['tracknumber6'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $db->prepare("INSERT INTO public.track ("
    ."track_number, "
    ."track_favorite, "
    ."track_title, "
    ."album_id "
    .") VALUES ("
    .":track_number, "
    .":track_favorite, "
    .":track_title, "
    .":album_id "
    .")");
    $sql->execute(array(
    ":track_number" => $tracknumber7,
    ":track_favorite" => $trackfavorite7,
    ":track_title" => $tracktitle7,
    ":album_id" => $newalbumid
    ));
  }
  if (isset($_POST['tracknumber7'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $db->prepare("INSERT INTO public.track ("
    ."track_number, "
    ."track_favorite, "
    ."track_title, "
    ."album_id "
    .") VALUES ("
    .":track_number, "
    .":track_favorite, "
    .":track_title, "
    .":album_id "
    .")");
    $sql->execute(array(
    ":track_number" => $tracknumber8,
    ":track_favorite" => $trackfavorite8,
    ":track_title" => $tracktitle8,
    ":album_id" => $newalbumid
    ));
  }
  if (isset($_POST['tracknumber8'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $db->prepare("INSERT INTO public.track ("
    ."track_number, "
    ."track_favorite, "
    ."track_title, "
    ."album_id "
    .") VALUES ("
    .":track_number, "
    .":track_favorite, "
    .":track_title, "
    .":album_id "
    .")");
    $sql->execute(array(
    ":track_number" => $tracknumber9,
    ":track_favorite" => $trackfavorite9,
    ":track_title" => $tracktitle9,
    ":album_id" => $newalbumid
    ));
  }
  if (isset($_POST['tracknumber9'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $db->prepare("INSERT INTO public.track ("
    ."track_number, "
    ."track_favorite, "
    ."track_title, "
    ."album_id "
    .") VALUES ("
    .":track_number, "
    .":track_favorite, "
    .":track_title, "
    .":album_id "
    .")");
    $sql->execute(array(
    ":track_number" => $tracknumber10,
    ":track_favorite" => $trackfavorite10,
    ":track_title" => $tracktitle10,
    ":album_id" => $newalbumid
    ));
  }
  if (isset($_POST['tracknumber10'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $db->prepare("INSERT INTO public.track ("
    ."track_number, "
    ."track_favorite, "
    ."track_title, "
    ."album_id "
    .") VALUES ("
    .":track_number, "
    .":track_favorite, "
    .":track_title, "
    .":album_id "
    .")");
    $sql->execute(array(
    ":track_number" => $tracknumber11,
    ":track_favorite" => $trackfavorite11,
    ":track_title" => $tracktitle11,
    ":album_id" => $newalbumid
    ));
  }
  if (isset($_POST['tracknumber11'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $db->prepare("INSERT INTO public.track ("
    ."track_number, "
    ."track_favorite, "
    ."track_title, "
    ."album_id "
    .") VALUES ("
    .":track_number, "
    .":track_favorite, "
    .":track_title, "
    .":album_id "
    .")");
    $sql->execute(array(
    ":track_number" => $tracknumber12,
    ":track_favorite" => $trackfavorite12,
    ":track_title" => $tracktitle12,
    ":album_id" => $newalbumid
    ));
  }
  if (isset($_POST['tracknumber12'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $db->prepare("INSERT INTO public.track ("
    ."track_number, "
    ."track_favorite, "
    ."track_title, "
    ."album_id "
    .") VALUES ("
    .":track_number, "
    .":track_favorite, "
    .":track_title, "
    .":album_id "
    .")");
    $sql->execute(array(
    ":track_number" => $tracknumber13,
    ":track_favorite" => $trackfavorite13,
    ":track_title" => $tracktitle13,
    ":album_id" => $newalbumid
    ));
  }
  if (isset($_POST['tracknumber13'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $db->prepare("INSERT INTO public.track ("
    ."track_number, "
    ."track_favorite, "
    ."track_title, "
    ."album_id "
    .") VALUES ("
    .":track_number, "
    .":track_favorite, "
    .":track_title, "
    .":album_id "
    .")");
    $sql->execute(array(
    ":track_number" => $tracknumber14,
    ":track_favorite" => $trackfavorite14,
    ":track_title" => $tracktitle14,
    ":album_id" => $newalbumid
    ));
  }
  if (isset($_POST['tracknumber14'])) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $db->prepare("INSERT INTO public.track ("
    ."track_number, "
    ."track_favorite, "
    ."track_title, "
    ."album_id "
    .") VALUES ("
    .":track_number, "
    .":track_favorite, "
    .":track_title, "
    .":album_id "
    .")");
    $sql->execute(array(
    ":track_number" => $tracknumber15,
    ":track_favorite" => $trackfavorite15,
    ":track_title" => $tracktitle15,
    ":album_id" => $newalbumid
    ));
  }

  echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Success! Returning to your music.')
          window.location.href='mymusicratings.php';
          </SCRIPT>");

  // echo '<pre>' . print_r(get_defined_vars(), true) . '</pre>';
 ?>
