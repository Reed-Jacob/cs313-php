
<?php

// Start a Session
 session_start();
 $_SESSION["surveytaken"] = "yes";

// Error reporting
// ini_set('display_errors', 'On');
// error_reporting(E_ALL);

// Read in data and set filename
$question1 = $_POST['question-1'];
$question2 = $_POST['question-2'];
$question3 = $_POST['question-3'];
$question4 = $_POST['question-4'];
$filename = "survey.txt";
$content = file($filename);


// Assign data to array
$array = explode("||", $content[0]);

$yes1 = $array[0];
$no1 = $array[1];
$yes2 = $array[2];
$no2 = $array[3];
$yes3 = $array[4];
$no3 = $array[5];
$yes4 = $array[6];
$no4 = $array[7];

// Change vote count
if ($question1 == 0) {
  $yes1 = $yes1 + 1;
}
if ($question1 == 1) {
  $no1 = $no1 + 1;
}
if ($question2 == 0) {
  $yes2 = $yes2 + 1;
}
if ($question2 == 1) {
  $no2 = $no2 + 1;
}
if ($question3 == 0) {
  $yes3 = $yes3 + 1;
}
if ($question3 == 1) {
  $no3 = $no3 + 1;
}
if ($question4 == 0) {
  $yes4 = $yes4 + 1;
}
if ($question4 == 1) {
  $no4 = $no4 + 1;
}

// Write data to file
$recordvote = $yes1."||".$no1."||".$yes2."||".$no2."||".$yes3."||".$no3."||".$yes4."||".$no4;
$fp = fopen($filename,"w") or die("Unable to open file!");
fwrite($fp,$recordvote);
fclose($fp);

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
		<script src="home.js"></script>

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
						<p class="info">
						Thank you for taking the survey! Your answers have been recorded.
						</p>
					</div>
				</section>


				<section id="lower">
				<div class="container">
						<!-- Question 1 table -->
						<div class="row">
							<div class="col-sm-6 ">
								<div class="col-border">
								<h2>Question 1</h2>
								<h4>Can you lick your elbow?</h4>
									<div class="results">

										<div class="vote-yes">
											<span class="vote-title-yes">Yes: </span>
											<img src="survey1.png"
											width='<?php echo(200*round($yes1/($no1+$yes1),2)); ?>'
											height='40'>
											<span class="vote-result"><?php echo $yes1; ?> Votes</span>
										</div>

											<div class="vote-no">
												<span class="vote-title-no">No: </span>
												<img src="survey2.png"
												width='<?php echo(200*round($no1/($no1+$yes1),2)); ?>'
												height='40'>
												<span class="vote-result"><?php echo $no1; ?> Votes</span>
										</div>

									</div>
								</div>
								</div>

						<!-- Question 2 table -->
							<div class="col-sm-6">
								<div class="col-border">
								<h2>Question 2</h2>
								<h4>Do you know how to sew?</h4>
									<div class="results">

										<div class="vote-yes">
											<span class="vote-title-yes">Yes: </span>
											<img src="survey1.png"
											width='<?php echo(200*round($yes2/($no2+$yes2),2)); ?>'
											height='40'>
											<span class="vote-result"><?php echo $yes2; ?> Votes</span>
										</div>

										<div class="vote-no">
											<span class="vote-title-no">No: </span>
											<img src="survey2.png"
											width='<?php echo(200*round($no2/($no2+$yes2),2)); ?>'
											height='40'>
											<span class="vote-result"><?php echo $no2; ?> Votes</span>
									</div>

								</div>
								</div>
							</div>

						<!-- Question 3 table -->
							<div class="col-sm-6">
								<div class="col-border">
								<h2>Question 3</h2>
								<h4>Do you drink soda?</h4>
									<div class="results">

										<div class="vote-yes">
											<span class="vote-title-yes">Yes: </span>
											<img src="survey1.png"
											width='<?php echo(200*round($yes3/($no3+$yes3),2)); ?>'
											height='40'>
											<span class="vote-result"><?php echo $yes3; ?> Votes</span>
										</div>

										<div class="vote-no">
											<span class="vote-title-no">No: </span>
											<img src="survey2.png"
											width='<?php echo(200*round($no3/($no3+$yes3),2)); ?>'
											height='40'>
											<span class="vote-result"><?php echo $no3; ?> Votes</span>
									</div>

								</div>
								</div>
							</div>

						<!-- Question 4 table -->
							<div class="col-sm-6">
							<div class="col-border">
								<h2>Question 4</h2>
								<h4>Have you ever done a backflip?</h4>
									<div class="results">

										<div class="vote-yes">
											<span class="vote-title-yes">Yes: </span>
											<img src="survey1.png"
											width='<?php echo(200*round($yes4/($no4+$yes4),2)); ?>'
											height='40'>
											<span class="vote-result"><?php echo $yes4; ?> Votes</span>
										</div>

										<div class="vote-no">
											<span class="vote-title-no">No: </span>
											<img src="survey2.png"
											width='<?php echo(200*round($no4/($no4+$yes4),2)); ?>'
											height='40'>
											<span class="vote-result"><?php echo $no4; ?> Votes</span>
									</div>

								</div>
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
