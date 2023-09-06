
<?php

include 'database.php';


$uniqueID=uniqid();

$sql="update score_table  set player_one_score='0',player_two_score='0',player_three_score='0'"; 

 $conn->query($sql);

  //  header("Location:https://jumpshoot2.000webhostapp.com/Station1.php?id=".$uniqueID);

echo "<script type='text/javascript'>
window.location.href = 'ScoreBoard.php';
</script>";


?>