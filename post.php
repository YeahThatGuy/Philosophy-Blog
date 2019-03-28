<?php
if (session_status() == PHP_SESSION_NONE) {  session_start();  }
date_default_timezone_set('Europe/London');
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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">
	

	<!-- local CSS -->
	<link href="home.css" rel="stylesheet">

	<!-- Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
	<script src="dynamic.js" type="text/javascript"></script>
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
		<!-- Form for submitting posts, links into postsData to assign the data to MySQL column fields; postsData in its turn links into database for establishing the connection with MySQL -->
		<form id="newPosts" action="postsData.php" method="post" enctype="multipart/form-data">
			<fieldset>

				<div class="form-group center_div">
					<label for="postTitle">Post Title</label>
					<input type="text" name="postTitle" class="form-control" placeholder="Your title">
					<br>
				</div>

				<!-- Drop down menu -->
				<div class="form-group center_div">
					<label for="postCategory">Post Category</label>
					<select name="postCategory" class="form-control">
						<option>Review</option>
						<option>Recommendation</option>
						<option>Opinion</opinion>
							<option>Offer</option>
					</select>
					<br>
				</div>

				<div class="form-group center_div">
					<label for="postText">Post</label>
					<textarea name="postText" class="form-control" rows="8" placeholder="Write your post here"></textarea>
					<br>
				</div>

				<div class="form-group center_div">
					<label for="postTag">Tags</label>
					<input type="text" id="tag" name="tag" data-role="tagsinput" class="form-control" />
					<br>
				</div>

				<div class="form-group center_div">
					<label for="image">Book thumbnail</label>
					<input type="file" name="image">
					<p class="help-block">Upload a book(s) thumbnail for this post</p>
					<br>
				</div>

				<div class="center_div">
					<button type="submit" id="sub" name="submitPost" class="btn btn-primary">Submit</button>
				</div>

			</fieldset>
		</form>
	</div>

</body>
</html>