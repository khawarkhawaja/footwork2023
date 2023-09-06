
<?php
include 'database.php';
$teamName=$_POST["teamName"];
$totalRecCount=$_POST['totalRecCount'];
$totalPlayer=0;

// 
// $sql="select * from  player_score where team_name='$teamName'";
// $result=$conn->query($sql);
// $totalPlayer=$result->num_rows;
// $cc=$totalPlayer.'';

$c_date=date("Y-m-d") ;
 mkdir('CamVideos/'.$teamName.'/'.$c_date, 0777, true);
$path='CamVideos/'.$teamName.'/'.$c_date.'/'.$totalRecCount.'/';
mkdir($path, 0777, true);
 
//$path='videos/'.$email_add.'/'.$c_date.'/'.$play_count;
//mkdir($path, 0, true);
if(isset($_FILES['file']) and !$_FILES['file']['error']){
    $fname = "cam1.wav";

    move_uploaded_file($_FILES['file']['tmp_name'],  $path.'/'.$fname);
}

    ?>