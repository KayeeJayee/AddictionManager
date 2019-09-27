<?php
	$page_title = isset($page_title) ? $page_title : "Addiction Manager";
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page_title ?></title>
</head>
<body>

<header>
	<h1>Addiction Manager</h1>
	<?php if (isset($_SESSION['username'])) { ?>
		<p>Welcome, <?php echo $_SESSION['username']; ?>! <a href="inc/logout.php">Log out</a></p>
	<?php } else { ?>
		<p><a href="login.html">Log in</a></p>
	<?php } ?>
</header>
<main>