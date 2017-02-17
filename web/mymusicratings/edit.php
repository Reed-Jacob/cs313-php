<?php

  require('/model/database.php');

  // Redirect user if not logged in
  if (!isset($_SESSION['logged_in'])) {
  header('Location: index.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit | My Music Ratings</title>
  <?php require('/view/header.php'); ?>
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
		my music ratings. </a>
	</div>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<p class="navbar-text navbar-right">
			<a href="logout.php" class="navbar-link"><span class="glyphicon glyphicon-log-out"></span> logout</a>
		</p>
		<p class="navbar-text navbar-right">
			<a href="addmusic.php" class="navbar-link"><span class="glyphicon glyphicon-music"></span> add music</a>
		</p>
		<p class="navbar-text navbar-right">
			<a href="browse.php" class="navbar-link"><span class="glyphicon glyphicon-search"></span> browse all</a>
		</p>
		<p class="navbar-text navbar-right">
			<a href="mymusicratings.php" class="navbar-link"><span class="glyphicon glyphicon-home"></span> my music</a>
		</p>
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
          // Album query
          $albumquery = $db->prepare("SELECT album_artist, album_title, album_year, album_favorite, album_art FROM public.album WHERE user_id = $currentuser AND album_id = $currentalbum");
          $albumquery->execute();
          $album = $albumquery->fetch(PDO::FETCH_ASSOC);
          // Assign values from query
          $albumartist = $album['album_artist'];
          $albumtitle = $album['album_title'];
          $albumyear = $album['album_year'];
          $albumfavorite = $album['album_favorite'];
          $albumart = pg_escape_string($album['album_art']);
        ?>
			<h3>Album Details</h3>
			<form method="post" action="editconfirm.php">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Artist</span>
					<input type="text" name="albumartist" class="form-control edit" value="<?php echo $albumartist; ?>" aria-describedby="basic-addon1">
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Title</span>
					<input type="text" name="albumtitle" class="form-control edit" value="<?php echo $albumtitle; ?>" aria-describedby="basic-addon1"> <span class="input-group-addon">
					<?php
           echo 'Favorite: ';
            if ($albumfavorite == "t") {
              echo '<input type="checkbox" name="albumfavorite" value="albumtrue" checked>
					'; } else { echo '<input type="checkbox" name="albumfavorite" value="albumtrue">'; } ?>
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Year</span>
					<input type="text" name="albumyear" class="form-control edit" value="<?php echo $albumyear; ?>" aria-describedby="basic-addon1">
          <input type="hidden" name="albumid" value="<?php echo $currentalbum; ?>">
				</div>
        <div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Album Art</span>
					<input type="url" name="albumart" class="form-control edit" value="<?php echo $albumart; ?>" aria-describedby="basic-addon1">
          <input type="hidden" name="albumid" value="<?php echo $currentalbum; ?>">
				</div>
				<br>
				<h3>Track Details</h3>
				<?php
           // Track query
           $trackquery = $db->prepare("SELECT track_number, track_title, track_favorite FROM public.track WHERE album_id = $currentalbum ORDER BY track_number ASC");
           $trackquery->execute();
           // Incrementation
           $y = 0;
           // Create input for all tracks
           while ($track = $trackquery->fetch(PDO::FETCH_ASSOC)) {
             $y++;
             echo '<div class="input-group">
            				<span class="input-group-addon" id="basic-addon1">Track ' . ''.$track['track_number'].'</span>
            				<input type="text" name="tracktitle'.$y.'" class="form-control edit" value="'.$track['track_title'].'" aria-describedby="basic-addon1">
                    <input type="hidden" name="tracknumber'.$y.'" value="'.$y.'">
            				<span class="input-group-addon">
            				Favorite: ';
             if ($track['track_favorite'] == "t") {
               echo '<input type="checkbox" name="trackfavorite'.$y.'" value="tracktrue" checked>'; }
               else { echo '<input type="checkbox" name="trackfavorite'.$y.'" value="tracktrue">'; }
               echo ' </span></div>'; }
        ?>
        <button class="btn btn-primary btn-margin" type="submit">Submit Changes</button>
		</form>
    <form method="post" action="delete.php">
		    <input type="hidden" name="albumid" value="<?php echo $currentalbum; ?>">
        <button class="btn btn-primary btn-margin" type="submit">Delete Album</button>
    </form>
		<a href="mymusicratings.php"><button class="btn btn-primary btn-margin">Cancel</button></a>
	</div>
</div>
</div>
</body>
</html>
