<?php

    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    session_start();

    // Redirect user if not logged in
    if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    }

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

        <!-- Form Start -->
        <form action="addconfirm.php" method="post">
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
           <input type="number" min="1887" max="2017" name="albumyear" class="form-control edit" placeholder="Year" aria-describedby="basic-addon1" required>
         </div>
         <br>


         <h3>Track Details</h3>
<!-- To be used if JavaScript does not work out
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Track 1</span>
            <input type="text" name="tracktitle0"class="form-control edit" placeholder="Track Title" aria-describedby="basic-addon1">
            <span class="input-group-addon">Favorite: <input type="checkbox" name="trackfavorite0" value="tracktrue0">
            <input type="hidden" name="tracknumber0" value="1"></span>
          </div>

          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Track 2</span>
            <input type="text" name="tracktitle1"class="form-control edit" placeholder="Track Title" aria-describedby="basic-addon1">
            <span class="input-group-addon">Favorite: <input type="checkbox" name="trackfavorite1" value="tracktrue1">
            <input type="hidden" name="tracknumber1" value="2"></span>
          </div>

          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Track 3</span>
            <input type="text" name="tracktitle2"class="form-control edit" placeholder="Track Title" aria-describedby="basic-addon1">
            <span class="input-group-addon">Favorite: <input type="checkbox" name="trackfavorite2" value="tracktrue2">
            <input type="hidden" name="tracknumber2" value="3"></span>
          </div>

          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Track 4</span>
            <input type="text" name="tracktitle3"class="form-control edit" placeholder="Track Title" aria-describedby="basic-addon1">
            <span class="input-group-addon">Favorite: <input type="checkbox" name="trackfavorite3" value="tracktrue3">
            <input type="hidden" name="tracknumber3" value="4"></span>
          </div>

          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Track 5</span>
            <input type="text" name="tracktitle4"class="form-control edit" placeholder="Track Title" aria-describedby="basic-addon1">
            <span class="input-group-addon">Favorite: <input type="checkbox" name="trackfavorite4" value="tracktrue4">
            <input type="hidden" name="tracknumber4" value="5"></span>
          </div>

          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Track 6</span>
            <input type="text" name="tracktitle5"class="form-control edit" placeholder="Track Title" aria-describedby="basic-addon1">
            <span class="input-group-addon">Favorite: <input type="checkbox" name="trackfavorite5" value="tracktrue5">
            <input type="hidden" name="tracknumber5" value="6"></span>
          </div>

          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Track 7</span>
            <input type="text" name="tracktitle6"class="form-control edit" placeholder="Track Title" aria-describedby="basic-addon1">
            <span class="input-group-addon">Favorite: <input type="checkbox" name="trackfavorite6" value="tracktrue6">
            <input type="hidden" name="tracknumber6" value="7"></span>
          </div>

          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Track 8</span>
            <input type="text" name="tracktitle7"class="form-control edit" placeholder="Track Title" aria-describedby="basic-addon1">
            <span class="input-group-addon">Favorite: <input type="checkbox" name="trackfavorite7" value="tracktrue7">
            <input type="hidden" name="tracknumber7" value="8"></span>
          </div>

          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Track 9</span>
            <input type="text" name="tracktitle8"class="form-control edit" placeholder="Track Title" aria-describedby="basic-addon1">
            <span class="input-group-addon">Favorite: <input type="checkbox" name="trackfavorite8" value="tracktrue8">
            <input type="hidden" name="tracknumber8" value="9"></span>
          </div>

          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Track 10</span>
            <input type="text" name="tracktitle9"class="form-control edit" placeholder="Track Title" aria-describedby="basic-addon1">
            <span class="input-group-addon">Favorite: <input type="checkbox" name="trackfavorite9" value="tracktrue9">
            <input type="hidden" name="tracknumber9" value="10"></span>
          </div>

          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Track 11</span>
            <input type="text" name="tracktitle10"class="form-control edit" placeholder="Track Title" aria-describedby="basic-addon1">
            <span class="input-group-addon">Favorite: <input type="checkbox" name="trackfavorite10" value="tracktrue10">
            <input type="hidden" name="tracknumber10" value="11"></span>
          </div>

          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Track 12</span>
            <input type="text" name="tracktitle11"class="form-control edit" placeholder="Track Title" aria-describedby="basic-addon1">
            <span class="input-group-addon">Favorite: <input type="checkbox" name="trackfavorite11" value="tracktrue11">
            <input type="hidden" name="tracknumber11" value="12"></span>
          </div>

          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Track 13</span>
            <input type="text" name="tracktitle12"class="form-control edit" placeholder="Track Title" aria-describedby="basic-addon1">
            <span class="input-group-addon">Favorite: <input type="checkbox" name="trackfavorite12" value="tracktrue12">
            <input type="hidden" name="tracknumber12" value="13"></span>
          </div>

          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Track 14</span>
            <input type="text" name="tracktitle13"class="form-control edit" placeholder="Track Title" aria-describedby="basic-addon1">
            <span class="input-group-addon">Favorite: <input type="checkbox" name="trackfavorite13" value="tracktrue13">
            <input type="hidden" name="tracknumber13" value="14"></span>
          </div>

          <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Track 15</span>
            <input type="text" name="tracktitle14"class="form-control edit" placeholder="Track Title" aria-describedby="basic-addon1">
            <span class="input-group-addon">Favorite: <input type="checkbox" name="trackfavorite14" value="tracktrue14">
            <input type="hidden" name="tracknumber14" value="15"></span>
          </div>
-->
          <!-- Javascript to control the number of track inputs. Erases previous input (don't know how to fix...) -->
          <button class="btn btn-primary btn-margin" type="button" onclick="addInput()"/>Add Track</button>
          <span id="albumtrack"></span>
          <script>
          var countinput = 1;
          var inputname = 0;
          function addInput()
          {
          document.getElementById('albumtrack').innerHTML+='<div class="input-group"><span class="input-group-addon" id="basic-addon1">Track '+countinput+'</span><input type="text" name="tracktitle'+inputname+'"class="form-control edit" placeholder="Track Title" aria-describedby="basic-addon1" required><span class="input-group-addon">Favorite: <input type="checkbox" name="trackfavorite'+inputname+'" value="tracktrue'+inputname+'"><input type="hidden" name="tracknumber'+inputname+'" value="'+countinput+'"></span></div>';
               countinput += 1;
               inputname += 1;
          }
          </script>
          <br>

         <button class="btn btn-primary btn-margin" type="submit">Submit</button>

         </form>
         <a href="mymusicratings.php"><button class="btn btn-primary btn-margin">Cancel</button></a>

        </div>
      </div>
    </div>
  </body>

</html>
