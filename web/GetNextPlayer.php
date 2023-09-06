<?php
session_start();
include 'database.php';
$recordCount=0;
if (isset($_SESSION['recordCount'])) {
  $recordCount=(int)$_SESSION['recordCount'];
}else{
  $_SESSION['recordCount']='1';
  $recordCount=1;
}



$catigory="";
$player1Name="";
$player2Name="";
$player3Name="";
$player4Name="";

$player1Profile="";
$player2Profile="";
$player3Profile="";
$player4Profile="";

$player1Age="";
$player2Age="";
$player3Age="";
$player4Age="";

$player1Location="";
$player2Location="";
$player3Location="";
$player4Location="";

$clubName='no';

$recFound='false';

$sql = "select * from  user_reg LIMIT 1 OFFSET $recordCount";
$result = $conn->query($sql);
$rowCount=0;
if ($result->num_rows > 0) {

  //if($recordCount>$result->num_rows){
  //  $recordCount=1;
  //}
    
  // output data of each row
  while($row = $result->fetch_assoc()) {
   // $rowCount=$rowCount+1;
  //  if( $rowCount==$recordCount){
        $recFound='true';
        $catigory=$row['category_player'];
        $player1Name=$row['name_player1'];
        $player2Name=$row['name_player2'];
        $player3Name=$row['name_player3'];
        $player4Name=$row['name_player4'];
    
        $player1Profile=$row['profile_pic1'];
        $player2Profile=$row['profile_pic2'];
        $player3Profile=$row['profile_pic3'];
        $player4Profile=$row['profile_pic4'];
    
        $player1Age=$row['age_player1'];
        $player2Age=$row['age_player2'];
        $player3Age=$row['age_player3'];
        $player4Age=$row['age_player4'];
    
    
        $player1Location=$row['location_player1'];
        $player2Location=$row['location_player2'];
        $player3Location=$row['location_player3'];
        $player4Location=$row['location_player4'];

        $clubName=$row['team_name'];
        $recordCount=$recordCount+1;
        $_SESSION['recordCount']=$recordCount;
      break;
   // }

  }
}
header("Location: index.php?clugName=$clubName");

// $data="";
// $data=array("recFound"=>  $recFound, "category"=>$catigory,"player1Name"=>$player1Name,"player2Name"=>$player2Name,"player3Name"=>$player3Name,"player4Name"=>$player4Name
// ,"player1Profile"=>$player1Profile,"player2Profile"=>$player2Profile,"player3Profile"=>$player3Profile,"player4Profile"=>$player4Profile
// ,"player1Age"=>$player1Age,"player2Age"=>$player2Age,"player3Age"=>$player3Age,"player4Age"=>$player4Age,
// "player1Location"=>  $player1Location,"player2Location"=>$player2Location,"player3Location"=>  $player3Location,"player4Location"=>  $player4Location,"teamName"=>$clubName);
// print_r(json_encode($data));

?>