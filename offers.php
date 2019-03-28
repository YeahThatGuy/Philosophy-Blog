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
	<script src="dynamic.js" type="text/javascript"></script>

</head>

<body>

	<!-- This nav block defines the navigation bar at the top; mobile friendly -->		
	<nav class="navbar navbar-inverse navbar-fixed-top navbar-light bg-light">
		<div id="navigationBar" class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Ancient Wisdom</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav customBar">
					<li class="active"><a href="home.php">Home</a></li>
					<li><a href="reviews.php">Reviews</a></li>
					<li><a href="recommendations.php">Recommendations</a></li>
					<li><a href="opinions.php">Opinions</a></li>
					<li><a href="offers.php">Offers</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="erd.php">ERD</a></li>
					<li><a href="newUser.php">Sign up</a></li>
					<li>
						<?php if(!isset($_SESSION['username'])): ?>
						<a href="loginUser.php">Login</a>
					<?php else: ?>
					<a href="logout.php">Logout</a>
				<?php endif; ?>
			</li>
			<li>
				<a href="post.php"><button type="button" class="btn btn-post btn-sm customBar">New Post</button></a>
			</li>
		</ul>
	</div>
</div>
</nav>

	<!-- Please ignore the commented code, I use it for debugging and would like to keep it here.
	<?php
	include_once('database.php');

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sql="SELECT postTitle FROM posts ORDER BY postId";

	if ($result=mysqli_query($link,$sql))
	{
		// Fetch one and one row
		while ($row=mysqli_fetch_row($result))
		{
			echo "<span>".$row[0]."</span><br/>";
			
		}
				// Free result set

	}
	mysqli_close($link);
	?> 
-->

<!--
	<div class="container">

		<div class="col-md-8">
			<h1></h1>
			<p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.
				<br>  <?php echo $_SESSION['username']; ?>  just for verification purposes to check if the session is kept while changing pages
				</p>
		</div>

	</div> -->

	<!-- List of Content -->
	<div class="container">

		<div class="row">

			<!-- Blog Entries Column -->
			<div class="col-md-8">

				<h1 class="page-header">
					Content List
					<!--<small>Secondary Text</small>-->
				</h1>


				<?php

				//Connect to the jose database by calling the mySQLi_connect function from database.php
				include('database.php');

				$sql="SELECT postId, postTitle, postText, userID, postThumbnail, postCategory, personID, username, new_date FROM posts, users WHERE userID = personID AND postCategory = 'Offer' ORDER BY postId DESC";

				if ($result=mysqli_query($link,$sql))
				{
					//Will get all the rows that were selected in $sql and according to the WHERE condition
					while ($row=mysqli_fetch_row($result))
					{
						
						/*I've used the $sql query from above in phpMyAdmin on jose, where I went into SQL and pasted it in order to get the joined tables. From there I got the number for each row.*/
						/*select and insert the post title in the list on home.php*/
						echo '<h2> <a href="#">'.$row[1].'</a> </h2>';
						/*select and insert the username in the list on home.php*/
						echo '<p class="lead"> by <a href="index.php">'.$row[7].'</a> </p>';
						echo '<p><span class="glyphicon glyphicon-time"></span> Posted on '.$row[8].'</p>';
						echo '<hr>';
						//echo '<tr>';
						echo '<a href="postFull.php?id='.$row[0].'"> <img class="img-responsive" src="images/'.$row[4].'" height="150px" width="300px"> </a>';
						//echo '</tr>';
						echo '<hr>';
						echo '<p class="col-md-14 textLimit">'.$row[2].'</p>';
						echo '<a class="btn btn-primary" href="postFull.php?id='.$row[0].'">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>';
						echo '<hr>';

					}

				}
				mysqli_close($link);

				?>

				<hr>

				<!--Change pages for the list of all content in home.php (not available yet) -->
				<ul class="pager">
					<li class="previous">
						<a href="#">&larr; Older</a>
					</li>
					<li class="next">
						<a href="#">Newer &rarr;</a>
					</li>
				</ul>

			</div>

			<!-- Blog Sidebar Widgets Column -->
			<div class="col-md-4">

				<!-- Blog Search Well -->
				<div class="well">
					<h4>Blog Search</h4>
					<div class="input-group">
						<input type="text" class="form-control">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
					</div>
					<!-- /.input-group -->
				</div>

				<!-- Blog Categories Well -->
				<div class="well">
					<h4>Blog Categories</h4>
					<div class="row">
						<div class="col-lg-6">
							<ul class="list-unstyled">
								<li><a href="#">Category Name</a>
								</li>
								<li><a href="#">Category Name</a>
								</li>
								<li><a href="#">Category Name</a>
								</li>
								<li><a href="#">Category Name</a>
								</li>
							</ul>
						</div>
						<!-- /.col-lg-6 -->
						<div class="col-lg-6">
							<ul class="list-unstyled">
								<li><a href="#">Category Name</a>
								</li>
								<li><a href="#">Category Name</a>
								</li>
								<li><a href="#">Category Name</a>
								</li>
								<li><a href="#">Category Name</a>
								</li>
							</ul>
						</div>
						<!-- /.col-lg-6 -->
					</div>
					<!-- /.row -->
				</div>

				<!-- Side Widget Well -->
				<div class="well">
					<h4>Quick Access</h4>
					<p>Most likely, I will fetch the dates (for which I'll create a row) from the posts table in MySQL. Then I'll group them by month and year.</p>
				</div>

			</div>

		</div>
		<!-- /.row -->

		<hr>

		<!-- Footer -->
		<footer>
			<div class="row">
				<div class="col-lg-12">
					<p>Copyright &copy; Ancient Wisdom 2017</p>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
		</footer>

	</div>


</body>
</html>