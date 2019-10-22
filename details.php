<?php
// details

if(isset($_GET['id'])){
  $id = $_GET['id'];
  include 'inc/config.php';
  include 'inc/suggestions.php';
  $addiction = mysqli_query($conn, "SELECT * FROM addiction WHERE id ='".$id."'");
  $pledgesQuery = mysqli_query($conn, "SELECT * FROM pledges WHERE a_id ='".$id."'");
  $row = mysqli_fetch_assoc($addiction);
  $calcMilestone = (int)$row['streak_goal'] - (int)$row['streak_achieved'];
  
}else{
  header("Location: index.php");
  exit;
}

?>
<!-- header -->
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/details.css">
</head>
<body>

<div id="textbox">
<a href="#" onclick="history.back()"><img class="alignright" src="img/back.jpg" height="35px" width="35px"></a>
<h1 class="aligncenter"><?php echo $row['name']?></h1>
  <span class="alignleft">
    <?php if (isset($_SESSION['username'])) { ?>
      <span class="">Welcome, <?php echo $_SESSION['username']; ?>! <a href="inc/logout.php">Log out</a></span>
    <?php } else { ?>
      <span class=""><a href="login.php">Log in</a></span>
    <?php } ?>
    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><a href="index.php" ><img class="" src="img/home3.jpg" height="35px" width="35px"></a>
  </span>

</div>

<?php echo "<center><h3>".$suggestion['sugg']."</h3></center>";?>
<!-- details -->
<div class="row">
  <div class="column" >
    <div class="card" id="four">
    	<h2>Money Saved</h2>
    	<p><?php echo $row['money_achieved']?></p>
    </div>
  </div>

  <div class="column">
    <div class="card" id="one" >
    	<h2>Time Saved</h2>
    	<p><?php echo $row['hours_saved']?> hours</p>
    </div>
  </div>
  
  <div class="column">
    <div class="card" id="two">
    	<h2>Days to next milestone</h2>
    	<p><?php echo $calcMilestone; ?></p>
    </div>
  </div>
  
  <!-- form to add pledge -->
  <div class="column">
    <div class="card" id="three">
    	<h2>Pledges</h2>  
      <?php while($pledge = mysqli_fetch_assoc($pledgesQuery)){
        echo "<p style='font-size:10px; padding-top:0'>".$pledge['pledge']."</p>";
      } ?>
      <form method="post" action="inc/pledge.php">
        <input type="hidden" name="a_id" value="<?php echo $row['id'] ?>">
        <textarea placeholder="  type here" name="pledge"></textarea> 
        <button id="Save" type="submit">Save</button>
      </form> 
    </div>
  </div>
</div>

<footer>© Created with love from students of AUT</footer>

</body>
</html>
