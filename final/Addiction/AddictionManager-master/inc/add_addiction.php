<?php 
include 'config.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$addiction = trim($_POST['addiction']);
	//$user_id = $_SESSION['user'][0]['user_id']; HERE
	$user_id = 1;
	$date = date("Y-m-d");

	$sql = "INSERT INTO addiction(
						user_id, name, date_created, 
						money_goal, money_achieved, 
						streak_goal, streak_achieved) 
		VALUES ('".$user_id."','".$addiction."','".$date."', 50, 0, 7, 0)";
	try{
		mysqli_query($conn, $sql);
		header("Location:../index.php");
		exit;
	}catch(Exception $e){
		echo "problem inserting addiction ".$e->getMessage();
		exit;
	}
}else{
	header("Location:../index.php");
	exit;
}