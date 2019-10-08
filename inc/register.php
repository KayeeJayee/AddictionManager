<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// ---INITIALISE VARIABLES---
	$feedback = [];
	$regName = htmlspecialchars(trim($_POST["regName"]),FILTER_SANITIZE_EMAIL);
	$regPassword = htmlspecialchars(trim($_POST["regPassword"]),FILTER_SANITIZE_EMAIL);

	// ---CHECK FOR EXISTING USER---
	try{
		$user_results = mysqli_query($conn, "SELECT * FROM users WHERE username = '" .$regName. "'");
		while ($row=mysqli_fetch_row($user_results)){
			// ---CONTINUE VALIDATION---
			if(count($row) > 0) {
				echo "That user already exists. Please choose another name."; exit;
			}
		}
	}catch(Exception $e) {
		echo 'there was a problem with checking for an existing user<br>';
		echo $e->getMessage();
		exit;
	}
	
	// ---CONTINUE VALIDATION---
	// if(count($user) === 1) { //counts the number of items in an array. if could find user, it equals one
	// 	$feedback['username']= "That user already exists. Please choose another name.";
	// }

	// ---IF THERE ARE NO ISSUES, ADD THAT USER TO DATABASE---
	
		$insertQuery = "
				INSERT INTO users(username, password)
				VALUES ('" .$regName. "', '" .$regPassword. "')";
		try{
			mysqli_query($conn, $insertQuery);
			header('Location:../login.html');
			exit;
			

		}catch(Exception $e) {
			echo 'there was a problem with adding this user to the database<br>';
			echo $e->getMessage();
			exit;
		}
	

}
