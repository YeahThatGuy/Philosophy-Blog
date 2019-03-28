<?php
if (session_status() == PHP_SESSION_NONE) {  session_start();  }

//$msg = "";
//Prevent unlogged guests from submitting posts by checking if they have a logged in session
if (isset($_POST['submitPost']) && isset($_SESSION['username'])) {

	//Specifies the folder location for uploaded thumbnails on the server
	$target = "images/".basename($_FILES['image']['name']);
	
	//Take the data from the connector
	include('database.php');

	//Insert the newPosts form attribute data into local variables after POST
	$postTitle = $_POST['postTitle'];
	$postCategory = $_POST['postCategory'];
	$postText = $_POST['postText'];
	//str_replace with escape the the special character " ' "
	$postText = str_replace("'", "\\'", $postText);
	$postThumbnail = $_FILES['image']['name'];
	$new_date = date("Y-m-d H:i:s");
	//$tag = $_POST['tag'];
	
	//Row userID has been set up as a foreign key, which will use the data from personID in the table users to create a 1 to many relationship between users and posts.
	$foreignKeySQL = mysqli_query($link, "SELECT username, personID FROM users where username = '".$_SESSION['username']."'");
	$row = mysqli_fetch_array($foreignKeySQL);
	$userID = $row['personID'];
	
	//Send the data from local variables to MySQL
	$toSQL = "INSERT INTO posts (postTitle, postCategory, postText, postThumbnail, userID, new_date) VALUES('$postTitle', '$postCategory', '$postText', '$postThumbnail', '$userID', '$new_date')";

	mysqli_query($link, $toSQL);

	move_uploaded_file($_FILES['image']['tmp_name'], $target);
	echo '<script language="javascript">';
	echo 'window.location.href = "home.php";';
	echo '</script>';
	
} else {
	//Prevent unlogged guests from submitting posts
	echo '<script language="javascript">';
	echo 'alert("Please sign up or log in firstly.");';
	echo 'window.location.href = "home.php";';
	echo '</script>';
}


	/*
		//If successful then return to home page
		if (mysqli_query($link, $toSQL))
		//header("Location: home.php");
		//exit(); 
		echo 'Success: Data passed to the table.';
		else
		echo 'Failure: Data not passed to table.';
	*/
		?>