<?php
include 'database.php';
$team_name=$_GET['team_name'];


// $player1Name="";
// $player1Profile="";

// $player2Name="";
// $player2Profile="";

// $player3Name="";
// $player3Profile="";

// $player4Name="";
// $player4Profile="";







?>
<!DOCTYPE html>
<html>
<head>
  <title>User League Table</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
    }
  </style>
</head>
<body>
  <h1>User League Table</h1>
  <table>
    <tr>
      <th>Position</th>
      <th>Club Logo</th>
      <th>Club Name</th>
      <th>Attempts</th>
      <th>Total Score</th>
    </tr>

<?php

$sql = "select * from  player_total_score order by total_score asc";
$result = $conn->query($sql);
$team_logo_name="";
$rowCount=0;

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $rowCount=$rowCount+1;
    $teamName=$row["team_name"];
    $total_Score=$row["total_score"];
    $playerCount1=$row["playCount"];
    $sqlGerRec = "select * from  user_reg where team_name='$teamName'";
    $resultSet = $conn->query($sqlGerRec);
    if ($resultSet->num_rows > 0) {
      while($rowRes = $resultSet->fetch_assoc()) {
        $team_logo_name=$rowRes["team_logo_name"];

        break;
      }

    }
?>

<tr>
      <td><?php echo     $rowCount;?></td>
      <td><img src="team_logo/<?php echo  $team_logo_name;?>" alt="Profile Picture"></td>
      <td><?php echo $teamName;?></td>
      <td><?php echo $playerCount1;?></td>
      <td><?php echo $total_Score;?></td>
    
    </tr>




<?php





  }
}



?>


    <!-- Add more rows for additional users -->
  </table>
</body>
</html>


