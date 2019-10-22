<?php 
include 'config.php';
// if data was sent via post, initialise variables
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$addiction = trim($_POST['addiction']);
	$user_id = $_SESSION['user_id'];
	$money = $_POST['money']
	$date = date("Y-m-d");
	// save data as new addiction in database
	$sql = "INSERT INTO addiction(
			user_id, name, date_created, 
			spending, money_achieved, 
			streak_goal, streak_achieved) 
	VALUES ('".$user_id."','".$addiction."','".$date."', '".$money."', 0, 7, 1)"; //change money_goal column to spending
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
