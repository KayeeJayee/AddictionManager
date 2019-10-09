<?php
include 'config.php';
//Grabs a random number between 1 and 6, whichever number has been selected that suggestion 
//in the suggestion table will be grabbed and placed on the site for the user
$rand = rand(1,6);

$query = "SELECT * FROM suggestions WHERE id = '$rand'";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);
echo $row["sugg"]; //testing

?>
