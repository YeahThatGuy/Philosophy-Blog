<?php
if (session_status() == PHP_SESSION_NONE) {  session_start();  }
	
	//Take the data from the connector
	include('database.php');
	
	//If sign up button is clicked
	if(isset($_POST['register'])) {
		//Insert the newUsers form attribute data into local variables after POST
		$username = $_POST['username'];
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$userPassword = $_POST['userPassword'];
		
		//Send the data from local variables to MySQL
		$toSQL = "INSERT INTO users (username, firstName, lastName, userPassword) VALUES('$username', '$firstName', '$lastName', '$userPassword')";
		mysqli_query($link, $toSQL);
		// start the user session after signup and redirect to the home page
		$_SESSION['username'] = $username;

		header('Location: home.php');
     	exit();

	}

?>