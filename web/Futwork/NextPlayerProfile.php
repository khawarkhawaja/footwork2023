
<?php
include 'database.php';

$playerName=$_POST['playerName'];


$playerImage="";

$sql ="select * from playerimages where player_name='$playerName'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $playerImage= $row["ImageName"];
  }
} else {
    $playerImage=0;
}



 echo $playerImage;


?>