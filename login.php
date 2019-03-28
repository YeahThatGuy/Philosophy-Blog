<?php
if (session_status() == PHP_SESSION_NONE) {  session_start();  }

//Take the data from the connector
include('database.php');

$username = $_POST['username'];
$userPassword = $_POST['userPassword'];

//If log in button is clicked
if(isset($_POST['login'])) {
	
	SignIn();

}

function SignIn() {

//session_start();   //starting the session for user profile page
if(!empty($_POST['username'])) {
	//session_start();
	include('database.php');
	$checkSQL = mysqli_query($link, "SELECT * FROM users where username = '".$_POST['username']."' AND userPassword = '".$_POST['userPassword']."'");
	$row = mysqli_fetch_array($checkSQL);
	if(!empty($row['username']) AND !empty($row['userPassword'])) {
		$_SESSION['username'] = $row['username'];
		//echo $_SESSION['username'];
		header('Location: home.php');
     	exit();
	} else {
		echo "Something went wrong, try again.";
	}
}

}

?>