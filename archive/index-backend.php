<?php 
// retrieve addictions
include 'inc/config.php';
if($user_logged_in){
	$addictions = mysqli_query($conn, "SELECT * FROM addiction WHERE user_id = ".$_SESSION['user_id']);
	if (mysqli_num_rows($addictions) > 0) {
	    while($row = mysqli_fetch_assoc($addictions)) {
	        echo "<a href='details.php?id=".$row["id"]."'>ID: " . $row["id"]. ", Name: " . $row["name"]. "</a><br>";
	    }
	} else {
	    echo "0 results";
	}
	mysqli_close($conn);
}
// include header
include "inc/header.php"; 
// form to add addiction
?>
<h2>All goals</h2>
<?php if($user_logged_in){ ?>
			<form method="post" action="inc/add_addiction.php">
				<input type="text" name="addiction" placeholder="Add an addiction">
				<button type="submit">+</button>
			</form>
		<?php }else{
			echo "<a href='login.html'>You must be logged in to add addictions.</a>";
		} ?>
<?php include "inc/footer.php"; ?>