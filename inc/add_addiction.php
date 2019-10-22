<?php 
include 'config.php';
// if data was sent via post, initialise variables
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$addiction = trim($_POST['addiction']);
	$user_id = $_SESSION['user_id'];
	$usual_money = (int)trim($_POST['money']);
	$usual_hours = (int)trim($_POST['hours']);
	$money_goal = $usual_money*2;
	$date = date("Y-m-d");
	// save data as new addiction in database
	$sql = "INSERT INTO addiction(
			user_id, name, date_created, 
			money_goal, money_achieved, money_usually_spent,
			streak_goal, streak_achieved, hours_usually_spent, hours_saved) 
	VALUES ('".$user_id."','".$addiction."','".$date."', 
			".$money_goal.", 0, ".$usual_money.", 
			7, 1, ".$usual_hours.", 0)";
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
