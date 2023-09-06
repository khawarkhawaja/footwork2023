

<?php
session_start();
include 'database.php';
$email_id=$_SESSION["email_id"];
$searchBy='notset';
if (isset($_GET["searycBy"])) {
    // The $_POST variable exists
$searchBy=$_GET["searycBy"];

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Jumpshot
</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color:#e2e3e3" onload="checkStatus()">
<?php include 'header.php';?>
<div class="container">
    <br>
    <br>
    <div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4"><h2><b>Player Information</b></h2></div>
</div>
    <br>
    <form action="searchPlayerForPlay.php" method="POST">
    <div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-4">
<div class="form-group">
      <label for="club" style="color:blue;font-size:18px;">Search</label>
      <input type="text" class="form-control" id="search" placeholder="Enter Club Or Category Or Player Name" name="search">
</div>

</div>
<div class="col-sm-2"><button type="submit" class="btn btn-success" style="width:180px;margin-top:30px;">Success</button></div>

</div>
</form>
    <br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Club Name</th>
      <th scope="col">Category</th>
      <th scope="col">Player 1 </th>
      <th scope="col">Image </th>
      <th scope="col">Player 2</th>
      <th scope="col">Image</th>
      <th scope="col">Player 3 </th>
      <th scope="col">Image</th>
      <th scope="col">Timer</th>
      <th scope="col">Age Group</th>
      <th scope="col">Days Left Expire</th>
      <th scope="col">Play</th>
    </tr>
  </thead>
  <tbody>
    <?php
         if($searchBy=='notset'){

          $sql="select * from user_registration_table where admin_email_address='$email_id'";
      }else{
          $sql="select * from user_registration_table where admin_email_address='$email_id' and (id='$searchBy' or player1name='$searchBy' or player2name='$searchBy' or player3name='$searchBy' or club_name='$searchBy' or category='$searchBy')";
      }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {

            // output data of each row
            while($row = $result->fetch_assoc()) {
                ?>

                <tr>
       
                   <td><?php echo  $row["id"];?></td>
                   <td><?php echo  $row["club_name"];?></td>
                   <td><?php echo  $row["category"];?></td>
                   <td><?php echo  $row["player1name"];?></td>
                
                   <td>   <img src="<?php echo  $row["player1_profile_image"];?>"  width="40" height="40" style="border-radius: 50%;"> </td>
                   <td><?php echo  $row["player2name"];?></td>
                   <td>   <img src="<?php echo  $row["player2_profile_image"];?>"  width="40" height="40" style="border-radius: 50%;"> </td>
                   <td><?php echo  $row["player3name"];?></td>
                   <td>   <img src="<?php echo  $row["player3_profile_image"];?>"  width="40" height="40" style="border-radius: 50%;"> </td>
       
                   <td><?php echo  $row["timer"];?></td>
                   <td><?php echo  $row["ageGroup"];?></td>
                   <td><?php echo  $row["expireDay"];?></td>
                   <td><a href="homepage.php?id=<?php echo $row["id"];?>">Play</a></td>
                 </tr>
            <?php
       
            }
          } 
    ?>


  </tbody>
</table>
</div>
</body>
</html>