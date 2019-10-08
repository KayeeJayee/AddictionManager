<?php
// details
if(isset($_GET['id'])){
	$id = $_GET['id'];
	include 'inc/config.php';
	$addiction = mysqli_query($conn, "SELECT * FROM addiction WHERE id ='".$id."'");
	$row = mysqli_fetch_assoc($addiction);
}else{
	header("Location: index.php");
	exit;
}
// header
include 'inc/header.php';
?>
<!-- form to add pledge -->
<h2><?php echo $row['name']?></h2>
<a href="checkin.php?id=<?php echo $id?>">How are you doing?</a>
<form action="inc/pledge.php" method ="post">
	Add Daily Pledge: <input type="text" name="pledge">
	<input type="hidden" name="a_id" value="<?php echo $id?>">
	<input type="submit" name="submit" value="+"> <input type="reset" value="reset" />
</form>

<?php include 'inc/footer.php' ?>