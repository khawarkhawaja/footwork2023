<?php

include 'database.php';

$player1Name=$_POST['player1Name'];
$player1Score=$_POST['player1Score'];
$player2Name=$_POST['player2Name'];
$player2Score=$_POST['player2Score'];
$player3Name=$_POST['player3Name'];
$player3Score=$_POST['player3Score'];
$player1Total=$_POST['player1Total'];
$player2Total=$_POST['player2Total'];
$player3Total=$_POST['player3Total'];
$s1=(int)$player1Total;
$s2=(int)$player2Total;
$s3=(int)$player3Total;
$currentDate = date('Y-m-d');

$todayDate=$currentDate.'';
$sql="insert into leage_table_player_score (player_name ,play_date ,score ) 
values('$player1Name','$todayDate','$player1Score')";
 $conn->query($sql);

 $sql="insert into leage_table_player_score (player_name ,play_date ,score ) 
values('$player2Name','$todayDate','$player2Score')";
 $conn->query($sql);

 $sql="insert into leage_table_player_score (player_name ,play_date ,score ) 
values('$player3Name','$todayDate','$player3Score')";
 $conn->query($sql);
$sql="update leage_player_detail set total_score=$s1 where player_name='$player1Name'";
$conn->query($sql);
$sql="update leage_player_detail set total_score=$s2 where player_name='$player2Name'";
$conn->query($sql);
$sql="update leage_player_detail set total_score=$s3 where player_name='$player3Name'";
$conn->query($sql);
 echo 'successfully';


?>