<?php
if(isset($_GET['id'])){
	$id = $_GET['id'];
	include 'inc/config.php';
	$addiction = mysqli_query($conn, "SELECT * FROM addiction WHERE id ='".$id."'");
	$row = mysqli_fetch_assoc($addiction);
}else{
	header("Location: index.php");
	exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$achieved = $_POST['check'] == "yes" ? true : false;
	$streak = (int)$row['streak_achieved']; 
	if($achieved){
		$streak++;
		$sql = "UPDATE addiction SET streak_achieved = '".$streak."' WHERE id ='".$id."'";
	}else{
		$sql = "UPDATE addiction SET streak_achieved = '0' WHERE id ='".$id."'";
	}
	mysqli_query($conn, $sql);
	// include functions.php and process the streak and money and provide feedback
}
include 'inc/header.php';
?>
<h2>Check in for <?php echo $row['name']?></h2>
<form action="checkin.php?id=<?php echo $id ?>" method="post">
	<input type="radio" name="check" value="yes" id="yes">
	<label for="yes">yes</label>
	<br>
	<input type="radio" name="check" value="no" id="no">
	<label for="no">no</label>
	<br>
	<button type="submit">submit</button>
</form>
