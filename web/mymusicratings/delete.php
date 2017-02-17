<?php
require('model/database.php');

// Redirect user if not logged in
if (!isset($_SESSION['logged_in'])) {
header('Location: index.php');
}

// Required form data
$albumid = $_POST['albumid'];
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
   <title>Edit | My Music Ratings</title>
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
    <div class="jumbotron">
      <div class="col-md-4 col-md-offset-4">
          <h4>Are you sure you want to delete this album and all associated content?</h4>
        <br>
      </div>
 		<div class="col-md-4 col-md-offset-4 register">
     <form method="post" action="deleteconfirm.php">
 		    <input type="hidden" name="albumid" value="<?php echo $albumid; ?>">
         <button class="btn btn-primary btn-margin" type="submit">Delete Album</button>
     </form>
 		<a href="mymusicratings.php"><button class="btn btn-primary btn-margin">Cancel</button></a>
 	  </div>
 </div>
 </div>
 </body>
 </html>
