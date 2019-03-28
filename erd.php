<?php
if (session_status() == PHP_SESSION_NONE) {  session_start();  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">

	<title>New Post</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- local CSS -->
	<link href="home.css" rel="stylesheet">

	<!-- Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="dynamic.js"></script>

	<style>
	.error {color: #FF0000;}
	</style>

</head>

<body>
	<!-- Create a navigation bar element and load the structure from the already created element in home.php -->
	<nav id="navBar" class="navbar navbar-inverse navbar-fixed-top navbar-light bg-light">
	</nav>

	<script>
	$("#navBar").load("home.php #navigationBar");
	</script>

	<div class="container organiseForm">
		<div class="row">
			<div class="col-md-10">
				<h3 class="page-header">
					The Entity Relationship Diagram between "posts" and "users"
				</h3>
				<hr>
				<img class="img-responsive" src="https://i.imgur.com/FsYyfeS.png">';

			</div>
		</div>
	</div>

</body>
</html>