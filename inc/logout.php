<?php
include('config.php');
$logoutQuery = "
	UPDATE users
	SET session_id = null
	WHERE user_id = '" .$_SESSION['user_id']. "'";
try{
	mysqli_query($conn, $logoutQuery);	
}catch(Exception $e) {
	echo 'there was a problem logging out<br>';
	echo $e->getMessage();
	exit;
}
mysqli_close($conn);
unset($_SESSION['user_id']);
session_destroy();
header('Location:../login.html');
exit;
?>