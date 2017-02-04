<?php

    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    session_start();

    $dbUrl = getenv('DATABASE_URL');

    $dbopts = parse_url($dbUrl);

    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"],'/');

    $db = pg_connect("host=$dbHost port=$dbPort dbname=$dbName user=$dbUser password=$dbPassword");

?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>My Music Ratings</title>
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

      		<a class="navbar-brand navbar-left">
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
    <div class="fluid container center-block">
        <div class="row">
        <?php

          $currentuser = $_SESSION['userid'];

          /* Album query */
          $albumquery = "SELECT album_artist, album_title, album_year, album_id, album_favorite FROM public.album WHERE user_id = $currentuser";
          $result = pg_query($albumquery) or die('Query failed: ' . pg_last_error());
          $row = pg_fetch_all($result);

          // Initialize auto-incrementing id for tracklisting
          $x = 0;
          // Initialize auto-incrementing id for edit
          $y = 0;

          while ($row = pg_fetch_array($result))
          {
            $x++;
            $y++;
            echo '<div class="col-md-3 ">';
              /* Album Info */
              echo '<img src="/mymusicratings/temp.png" height="180" width="180"/>';
              echo '<br/>';
              echo $row['album_artist'];
              echo '<br/>';
              echo $row['album_title'];
              echo '<br/>';
              echo $row['album_year'];
              echo '<br/>';
              if ($row['album_favorite'] == "t") {
                echo '<span class="glyphicon glyphicon-heart"></span>';
              } else {
                echo '<span class="glyphicon glyphicon-heart-empty"></span>';
              }
              echo '<br/>';

              /* Track query */
              $album_id = $row['album_id'];
              $trackquery = "SELECT track_number, track_title, track_favorite FROM public.track WHERE album_id = $album_id";
              $result2 = pg_query($trackquery) or die('Query failed: ' . pg_last_error());
              $row2 = pg_fetch_all($result2);

              /* Track Info */
              echo '<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse'.$x.'" aria-expanded="false" aria-controls="collapse'.$x.'">
                      Tracklist
                    </a>';
              echo '<br/>';
              echo '<div class="collapse" id="collapse'.$x.'">';
              echo '<br/>';
                echo '<div class="well">';
                    while ($row2 = pg_fetch_array($result2)) {
                      echo '<p class="split">';
                      echo $row2['track_number'];
                      echo '. ';
                      echo $row2['track_title'];
                      echo '<span>';
                        if ($row2['track_favorite'] == "t") {
                          echo '<span class="glyphicon glyphicon-heart"></span>';
                        } else {
                          echo '<span class="glyphicon glyphicon-heart-empty"></span>';
                        }
                      echo '</span>';
                      echo '</p>';
                    }
                  echo '</div>';
                echo '</div>';

              /* Edit Button (Based on album_id)*/
              echo '<form action="edit.php" method="post">';
              echo '<input type="hidden" name="albumid" value="'.$row['album_id'].'">';
              echo '<button class="btn btn-primary" type="submit">
                      Edit
                    </button>';
              echo '</form>';
              echo '<br/>';
              // echo '<pre>' . print_r(get_defined_vars(), true) . '</pre>';
            echo '</div>';
          }


        ?>
      </div>
    </div>
  </body>

</html>
