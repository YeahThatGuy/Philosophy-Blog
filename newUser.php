<?php 
if (session_status() == PHP_SESSION_NONE) {  session_start();  }
include('usersData.php'); 
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>

	<!-- local CSS -->
	<link href="home.css" rel="stylesheet">

	<!-- Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="dynamic.js"></script>
	<script src="custom_tags_input.js"></script>

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
		<form id="newUsers" action="usersData.php" method="post">
			<fieldset>
				
					<div class="form-group center_div">
						<label>Username</label>
						<input type="text" name="username" class="form-control" placeholder="Your username">
						<br>
					</div>

					<div class="form-group center_div">
						<label for="firstName">First name</label>
						<input type="text" name="firstName" class="form-control" placeholder="Your first name">
						<br>
					</div>

					<div class="form-group center_div">
						<label for="lastName">Last name</label>
						<input type="text" name="lastName" class="form-control" placeholder="Your last name">
						<br>
					</div>

					<div class="form-group center_div">
						<label for="userPassword">Password</label>
						<input type="password" name="userPassword" class="form-control" placeholder="Your password">
						<br>
					</div>

					<div class="center_div">
						<button type="submit" id="sub" name="register" class="btn btn-primary">Submit</button>
					</div>
				
			</fieldset>
		</form>
	</div>

</body>
</html>