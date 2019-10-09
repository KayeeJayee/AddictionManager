<?php 
include 'config.php';
// if data was sent via post, initialise variables
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$addiction = trim($_POST['addiction']);
	$user_id = $_SESSION['user_id'];
	$date = date("Y-m-d");
	// save data as new addiction in database
	$sql = "INSERT INTO addiction(
			user_id, name, date_created, 
			money_goal, money_achieved, 
			streak_goal, streak_achieved) 
	VALUES ('".$user_id."','".$addiction."','".$date."', 50, 0, 7, 1)";
	try{
		mysqli_query($conn, $sql);
		// return to home page
		header("Location:../index.php");
		exit;
	}catch(Exception $e){
		echo "problem inserting addiction ".$e->getMessage();
		exit;
	}
}
else{ // if someone illegally accessed this file ,send them away
	header("Location:../index.php");
	exit;
}
