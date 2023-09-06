
<?php

include 'database.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Jumpshot</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h3>Score Leage Table </h3>
  <ul class="list-inline">
    <li><a href="homepage.html">Home</a></li>
    <li><a href="ScoreBoard.php">Station1 Score</a></li>
    <li><a href="ScoreBoard.php?player='onePlayer'">Single Player Score</a></li>
    <li><a href="ScoreBoard.php?player2='onePlayer'">Station2 Player Score</a></li>

  </ul>
</div>

<br>
<br>
<?php
if (isset($_GET['player'])) {
    // URL parameter exists
?>

<h2 style="margin-left:600px;"><label>1 Player Score Table</label></h2>
<br>
<br>
<form method="POST" action="ClearPlayer1.php">
<input type="submit" value="Clear Single Player Table" style="margin-left:300px;">
</form>
<br>
<br>

<table class="table table-striped" style="width:60%;margin-left:300px;">
  <thead>
    <tr>
      <th scope="col">SNO</th>
      <th scope="col">Player  Name</th>
      <th scope="col">Player  Score</th>

    </tr>
  </thead>
  <tbody>
    <?php
$sql ="select * from player1score order by score DESC";

$result = $conn->query($sql);
$rowCount=0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $rowCount=$rowCount+1;
 



  ?>
    <tr>
      <th scope="row"><?php echo     $rowCount;?></th>
      <td><?php echo     $row["player_name"];?></td>
      <td><?php echo     $row["score"];?></td>

    </tr>
   <?php
  }
} 
   ?>
   
  </tbody>
</table>
<?php
  } else if(isset($_GET['player2']))
  {
    ?>


<h2 style="margin-left:600px;"><label>Station2 Score Table</label></h2>
<br>
<br>
<form method="POST" action="ClearStation2.php">
<input type="submit" value="Clear Station2 Player Table" style="margin-left:300px;">
</form>
<br>
<br>

<table class="table table-striped" style="width:60%;margin-left:300px;">
  <thead>
    <tr>
      <th scope="col">SNO</th>
      <th scope="col">Player  Name</th>
      <th scope="col">Club Name</th>
      <th scope="col">Play Count</th>
      <th scope="col">Player  Score</th>

    </tr>
  </thead>
  <tbody>
    <?php
$sql ="select * from leage_player_detail order by total_score DESC";

$result = $conn->query($sql);
$rowCount=0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $rowCount=$rowCount+1;
 
$namee= $row["player_name"];

$sqll ="select count(*) as totalRec from leage_table_player_score where player_name='$namee'";


$result1 = $conn->query($sqll);
$playCount=0;
if ($result1->num_rows > 0) {
  // output data of each row
  while($roww = $result1->fetch_assoc()) {
    $playCount=$roww['totalRec'];
  }
}











  ?>
    <tr>
      <th scope="row"><?php echo     $rowCount;?></th>
      <td><?php echo     $row["player_name"];?></td>
      <td><?php echo     $row["club_name"];?></td>
      <td><?php echo      $playCount;?></td>
      <td><?php echo     $row["total_score"];?></td>

    </tr>
   <?php
  }
} 
   ?>
   
  </tbody>
</table>











<?php




  }else{


    ?>

<h2 style="margin-left:600px;"><label>Station 1  Score Table</label></h2>
<br>
<br>
<form method="POST" action="ClearStation1.php">
<input type="submit" value="Clear Station 1 Player Table" style="margin-left:300px;">
</form>
<br>
<br>
<table class="table table-striped" style="width:60%;margin-left:300px;">
  <thead>
    <tr>
      <th scope="col">SNO</th>
      <th scope="col">Player 1 Name</th>
      <th scope="col">Player 1 Score</th>
      <th scope="col">Player 2 Name</th>
      <th scope="col">Player 2 Score</th>
      <th scope="col">Player 3 Name</th>
      <th scope="col">Player 3 Score</th>
      <th scope="col">Total Score</th>
    </tr>
  </thead>
  <tbody>
    <?php
$sql ="select player_one_name,player_one_score,player_two_name,player_two_score,player_three_name,player_three_score,(player_one_score + player_two_score +player_three_score) AS `total_score` from score_table order by total_score DESC";

$result = $conn->query($sql);
$rowCount=0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $rowCount=$rowCount+1;
    $savedscore= $row["player_one_name"];



  ?>
    <tr>
      <th scope="row"><?php echo     $rowCount;?></th>
      <td><?php echo     $row["player_one_name"];?></td>
      <td><?php echo     $row["player_one_score"];?></td>
      <td><?php echo     $row["player_two_name"];?></td>
      <td><?php echo     $row["player_two_score"];?></td>
      <td><?php echo     $row["player_three_name"];?></td>
      <td><?php echo     $row["player_three_score"];?></td>
      <td><?php echo     $row["total_score"];?></td>
    </tr>
   <?php
  }
} 
   ?>
   
  </tbody>
</table>






<?php
  }


?>























</body>
</html>
