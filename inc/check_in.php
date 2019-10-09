
<?php

if(isset($_GET['id']) && isset($_GET['check'])){
	// setup
	$id = $_GET['id'];
	include 'config.php';
	$addiction = mysqli_query($conn, "SELECT * FROM addiction WHERE id ='".$id."'");
	$row = mysqli_fetch_assoc($addiction);
	$achieved = $_GET['check'] == "y" ? true : false;
	$streak = (int)$row['streak_achieved']; 
	// check if achieved
	if($achieved){
		// check if checked-in on time
		$diff = time() - strtotime($row['achieved_stamp']);
		$day = round($diff / 86400 );
		if ($day > 0)
		{ // lost streak
			$streak = 0;
		  $sql = "UPDATE addiction SET streak_achieved = '".$streak."' WHERE id ='".$id."'";
		}
		else
		{ // all good, update streak
			$streak++;
			$sql = "UPDATE addiction SET streak_achieved = '".$streak."' WHERE id ='".$id."'";
		}
	// else user said no
	}else{
		$streak = 0;
		$sql = "UPDATE addiction SET streak_achieved = '".$streak."' WHERE id ='".$id."'";
	}
	// send data and redirect
	mysqli_query($conn, $sql);
	include 'functions.php';
	updateStreakGoal($streak, $row['streak_goal'], $id);
	header("Location: ../index.php");
	exit;
}else{
	header("Location: ../index.php");
	exit;
}
?>
