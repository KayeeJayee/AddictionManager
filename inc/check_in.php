
<?php

if(isset($_GET['id']) && isset($_GET['check'])){
	// setup
	$id = $_GET['id'];
	include 'config.php';
	$addiction = mysqli_query($conn, "SELECT * FROM addiction WHERE id ='".$id."'");
	$row = mysqli_fetch_assoc($addiction);
	$achieved = $_GET['check'] == "y" ? true : false;
	$streak = (int)$row['streak_achieved'];
	$save = (int)$row['saving']; //added this
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
			$moneysaved = $row['money_achieved'] + $save; //Added this
			$sql = "UPDATE addiction SET streak_achieved = '".$streak."' WHERE id ='".$id."'";
			$sql2 = "UPDATE addiction SET money_achieved = '".$moneysaved."' WHERE id ='".$id."'"; //added this
		}
	// else user said no
	}else{
		$streak = 0;
		$sql = "UPDATE addiction SET streak_achieved = '".$streak."' WHERE id ='".$id."'";
	}
	// send data and redirect
	mysqli_query($conn, $sql);
	mysqli_query($conn, $sql2); //added this
	include 'functions.php';
	updateStreakGoal($streak, $row['streak_goal'], $id);
	header("Location: ../index.php");
	exit;
}else{
	header("Location: ../index.php");
	exit;
}
?>
