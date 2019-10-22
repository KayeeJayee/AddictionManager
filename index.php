<?php 
include_once 'inc/config.php';
?>
<!-- header -->
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>

<div id="textbox">
<a href="#" onclick="history.back()"><img class="alignright" src="img/back.jpg" height="35px" width="35px"></a>
<h1 class="aligncenter">Addiction Manager</h1>
  <span class="alignleft">
    <?php if (isset($_SESSION['username'])) { ?>
      <span class="">Welcome, <?php echo $_SESSION['username']; ?>! <a href="inc/logout.php">Log out</a></span>
    <?php } else { ?>
      <span class=""><a href="login.php">Log in</a></span>
    <?php } ?>
    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><a href="index.php" ><img class="" src="img/home3.jpg" height="35px" width="35px"></a>
  </span>

</div>

 <div class="row">
<!-- add addiction -->
 
    <div class="column" >
      <div class="card" id="one">
         <?php if($user_logged_in){ ?>
            <form method="post" action="inc/add_addiction.php">
              <h2>Add Addiction</h2>
              <input type="text" name="addiction" placeholder="Add an addiction">
              <input type="text" name="money" placeholder="$$ you would spend per day">
              <input type="text" name="hours" placeholder="Hours you used to spend">
              <button type="submit" style="border:none; background: none;"><img src="img/add1.jpg" alt="add button" height="45px" width="45px"></button>
            </form>
         <?php }else{
      echo "<a href='login.php'>You must be logged in to add addictions.</a>";
    } ?>
        </div>
    </div>
   
<!-- retrieve addictions -->
<div class="column">
    <div class="card" id="two" >
      <h2>Addictions</h2>
        <?php
        if($user_logged_in){
          $addictions = mysqli_query($conn, "SELECT * FROM addiction WHERE user_id = ".$_SESSION['user_id']);
          if (mysqli_num_rows($addictions) > 0) {
              while($row = mysqli_fetch_assoc($addictions)) {
                  echo "
                    <a href='details.php?id=".$row['id']."'>" . $row["name"]. "</a>
                    <p class='pp'>Current streak:".$row['streak_achieved']."</p>"
                    .'<a href="inc/check_in.php?id='.$row["id"].'&check=n"><img src="img/delete.jpg" height="30px" width="30px"></a>
                    <a href="inc/check_in.php?id='.$row["id"].'&check=y"><img src="img/add1.jpg" height="30px" width="30px"></a><br>';
              }
          } else {
              echo "When you enter addictions, you can track them here.";
          }
          mysqli_close($conn);
        }else {
              echo "When you enter addictions, you can track them here.";
          }
        ?>
    </div>
  </div>
  
</div>

<footer>© Created with love from students of AUT</footer>

</body>
</html>
