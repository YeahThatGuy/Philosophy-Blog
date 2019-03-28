<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		
		<title>PHP in HTML Example</title>
		
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
		
	</head>
	
	
	<body>
		<!-- Create a navigation bar element and load the structure from the already created element in home.php -->
		<nav id="navBar" class="navbar navbar-inverse navbar-fixed-top navbar-light bg-light">
		</nav>
		
		<script>
			$("#navBar").load("home.php #navigationBar");
		</script>
		
		<?php
			$example = 'example';
			$wellArray = array (
			'Arrays are a lot of fun.',
			'Bootstrap is an amazing development tool to use with PHP',
			'With bootstrap you can quickly code and design beautiful websites'
			);
		?>
		
		<h1>Short code <?=$example;?></h1>
		<?php foreach($wellArray as $well) {
			print "<div class='well'>$well</div>";
		}
		?>
	</body>
</html>