<?php
if (isset($_SESSION['logged_in'])) {
	header('Location: mymusicratings.php');
}
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login | My Music Ratings</title>
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
      		<a class="navbar-brand navbar-left" href="index.php">
						my music ratings.
      		</a>
		  	</div>
			<p class="navbar-text navbar-right"><a href="registeruser.php" class="navbar-link"><span class="glyphicon glyphicon-plus"></span> register</a></p>
			</div>
		</nav>

		<!-- Main content -->
		<div class="jumbotron vertical-center">
			<div class="container center-block">

				<!-- Start form -->
				<form action="login.php" method="post">
				  <div class="form-group">
				    <label for="username">Username</label>
				    <input type="text" class="form-control" placeholder="Username" name="username" required>
				  </div>

				  <div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" class="form-control" placeholder="Password" name="password" required>
				  </div>

				  <button type="submit" name="Submit" class="btn btn-default" value="Login">Submit</button>
				</form>
				<!-- End form-->
				<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

		</div>
	</div>
  </body>

</html>
