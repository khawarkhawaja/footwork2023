<?php
session_start();
include 'database.php';

$playerName=$_POST['playerName'];
$player1Score=$_POST['player1Score'];

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

if($savedscore==0){
    $savedscore=(int)$player1Score;
    $sql ="insert into  player1score(player_name ,score ) values('$playerName', $savedscore)";
    $conn->query($sql);


}else{
    $savedscore= $savedscore+$player1Score;
    $sql="update player1score set score='$savedscore' where player_name='$playerName'";
    $conn->query($sql);
}



 echo 'successfully';


?>