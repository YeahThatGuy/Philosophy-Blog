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
					What I am attempting to do
				</h3>
				<blockquote>
					<p>In this project, my purpose is to create a community website, which targets a specific niche. The niche that I attempt to cover is related to readers and enthusiasts of a particular school of philosophy. Specifically, this platform is intended for those users who want to review and recommend books centred around the principles of Ancient Greek philosophy. There are also sections such as “Opinions”, where users can reflect on their thoughts and findings by sharing them with the community. The “Offers” section will provide a platform for exchanging books. 
						<br>
						<br>
						The home page will collect all the data that was submitted by registered users. Even at this stage, if the user were to post something without being registered, the website will prevent him from doing that and it will output an alert to register/login. The data on the home page will be partial, as I restricted it to the “post title”, “username”, “photo thumbnail” and “main text”. In the background however, my query to SQL collects the unique “post ID” from each post on the home page and links that id to a separate page, where the full details will be presented. That page can be accessed by clicking on the “Read More” button beneath a post. Currently, as opposed to the home, the full details page displays the following extra content:
						<ul>
							<li>The image is in a higher resolution</li>
							<li>The text is full</li>
							<li>It has tags for categories (Review, Recommendation, Opinion, Offer)</li>
						</ul>
						<br>
						A comment section will be developed, where registered users will be able to chat. A rating system will also be implemented. The rating system will be broken down in two: post and user rating. Each post will have its rating. A user’s rating will be composed of the sum of the ratings of his posts.
						<br>
						This prototype website has been built from scratch with HTML/PHP/JavaScript/MySQL. The CSS is based around bootstrap, where some elements and classes have been slightly overridden in my local CSS. This prototype focuses on functionality firstly, so the visual design is yet to undergo considerable changes.
						<br>
						I’ve used PHP mainly as opposed to JavaScript in order to hide the data and the functionality of the code on the server side. In this way, the code is less prone to injections and other alterations from the outside. JavaScript and JQuery were employed to load the navigation bar element from the home page, across all the pages. 
						<br>
						<br>
						On a high level, the architecture of this website looks like the following at this moment:
						<br>
						<br>
						<ol>
							<li>“database.php” – This is the connector. Here the connection to jose’s server is established and this page is called on most of the pages</li>
							<br>
							<li>“home.php” – The main page, which lists all the content. Currently ordered by “postID” in descending order, so the newest posts will appear closer to the top.</li>
							<br>
							<li>“newUser.php” – The sign up page, which stores just the layout of the page and what the client sees. When the submit button is pressed, a call is made to “usersData.php”</li>
							<br>
							<li>“usersData.php” – Here the local variables collect the posted data from the newUser form and then that data is inserted into MySQL, in the table users. A session will be assigned to the username upon successful login, which will carry on across all pages and will stop at logout/exit.</li>
							<br>
							<li>“loginUser.php” – The login page, which stores just the layout and what the client sees. Pressing the submit button will call “login.php”</li>
							<br>
							<li>“login.php” – Here the code will verify if a row with such a username as the one inputted in the form on loginUser exists. If both username and password are correct then a session for that username will start and the user will be redirected to the home page.</li>
							<br>
							<li>“logout.php” – You will notice a conditional statement for Login/Logout in the navigation bar. A condition has been set, which will check if a session has been assigned a username from the users table. If that didn’t happen, either via registration or login then instead of a “Login” button, the user will see a “Logout” button.</li>
							<br>
							<li>“post.php” – When pressing the “New Post” button from the top, a form will be displayed. This page will collect the data that the user enters and will send it by post to “postsData.php” for processing.</li>
							<br>
							<li>“postsData.php” – Here the data is fed into local variables, which subsequently feed into the table rows for posts. Here, a relationship can be noticed between my two tables (users and posts). I have assigned the primary key “personID” from users as a foreign key called “userID” in posts in order to be able to bind the post to an existing user. Thanks to $userID, I can manipulate the posts table to only what the current user from the session needs to send/receive.</li>
							<br>
							<li>“postFull.php” – This page showcases the full post. By pressing on “Read More” from home, the user will be able to see the full view for that post. I managed this by appending “?id + my unique postID for a specific post” to the “postFull.php” address. Then the postID that has been sent to this page is retrieved and stored in a local variable. The tables are drilled down to just the rows for this post when two conditions are met: 1) the postID coincides to the id that was sent from the previous page; 2) the foreign key is confirmed</li>
						</ol>
						<br>
						Please try the following to check the functionality:
						<br>
						<ul>
							<li>Sign up</li>
							<li>Log out after sign up, then log in</li>
							<li>Write a new post</li>
							<li>See your post on the home page</li>
							<li>Press on "Read More" to see the full post</li>
							<li>Check the ERD diagram from the ERD tab on the nabvar</li>
						</ul>
						<br>

						I realise that my submission is late as of now, thus qualifying for a maximum of 50%. I am quite confident that if I had more time out of work and if I were to stick with the web forms then I would have managed prior to the first deadline. However, I decided that I would push without the web forms in order to gain employable skills, even if it’s my first time doing server side coding and PHP. It took me roughly 200 hours to get here with this assignment, as opposed to the expected 35, but I am glad that I did. Now, I am confident with the language and I understand the architecture behind my website. I am looking forward to my full website and I hope that you will like it too.

					</p>
					<small>Thank you, <cite>Christian</cite></small>
				</blockquote>
			</div>
		</div>
	</div>

</body>
</html>