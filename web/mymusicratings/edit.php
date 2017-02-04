<?php

    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    session_start();

    $dbUser = 'postgres';
    $dbPassword = 'password';
    $dbName = 'localhost';
    $dbHost = 'localhost';
    $dbPort = '5432';

    $db = pg_connect("host=$dbHost port=$dbPort dbname=$dbName user=$dbUser password=$dbPassword");
    if (!$db) {
      echo ("<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Unable to establish connection to database. Try again later.')
              window.location.href='http://127.0.0.1/mymusicratings/index.php';
              </SCRIPT>");
      exit;
    }

?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Edit | My Music Ratings</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link rel="stylesheet" href="mymusicratings.css">

	</head>

	<body>
		<!-- Navigation bar -->
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container-fluid">
				<div class="navbar-header">

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

      		<a class="navbar-brand navbar-left" href="#">
						my music ratings.
      		</a>
		  	</div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    			<p class="navbar-text navbar-right"><a href="logout.php" class="navbar-link"><span class="glyphicon glyphicon-log-out"></span> logout</a></p>
          <p class="navbar-text navbar-right"><a href="addmusic.php" class="navbar-link"><span class="glyphicon glyphicon-music"></span> add music</a></p>
          <p class="navbar-text navbar-right"><a href="browse.php" class="navbar-link"><span class="glyphicon glyphicon-search"></span> browse all</a></p>
          <p class="navbar-text navbar-right"><a href="mymusicratings.php" class="navbar-link"><span class="glyphicon glyphicon-home"></span> my music</a></p>
        </div>
			</div>
		</nav>

		<!-- Main content -->
    <div class="container center-block">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <?php
          $currentuser = $_SESSION['userid'];
          $currentalbum = $_POST['albumid'];

          /* Album query */
          $albumquery = "SELECT album_artist, album_title, album_year, album_favorite FROM public.album WHERE user_id = $currentuser AND album_id = $currentalbum";
          $result = pg_query($albumquery) or die('Query failed: ' . pg_last_error());
          $row = pg_fetch_all($result);

          $albumartist = $row[0]['album_artist'];
          $albumtitle = $row[0]['album_title'];
          $albumyear = $row[0]['album_year'];
          $albumfavorite = $row[0]['album_favorite'];
        ?>
        <h3>Album Details</h3>
        <form method="post">
         <div class="input-group">
           <span class="input-group-addon" id="basic-addon1">Artist</span>
           <input type="text" name="albumartist" class="form-control edit" value="<?php echo $albumartist; ?>" aria-describedby="basic-addon1">
         </div>

         <div class="input-group">
           <span class="input-group-addon" id="basic-addon1">Title</span>
           <input type="text" name="albumtitle" class="form-control edit" value="<?php echo $albumtitle; ?>" aria-describedby="basic-addon1">
           <span class="input-group-addon">
           <?php
           echo 'Favorite: ';
            if ($albumfavorite == "t") {
              echo '<input type="checkbox" name="albumfavorite" value="albumtrue" checked>';
            } else {
                echo '<input type="checkbox" name="albumfavorite" value="albumtrue">';
              }
              ?>
         </div>

         <div class="input-group">
           <span class="input-group-addon" id="basic-addon1">Year</span>
           <input type="text" name="albumyear" class="form-control edit" value="<?php echo $albumyear; ?>" aria-describedby="basic-addon1">
         </div>
         <br>

         <h3>Track Details</h3>
         <?php
           /* Track query */
           $trackquery = "SELECT track_number, track_title, track_favorite FROM public.track WHERE album_id = $currentalbum ORDER BY track_number ASC";
           $result2 = pg_query($trackquery) or die('Query failed: ' . pg_last_error());
           $row2 = pg_fetch_all($result2);

           /* Create input for all tracks */
           $x = 0;

           while ($row2 = pg_fetch_array($result2)) {
             $x++;
             echo '<div class="input-group">
                   <span class="input-group-addon" id="basic-addon1">Track ' . ''.$row2['track_number'].'</span>
                   <input type="text" name="tracktitle'.$x.'"class="form-control edit" value="'.$row2['track_title'].'" aria-describedby="basic-addon1">
                   <span class="input-group-addon">
                   Favorite: ';
                    if ($row2['track_favorite'] == "t") {
                      echo '<input type="checkbox" name="trackfavorite" value="tracktrue" checked>';
                    } else {
                        echo '<input type="checkbox" name="trackfavorite" value="tracktrue">';
                      }
            echo ' </span>
                   </div>';
           }
            // echo '<pre>' . print_r(get_defined_vars(), true) . '</pre>';
         ?>
         <button class="btn btn-primary btn-margin" type="submit">Submit Changes</button>

         </form>
         <a href="#"><button class="btn btn-primary btn-margin">Cancel</button></a>

        </div>
      </div>
    </div>
  </body>

</html>
