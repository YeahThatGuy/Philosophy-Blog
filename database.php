<?php
if (session_status() == PHP_SESSION_NONE) {  session_start();  }

// Connect to MySQL Jose server
$ip = gethostbyname('jose');
$link = mysqli_connect($ip, "cj16abe", "NW8iy2p3", "dbcj16abe");

// Check connection
if($link === false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>