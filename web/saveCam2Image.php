<?php
include 'database.php';

$teamName=$_POST["TeamName"];
$totalPlayer=0;


$sql="select * from  player_score where team_name='$teamName'";
$result=$conn->query($sql);
$totalPlayer=$result->num_rows;



$totalPlayer= $totalPlayer+1;

$cc=$totalPlayer.'';

$c_date=date("Y-m-d");
mkdir('CamImages/'.$teamName.'/'.$c_date, 0777, true);
$path='CamImages/'.$teamName.'/'.$c_date.'/'.$cc.'/';
mkdir($path, 0777, true);


    $data = $_POST['photo'];
    list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);
    $data = base64_decode($data);

 

    file_put_contents($path."/".'Cam2'.time().'.png', $data);
    die;
?>
