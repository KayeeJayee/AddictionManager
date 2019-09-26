<?php

include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// ---INITIALISE VARIABLES---
	$logUsername = trim(htmlspecialchars($_POST["logName"],FILTER_SANITIZE_EMAIL));
	$logPassword = trim(htmlspecialchars($_POST["logPassword"],FILTER_SANITIZE_EMAIL));
	
	// ---HONEYPOT VALIDATION---
	// if ($_POST["candy"] != "") {
	// 	echo "There was a problem with the information you entered.";
	//     exit;
	// }

	// ---VALIDATION---
	if ($logUsername === "" || $logPassword === "") {
		echo "All fields are required."; exit;
	}else{
		// ---CHECK FOR EXISTING USER---
		try{
			$user_results = mysqli_query($conn, "SELECT * FROM users WHERE username = '" .$logUsername. "' AND password = '" .$logPassword. "' LIMIT 1");
			while ($row=mysqli_fetch_row($user_results)){
				if(count($row) > 0) {
					$updateQuery = "
						UPDATE users
						SET session_id = '" .session_id(). "'
						WHERE user_id = '" .$row[0]. "'";
					try{
						mysqli_query($conn,$updateQuery);
						header('Location:../index.php');
						exit;
					}catch(Exception $e) {
						echo 'there was a problem with adding this session_id to the database<br>';
						echo $e->getMessage();
						exit;
					}
				}else{
					echo " Your username and password don't seem to match."; exit;
				}
			}
		}catch(Exception $e) {
			echo 'there was a problem checking for a user<br>' .$e->getMessage();
			exit;
		}
	}
}
