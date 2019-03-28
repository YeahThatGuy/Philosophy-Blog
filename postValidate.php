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
		
		<?php
			// define variables and set to empty values
			$num1 = $num2 = "";
			$num1Err = $num2Err = "";
			
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if (empty($_POST["num1"])) {
					$num1Err = "Inputting a number is required";
					} else {
					$num1 = test_input($_POST["num1"]);
					if(preg_match("/^[a-zA-Z ]*$/",$num1)) {
						$num1Err = "Only numbers are allowed";
					}
				}
				
				if (empty($_POST["num2"])) {
					$num2Err = "Inputting a number is required";
					} else {
					$num2 = test_input($_POST["num2"]);
					if(preg_match("/^[a-zA-Z ]*$/",$num2)) {
						$num2Err = "Only numbers are allowed";
					}
				}
			}
			
			function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
		?>
		
		<h2>A simple server side calculator via PHP</h2>
		
		<!--
			<p><span class="error">* required</span></p>
			
			
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<input type="text" name="num1" value="<?php echo $num1;?>">
			<span class="error">* <?php echo $num1Err;?></span>
			<br>
			<input type="text" name="num2" value="<?php echo $num2;?>">
			<span class="error">* <?php echo $num2Err;?></span>
			<br>
			
			<input type="submit" name="submit" value="Sum">
			</form>
		-->
		
		
		<form>
			<fieldset>
				<div class="form-group center_div">
					<label for="postTitle">Post Title</label>
					<input type="text" id="postTitle" class="form-control" placeholder="Your title">
					<br>
				</div>
				<div class="form-group center_div">
					<label for="postCategorySelect">Post Category</label>
					<select id="postCategorySelect" class="form-control">
						<option>Review</option>
						<option>Recommendation</option>
						<option>Opinion</opinion>
						<option>Offer</option>
					</select>
					<br>
				</div>
				<div class="form-group center_div">
					<label for="postText">Post</label>
					<textarea id="postText" class="form-control" rows="8" placeholder="Write your post here"></textarea>
					<br>
				</div>
				
				<div class="form-group center_div">
					<label for="postThumbnail">Book thumbnail</label>
					<input type="file" id="postThumbnail">
					<p class="help-block">Upload a book(s) thumbnail for this post</p>
					<br>
				</div>
				
				<div class="checkbox center_div">
					<label>
						<input type="checkbox"> Can't check this
					</label>
				</div>
				<br>
				
				<div class="center_div">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</fieldset>
		</form>
		
		<?php
			echo "<h3>Result:</h3>";
			
			if(isset($_POST["submit"])) {
				if (is_numeric($num1) && is_numeric($num2)) {
					echo $num1 + $num2;
					} else {
					echo '<p><span class="error">Feed me numbers!</span></p>';
				}
			}
		?>
		
		<?php
			// Connect to MySQL Jose server
			$ip = gethostbyname('jose');
			$link = mysqli_connect($ip, "cj16abe", "NW8iy2p3", "dbcj16abe");
			
			// Check connection
			if($link === false){
				die("ERROR: Could not connect. " . mysqli_connect_error());
			}
			
			// print host information
			echo "Connect Successfully. Host info: " . mysqli_get_host_info($link);
			
			$sql = "CREATE TABLE IF NOT EXISTS users(
			id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
			userName VARCHAR(15) NOT NULL UNIQUE,
			firstName VARCHAR(30) NOT NULL,
			lastName VARCHAR(30) NOT NULL,
			userPassword VARCHAR(30) NOT NULL,
			rating INT
			)";
			
			if(mysqli_query($link, $sql)){
				echo "Table created successfully.";
				} else{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
			
			$sql = "INSERT INTO USERS (userName, firstName, lastName, userPassword, rating) VALUES ()";
						
		?>
		
		<?php
			// Disconnect
			mysqli_close($link);
		?>
		
	</body>
</html>