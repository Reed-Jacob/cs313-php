<?php
//Production Settings

// Open session
 session_start();

// Database credentials
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
          window.location.href='../index.php';
          </SCRIPT>");
 exit;
 }

?>
