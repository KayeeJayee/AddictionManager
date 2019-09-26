<?php
if(isset($_GET['id'])){
	$id = $_GET['id'];
	include 'inc/config.php';
	$addiction = mysqli_query($conn, "SELECT * FROM addiction WHERE id ='".$id."'");
	while($row = mysqli_fetch_assoc($addiction)) {
        echo "ID: " . $row["id"]. ", Name: " . $row["name"]. "<br>";
    }
	
}else{
	header("Location: index.php");
	exit;
}