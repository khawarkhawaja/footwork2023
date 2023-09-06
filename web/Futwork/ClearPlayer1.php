
<?php

include 'database.php';




$sql="update player1score set score=0"; 

 $conn->query($sql);

  //  header("Location:https://jumpshoot2.000webhostapp.com/Station1.php?id=".$uniqueID);

echo "<script type='text/javascript'>
window.location.href = 'ScoreBoard.php?player=onePlayer';
</script>";


?>