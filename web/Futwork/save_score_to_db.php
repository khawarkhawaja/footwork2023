<?php
session_start();
include 'database.php';
$gameID=$_POST['gameID'];
$player1Name=$_POST['player1Name'];
$player1Score=$_POST['player1Score'];
$player2Name=$_POST['player2Name'];
$player2Score=$_POST['player2Score'];
$player3Name=$_POST['player3Name'];
$player3Score=$_POST['player3Score'];



$sql="insert into score_table ( player_id  ,player_one_name ,player_one_score ,player_two_name ,player_two_score  ,player_three_name,player_three_score ) 
values('$gameID','$player1Name','$player1Score','$player2Name','$player2Score','$player3Name','$player3Score')";
 $conn->query($sql);

 echo 'successfully';


?>