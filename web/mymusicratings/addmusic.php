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
		<title>Add Music | My Music Ratings</title>
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
        <h3>Album Details</h3>
        <form action="#" method="post">
         <div class="input-group">
           <span class="input-group-addon" id="basic-addon1">Artist</span>
           <input type="text" name="albumartist" class="form-control edit" placeholder="Artist" aria-describedby="basic-addon1" required>
         </div>

         <div class="input-group">
           <span class="input-group-addon" id="basic-addon1">Title</span>
           <input type="text" name="albumtitle" class="form-control edit" placeholder="Title" aria-describedby="basic-addon1" required>
           <span class="input-group-addon">
           Favorite: <input type="checkbox" name="albumfavorite" value="albumtrue">
         </div>

         <div class="input-group">
           <span class="input-group-addon" id="basic-addon1">Year</span>
           <input type="text" name="albumyear" class="form-control edit" placeholder="Year" aria-describedby="basic-addon1" required>
         </div>
         <br>

         <h3>Track Details</h3>
          <button class="btn btn-primary btn-margin" type="button" onclick="addInput()"/>Add Track</button>

          <span id="albumtrack"></span>
          <script>
          var countinput = 1;
          var inputname = 0;
          function addInput()
          {
          document.getElementById('albumtrack').innerHTML+='<div class="input-group"><span class="input-group-addon" id="basic-addon1">Track '+countinput+'</span><input type="text" name="tracktitle'+inputname+'"class="form-control edit" placeholder="Track Title" aria-describedby="basic-addon1" required><span class="input-group-addon">Favorite: <input type="checkbox" name="trackfavorite" value="tracktrue"></span></div>';
               countinput += 1;
               inputname += 1;
          }
          </script>
          <br>
         <button class="btn btn-primary btn-margin" type="submit">Submit</button>

         </form>
         <button class="btn btn-primary btn-margin" >Cancel</button></a>

        </div>
      </div>
    </div>
  </body>

</html>
