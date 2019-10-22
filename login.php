<?php
include('inc/config.php');
if(isset($_SESSION['user_id'])){
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
	$user_logged_in = false;
	mysqli_close($conn);
	unset($_SESSION['user_id']);
	session_destroy();
}
?>
<DOCTYPE html>
<html lang="en">
<head>
	<title>Addiction_Manager</title>
	<meta charset="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<div class="container" id="container">
	<!-- sign-up container contents -->
	<div class="form-container sign-up-container">
		<form action="inc/register.php" method="post">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><img src="images/fbicon.jpg" width="40" height="40"></a>
				<a href="#" class="social"><img src="images/google.jpg" width="40" height="40"></a>
			</div>
			<span>or create an account</span>
			<input type="text" placeholder="Name" name="regName" />
			<input type="password" placeholder="Password" name="regPassword"/>
			<button>Sign Up</button>
		</form>
	</div>
	<!-- sign-in container contents -->
	<div class="form-container sign-in-container">
		<form action="inc/login.php" method="post">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><img src="images/fbicon.jpg" width="40" height="40"></a>
				<a href="#" class="social"><img src="images/google.jpg" width="40" height="40"></a>
			</div>
			<span>or use your account</span>
			<input type="text" placeholder="Name" name="logName" />
			<input type="password" placeholder="Password" name="logPassword" />
			<a href="#">Forgot your password?</a>
			<button>Sign In</button>
		</form>
	</div>
	<!-- sliding contents -->
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>Already have an account?</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/mainjs.js"></script>
</body>
</html>
