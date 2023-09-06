
<?php

include 'database.php';


$uniqueID=uniqid();

$sql="delete from leage_table_player_score";

 $conn->query($sql);
 $sql="update leage_player_detail set total_score=0"; 

 $conn->query($sql);
 

  //  header("Location:https://jumpshoot2.000webhostapp.com/Station1.php?id=".$uniqueID);

echo "<script type='text/javascript'>
window.location.href = 'ScoreBoard.php?player2=onePlayer';
</script>";


?>