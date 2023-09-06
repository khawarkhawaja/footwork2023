<?php
session_start();
include 'database.php';

$playerName=$_POST['playerName'];


$savedscore=0;

$sql ="select * from player1score where player_name='$playerName'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $savedscore= $row["score"];
  }
} else {
    $savedscore=0;
}



 echo $savedscore;


?>