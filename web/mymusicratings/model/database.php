<?php

/* Localhost Settings */
// Error reporting (not for production)
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Open session
session_start();

// Database credentials
$dbUser = 'postgres';
$dbPassword = 'password';
$dbName = 'localhost';
$dbHost = 'localhost';
$dbPort = '5432';

try {
$db = new PDO("pgsql:host=$dbHost port=$dbPort dbname=$dbName user=$dbUser password=$dbPassword");
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch (PDOException $ex) {
		// Not for production
		echo "Error connecting to DB. Details: $ex";
		die();
	}

/* Production Settings
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
 */

?>
