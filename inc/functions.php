<?php
function updateStreakGoal($currentStreak, $currentGoal, $addiction_id)
{
	include 'config.php';
	if($currentStreak < 7) {
		$currentGoal = 7;
	}
	else if($currentStreak == $currentGoal){
		if($currentGoal == 7) $currentGoal = 14;
		else if($currentGoal == 14) $currentGoal = 30;
		else if($currentGoal == 30 ) $currentGoal = 60;
	}
	$sql = "UPDATE addiction SET streak_goal = $currentGoal WHERE id = $addiction_id";
	try{
		mysqli_query($conn, $sql);
	}catch(Exception $e){
		echo "problem updating addiction ".$e->getMessage();
		exit;
	}
}
// function to update money goal
?>