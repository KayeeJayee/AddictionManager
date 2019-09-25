<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" /> <!-- identify as html-->
	<link rel="stylesheet" type="text/css" href="style/styles.css" /> <!-- links to used css document-->
<title>Pledges</title>
</head>
<body>
<?php
	if ($_POST['submit']) //the form submit button was clicked on
	{
		$code = $_POST['pledge'];
				
	}
	else //tells user there was an error in submitting
	{
		echo "<p>Error in Process</p><br>";
		echo "<a href='index.html'>Home</a> <a href='poststatusform.php'>Post status</a>";
		die();
	}
	
	require_once("settings.php"); //gets database credentials

	$connect = @mysqli_connect($host,$user,$pswd,$dbnm); //connects to the used mysql database
	
	if (!$connect) //fails to connect to a database
	{
		
		echo "<p>Database connection failure</p>";
	} 
	else 
	{
		//this query creates a table for the post if a table has not alreay been made
		$query = "CREATE TABLE IF NOT EXISTS pledgetable(
                  ID int NOT NULL AUTO_INCREMENT,
				  pledge VARCHAR(50) NOT NULL,
                  PRIMARY KEY (ID));";
		
        $result = mysqli_query($connect, $query); //executes query
		
		$query = "UPDATE pledge
				  SET pledge = '$pledge'
				  WHERE ID = 1;"; //query to check if a status code has already been used
		
		$result = mysqli_query($connect, $query); //executes query
		
	}
?>
</body>
</html> 