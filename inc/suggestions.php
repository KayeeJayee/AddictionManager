<?php
include 'config.php';
$rand = rand(1,6);

$query = "SELECT * FROM suggestions WHERE id = '$rand'";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);
echo $row["sugg"]; // find a place to put this 

?>