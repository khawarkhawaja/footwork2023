<?php
include 'database.php';
$leageName=$_POST['leage_name'];
$exp_date=$_POST['exp_date'];
$play_time=$_POST['play_time'];
$club_name=$_POST['club_name'];
$player_name=$_POST['player_name'];
$player_age=$_POST['player_age'];
$filename = $_FILES['fileToUpload']['name'];






$sql="select * from leage_table_name where leage_table_name='$leageName'";
$result = $conn->query($sql);
$found=false;
 if ($result->num_rows > 0) {
  $found=true;
 }

 if($found==false){
$sql="insert into leage_table_name (leage_table_name ,exp_date,player_time ) 
values('$leageName','$exp_date','$play_time')";
 $conn->query($sql);
}

 $sql="select id from leage_table_name where leage_table_name='$leageName'" ;
$playerID=0;
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
 
    $playerID= $row["id"];
   }
 } else {
     $playerID=0;
 }




//  $sql="insert into leage_player_detail(leage_table_id ,club_name ,player_name,player_agge,profile_image) 
//  values('12','khawar','dddddd','dfdfd','ddd')";
//  $conn->query($sql);



  $sql="insert into leage_player_detail(leage_table_id,club_name,player_name,player_agge,profile_image,total_score) values('$playerID','$club_name','$player_name','$player_age','$filename',0)";
 $conn->query($sql);




 if(isset($_FILES['fileToUpload']['name'])){

    /* Getting file name */
    $filename = $_FILES['fileToUpload']['name'];




    /* Location */
    $location = "LeagePlayerProfileImages/".$filename;

    /* Extension */
    $extension = pathinfo($location,PATHINFO_EXTENSION);
    $extension = strtolower($extension);

    /* Allowed file extensions */
    $allowed_extensions = array("jpg","jpeg","png","pdf","docx");

    $response = array();
    $status = 0;

    /* Check file extension */
    if(in_array(strtolower($extension), $allowed_extensions)) {

         /* Upload file */
         if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$location)){

               $status = 1; 
               $response['path'] = $location;
               $response['extension'] = $extension;

         }
    }

    $response['status'] = $status;

   
}
















 $leageName = str_replace("'", "", $leageName);
 $exp_date = str_replace("'", "", $exp_date);
 $play_time = str_replace("'", "", $play_time);
 header("Location:registeredUsersForm.php?leage_table_name='$leageName'&exp_date='$exp_date'&player_time='$play_time'", true, 301);
 exit();

?>