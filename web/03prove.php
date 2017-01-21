<?php

// If session exists, redirect to results.
 if(!isset($_SESSION['surveytaken'])) {
	header("Location: 03proveResults.php");
	exit;
 }

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Prove 03</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
		<link rel="stylesheet" href="03prove.css">
		<script src="prove03.js"></script>

	</head>

	<body>
			<div class="container-fluid">

				<!-- Header navigation -->
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
					        </button>
				        	<a class="navbar-brand" href="index.html">CS 313</a>
                        </div>

                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="assignments.html">Assignments</a></li>
                                <li><a href="coming-soon.html">Coming Soon</a></li>
                            </ul>
                        </div>
                    </div>
				</nav>

				<!-- Main -->

				<section id="splash">
				<div class="container">
					<p class="splash-title">03 PROVE: ASSIGNMENT - PHP SURVEY</p>
					<hr id="hr-splash">
					</div>
				</section>


				<section id="lower">
				<div class="container">
					<div class="row">
						<section class="surveystyle">
							<form action="03proveSurvey.php" method="POST">
							<div class="col-sm-6">
								<div class="col-border">
									<h2>Question 1</h2>
									<h4>Can you lick your elbow?</h4>
									<input type="radio" name="question-1" value="0" id="question-1-yes" required><label for="question-1-yes">&nbsp;Yes</label><br>
									<input type="radio" name="question-1" value="1" id="question-1-no"><label for="question-1-no">&nbsp;No</label><br><br>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="col-border">
									<h2>Question 2</h2>
									<h4>Do you know how to sew?</h4>
									<input type="radio" name="question-2" value="0" id="question-2-yes" required><label for="question-2-yes">&nbsp;Yes</label><br>
									<input type="radio" name="question-2" value="1" id="question-2-no"><label for="question-2-no">&nbsp;No</label><br><br>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="col-border">
									<h2>Question 3</h2>
									<h4>Do you drink soda?</h4>
									<input type="radio" name="question-3" value="0" id="question-1-yes" required><label for="question-3-yes">&nbsp;Yes</label><br>
									<input type="radio" name="question-3" value="1" id="question-1-no"><label for="question-3-no">&nbsp;No</label><br><br>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="col-border">
									<h2>Question 4</h2>
									<h4>Have you ever done a backflip?</h4>
									<input type="radio" name="question-4" value="0" id="question-4-yes" required><label for="question-4-yes">&nbsp;Yes</label><br>
									<input type="radio" name="question-4" value="1" id="question-4-no"><label for="question-4-no">&nbsp;No</label><br><br>
								</div>
							</div>

								<input type="submit" value="Submit Survey" name="submit" class="survey-button"><br><br>
							</form>

								<a href="03proveResults.php">	<button class="survey-button">See Results</button></a>
								<br>

						</section>
				</div>
				<div class="col-md-4">
				</div>
				</div>
			</div>
				</section>

			<!-- Footer navigation -->
				<nav class="navbar navbar-fixed-bottom">
					<div class="container-fluid">
					<p class="navbar-text">Made with <a href="http://getbootstrap.com/">Bootstrap</a></p>
					</div>
				</nav>

			</div>

	</body>
</html>
