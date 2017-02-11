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

    $db = new PDO("pgsql:host=$dbHost port=$dbPort dbname=$dbName user=$dbUser password=$dbPassword");
    if (!$db) {
      echo ("<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Unable to establish connection to database. Try again later.')
              window.location.href='index.php';
              </SCRIPT>");
      exit;
    }

?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Register | My Music Ratings</title>
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
          <p class="navbar-text navbar-right"><a href="index.php" class="navbar-link"><span class="glyphicon glyphicon-home"></span> home</a></p>
        </div>
			</div>
		</nav>

		<!-- Main content -->
    <div class="container center-block">
      <div class="row">
        <div class="jumbotron">
          <div class="col-md-4 col-md-offset-4">
            <h2>why register?</h2>
              <h4>keep track of your favorite music! members have the freedom to create a database of their favorite music. browse all user submissions to discover new music. best of all, it's free to join!</h4>
            <br>
            <br>
          </div>
      </div>
        <div class="col-md-4 col-md-offset-4 register">

        <!-- Form Start -->
        <form action="register.php" method="post">
				  <div class="form-group">
				    <label for="username">Username</label>
				    <input type="text" class="form-control" placeholder="Username" name="username" required>
				  </div>

				  <div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" class="form-control" placeholder="Password" name="password" required>
				  </div>

				  <button type="submit" name="Submit" class="btn btn-primary btn-margin">Submit</button>
				</form>

         </form>
         <button class="btn btn-primary btn-margin">Cancel</button>

        </div>
      </div>
    </div>
  </body>

</html>
