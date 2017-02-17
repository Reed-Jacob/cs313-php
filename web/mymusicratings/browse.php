<?php

    require('model/database.php');

?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Browse | My Music Ratings</title>
    <?php require('view/header.php'); ?>
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
          <?php
          // Show navigation depending if logged in or not
          if (isset($_SESSION['logged_in'])) {
            echo '<p class="navbar-text navbar-right"><a href="logout.php" class="navbar-link"><span class="glyphicon glyphicon-log-out"></span> logout</a></p>';
            echo '<p class="navbar-text navbar-right"><a href="addmusic.php" class="navbar-link"><span class="glyphicon glyphicon-music"></span> add music</a></p>';
            echo '<p class="navbar-text navbar-right"><a href="browse.php" class="navbar-link"><span class="glyphicon glyphicon-search"></span> browse all</a></p>';
            echo '<p class="navbar-text navbar-right"><a href="mymusicratings.php" class="navbar-link"><span class="glyphicon glyphicon-home"></span> my music</a></p>';
          } else {
            echo '<p class="navbar-text navbar-right"><a href="registeruser.php" class="navbar-link"><span class="glyphicon glyphicon-plus"></span> register</a></p>';
            echo '<p class="navbar-text navbar-right"><a href="index.php" class="navbar-link"><span class="glyphicon glyphicon-home"></span> home</a></p>';
          }
          ?>
        </div>
			</div>
		</nav>

		<!-- Main content -->
    <div class="fluid container center-block">
        <div class="row">
        <?php
          // Album query
          $albumquery = $db->prepare("SELECT album_artist, album_title, album_year, album_id, album_favorite, album_art FROM public.album ORDER BY album_id ASC");
          $albumquery->execute();

          /* // Get username
          $userquery = "SELECT username FROM public.user WHERE user_id = $currentuser";
          $result3 = pg_query($userquery) or die('Query failed: ' . pg_last_error());
          $row3 = pg_fetch_all($result3); */

          // Initialize auto-incrementing id for edit
          $y = 0;

            while ($album = $albumquery->fetch(PDO::FETCH_ASSOC))
          {
            $y++;
            echo '<div class="col-md-3 ">';
              /* Album Info */
              echo '<img src="'.$album['album_art'].'" height="180" width="180"/>';
              echo '<br/>';
              echo $album['album_artist'];
              echo '<br/>';
              echo $album['album_title'];
              echo '<br/>';
              echo $album['album_year'];
              echo '<br/>';
              if ($album['album_favorite'] == "t") {
                echo '<span class="glyphicon glyphicon-heart"></span>';
              } else {
                echo '<span class="glyphicon glyphicon-heart-empty"></span>';
              }
              echo '<br/>';
              /* Not neccessary, fix later if wanted.
              echo 'by: ' . $row['user_id'];
              echo '<br/>'; */

              // Track query
              $album_id = $album['album_id'];
              $trackquery = $db->prepare("SELECT track_number, track_title, track_favorite FROM public.track WHERE album_id = $album_id ORDER BY track_number ASC");
              $trackquery->execute();

              // Track Info
              echo '<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse'.$y.'" aria-expanded="false" aria-controls="collapse'.$y.'">
                      Tracklist
                    </a>';
              echo '<br/>';
              echo '<div class="collapse" id="collapse'.$y.'">';
              echo '<br/>';
                echo '<div class="well">';
                    while ($track = $trackquery->fetch(PDO::FETCH_ASSOC)) {
                      echo '<p class="split">';
                      echo $track['track_number'];
                      echo '. ';
                      echo $track['track_title'];
                      echo '<span>';
                        if ($track['track_favorite'] == "t") {
                          echo '<span class="glyphicon glyphicon-heart"></span>';
                        } else {
                          echo '<span class="glyphicon glyphicon-heart-empty"></span>';
                        }
                      echo '</span>';
                      echo '</p>';
                    }
                  echo '</div>';
                echo '</div>';
            echo '</div>';
          }
        ?>
      </div>
    </div>
  </body>

</html>
