<?php
if (session_status() == PHP_SESSION_NONE) {  session_start();  }
date_default_timezone_set('Europe/London');
include 'commentsData.php';
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
	<link href="home.css" rel="stylesheet" type="text/css">
	<link href="home2.css" rel="stylesheet" type="text/css">

	<!-- Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

	<div class="container">

		<div class="row">

			<!-- Blog Entries Column -->
			<div class="col-md-8">

				<h1 class="page-header">
					Page Heading
					<small>Secondary Text</small>
				</h1>

				<?php
				
				include('database.php');

				$receivedPostId = $_GET['id'];
				$sql="SELECT postId, postTitle, postText, userID, postThumbnail, postCategory, personID, username, new_date FROM posts, users WHERE postId = '$receivedPostId' AND userID = personID";

				if ($result=mysqli_query($link,$sql))
				{
					while ($row=mysqli_fetch_row($result))
					{

						/*I've used the $sql query from above in phpMyAdmin on jose, where I went into SQL and pasted it in order to get the joined tables. From there I got the number for each row.*/
						/*select and insert the post title in the list on home.php*/
						echo '<h2> <a href="#">'.$row[1].'</a> </h2>';
						/*select and insert the username in the list on home.php*/
						echo '<p class="lead"> by <a href="index.php">'.$row[7].'</a> </p>';
						echo '<p><span class="glyphicon glyphicon-time"></span> Posted on '.$row[8].'</p>';	
						echo '<hr>';
						echo '<img class="img-responsive" src="images/'.$row[4].'">';
						echo '<hr>';
						//echo '<p class="col-md-14">'.$row[2].'</p>';
						//I've used the nl2br function in order to get the line breaks with php
						$textString = $row[2];
						echo '<p class="col-md-14">'.nl2br($textString).'</p>';
						echo '<hr>';
						echo '<p>tags: <mark><a href="#">'.$row[5].'</a></mark></p>';
					}
								// Free result set

				}
				mysqli_close($link);
				?>


				<!--Comments section-->
				<?php
				echo "<form method='post' action='".setComments()."'>
					<input type='hidden' name='authorID' value='Anonymous'>
					<input type='hidden' name='commentDate' value='".date('Y-m-d H:i:s')."'>
					<textarea name='comment' id='commentArea'></textarea>
					<br>
					<button type='submit' name='submitComment' id='commentButton' class='btn btn-primary btn-sm'>Comment</button>
				</form>";

				getComments();
				?>

			</div>
		</div>
	</div>


				</body>
				</html>