<?php
// details

if(isset($_GET['id'])){
  $id = $_GET['id'];
  include 'inc/config.php';
  $addiction = mysqli_query($conn, "SELECT * FROM addiction WHERE id ='".$id."'");
  $row = mysqli_fetch_assoc($addiction);
  $calcMilestone = (int)$row['streak_goal'] - (int)$row['streak_achieved'];
  include 'inc/suggestions.php'; //for kj to check
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
<a href="#" ><img class="alignleft" src="img/home3.jpg" height="35px" width="35px"></a>
</div>

<?php echo "<center><h3>$row['sugg']</h3></center>";?> //for kj to check

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
    	<p>calcuation here</p>
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
