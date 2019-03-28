<?php
if (session_status() == PHP_SESSION_NONE) {  session_start();  }

function setComments() {
	if (isset($_POST['submitComment'])) {

		include('database.php');

		$authorID = $_POST['authorID'];
		$comment = $_POST['comment'];
		$commentDate = date("Y-m-d H:i:s");

		$foreignKeySQL = mysqli_query($link, "SELECT username, personID FROM users where username = '".$_SESSION['username']."'");
		$row = mysqli_fetch_array($foreignKeySQL);
		$authorID = $row['personID'];

		$receivedPostId = $_GET['id'];
		$foreignKeySQL2 = mysqli_query($link, "SELECT userID, postId FROM posts where userID = '".$_SESSION['username']."'");
		$row2 = mysqli_fetch_array($foreignKeySQL);
		$currentPost = $row2['postId'];
		
		$toSQL = "INSERT INTO comments_section (comment, authorID, commentDate, currentPost) VALUES('$comment', '$authorID', '$commentDate', '$currentPost')";

		mysqli_query($link, $toSQL);
	}
}

function getComments() {
	include('database.php');

	$sql="SELECT commentID, comment, authorID, commentDate, currentPost, personID, username, postId FROM comments_section, users, posts WHERE personID = authorID AND postId = currentPost";
	$result=mysqli_query($link,$sql);
	while ($row=mysqli_fetch_row($result)) {
		echo $row[1]."<br><br>";
	}
	
	
}

?>