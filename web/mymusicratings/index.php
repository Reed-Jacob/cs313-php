<?php
if (isset($_SESSION['logged_in'])) {
	header('Location: mymusicratings.php');
}
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Login | My Music Ratings</title>
		<?php require('view/header.php'); ?>
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
