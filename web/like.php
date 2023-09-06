<?php
include 'database.php';
$likeCount=$_POST['likeCount'];
$teamName=$_POST['teamName'];
$sql = "select * from  likeview where team_name ='$teamName'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
 
      $sql = "update likeview set likes ='$likeCount' where team_name ='$teamName'";
      $conn->query($sql);
      break;
    }
  } else {
    $sql = "insert into likeview (team_name,likes,views) values('$teamName','$likeCount','0')";
    $conn->query($sql);
  }

?>