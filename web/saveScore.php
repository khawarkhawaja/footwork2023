<?php
session_start();
include 'database.php';
$player_score=$_POST["score"];
$team_name=$_POST["TeamName"];

$sql="select * from  player_total_score where team_name='$team_name'";
 $result=$conn->query($sql);
 $totalScoree=0;
 $playCount=0;
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $totalScoree=(int)$row['total_score'];
        $playCount=(int)$row['playCount'];
        $totalScoree=$totalScoree+(int)$player_score;
        $totalScoree=$totalScoree.'';
        $playCount=$playCount+1;
        $playCount=  $playCount.'';


        $sqldelete="delete from player_total_score where team_name='$team_name'";
        $conn->query($sqldelete);

        $sqlInsert="insert into player_total_score(team_name,total_score,playCount) 
        values('$team_name','$totalScoree','$playCount')";
        $conn->query($sqlInsert);


    }
}else{

    $sql="insert into player_total_score(team_name,total_score,playCount) 
    values('$team_name','$player_score','1')";
    $conn->query($sql);
}




$c_date=date("Y-m-d").'' ;
$sql="insert into player_score(team_name,team_score,play_date) 
values('$team_name','$player_score','$c_date')";
 $conn->query($sql);


 $sql="select * from  player_score where team_name='$team_name'";
 $result=$conn->query($sql);
 $totalPlayer=$result->num_rows;

 $cc=$totalPlayer.'';
 $data=array("totalRec"=>$cc);
   
$conn->close();

print_r(json_encode($data));

?> 

