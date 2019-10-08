<?php 
include 'inc/config.php';
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
<a href="#" ><img class="alignleft" src="img/home3.jpg" height="35px" width="35px"></a>
</div>

 <div class="row">
<!-- add addiction -->
  <?php if($user_logged_in){ ?>
    <div class="column" >
      <div class="card" id="one">
        <form method="post" action="inc/add_addiction.php">
          <h2>Add Addiction</h2>
          <input type="text" name="addiction" placeholder="Add an addiction">
          <button type="submit"><img src="img/add1.jpg" alt="add button" height="45px" width="45px"></button>
        </form>
        </div>
    </div>
    <?php }else{
      echo "<a href='login.html'>You must be logged in to add addictions.</a>";
    } ?>
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
        }
        ?>
    </div>
  </div>
  
</div>

<footer>© Created with love from students of AUT</footer>

</body>
</html>
