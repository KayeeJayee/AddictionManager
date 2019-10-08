<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$pledge = $_POST['pledge'];
		$a_id = $_POST['a_id'];
		require_once("config.php"); //gets database credentials	
	
		$query = "INSERT INTO pledges(pledge,a_id)
			  VALUES('".$pledge."','".$a_id."');"; //query to check if a status code has already been used
		
		$result = mysqli_query($conn, $query); //executes query
		header('Location:../details.php?id='.$a_id);
		exit;
	}
	else //tells user there was an error in submitting
	{
		echo "<p>Error in Process</p><br>";
		echo "<a href='.../index.php'>Home</a>";
		die();
	}

	
?>
