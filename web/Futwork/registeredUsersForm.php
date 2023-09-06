
<?php
$leage_table_name="";
$exp_date="";
$player_time="";

if(isset($_GET['leage_table_name']))
{
    $leage_table_name=$_GET['leage_table_name'];
    $leage_table_name = str_replace("'", "", $leage_table_name);
}
if(isset($_GET['exp_date']))
{
    $exp_date=$_GET['exp_date'];
    $exp_date = str_replace("'", "", $exp_date);
}

if(isset($_GET['player_time']))
{
    $player_time=$_GET['player_time'];
    $player_time = str_replace("'", "", $player_time);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Jumpshoot Player Registration Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h3>Leage Table Player Registration Form </h3>
  <ul class="list-inline">
    <li><a href="homepage.html">Home</a></li>



  </ul>
</div>
<div class="container">
  <h2 style="margin-left:400px;">Player Registration Form</h2>
  <form action="PlayerRegistrationForLeage.php" method="POST" enctype="multipart/form-data">
    <div class="row" style="width:30%;margin-left:400px;">
    <div class="form-group">
      <label for="Leage_Name">Leage Name</label>
      <input type="text" class="form-control" id="leage_name"  value="<?php echo $leage_table_name;?>" placeholder="Enter Leage Name" name="leage_name">
    </div>
    <div class="form-group">
      <label for="pwd">Expire Date:</label>
      <input type="date" class="form-control" value="<?php echo $exp_date;?>"  id="exp_date" placeholder="Enter Leage Expire Date" name="exp_date">
    </div>
    <div class="form-group">
      <label for="pwd">Play Time:</label>
      <input type="text" class="form-control" id="play_time" value="<?php echo $player_time;?>" placeholder="Enter Play Time" name="play_time">
    </div>
    <div class="form-group">
      <label for="pwd">Player Club Name:</label>
      <input type="text" class="form-control" id="club_name" placeholder="Enter Player Club Name" name="club_name">
    </div>
    <div class="form-group">
      <label for="pwd">Player Name:</label>
      <input type="text" class="form-control" id="player_name" placeholder="Enter Player Name" name="player_name">
    </div>

    <div class="form-group">
      <label for="pwd">Player Age:</label>
      <input type="text" class="form-control" id="player_age" placeholder="Enter Player age" name="player_age">
    </div>
    <div class="form-group">
      <label for="pwd">Player Profile Picture:</label>
      <input
  type="file"
  name="fileToUpload" id="fileToUpload"
  accept=".png,.jpeg,.jpg" />

    </div>

    <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </form>
</div>

</body>
</html>
