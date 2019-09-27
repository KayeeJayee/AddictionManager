<?php 
include 'inc/config.php';
// function
$addictions = mysqli_query($conn, "SELECT * FROM addiction");
if (mysqli_num_rows($addictions) > 0) {
    while($row = mysqli_fetch_assoc($addictions)) {
        echo "<a href='details.php?id=".$row["id"]."'>ID: " . $row["id"]. ", Name: " . $row["name"]. "</a><br>";
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
// end function
include "inc/header.php"; ?>
<h2>All goals</h2>
<?php if($user_logged_in){ ?>
			<form method="post" action="inc/add_addiction.php">
				<input type="text" name="addiction" placeholder="Add an addiction">
				<button type="submit">+</button>
			</form>
		<?php }else{
			echo "<a href='login.php'>You must be logged in to add addictions.</a>";
		} ?>
<?php include "inc/footer.php"; ?>
<!-- 
	FOR OLIVER:
	Create conn user 
	Settings display errors
	Export conn
 -->

 <!-- 
 	FROM MAC:
	GET OS ASSIGNMENT TASK 1
	GET MAMP FILES
	GET DOCUMENTS://
  -->