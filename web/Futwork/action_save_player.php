
<?php

include 'database.php';
$name1=$_POST['name1'];
$name2=$_POST['name2'];
$name3=$_POST['name3'];
$age=$_POST['age'];
$timmer=$_POST['timer'];

$uniqueID=uniqid();

$sql="insert into player_registration (id ,name1 ,name2 ,name3 ,age  ,timer ) 
values('$uniqueID','$name1','$name2','$name3','$age','$timmer')";
 $conn->query($sql);

  //  header("Location:https://jumpshoot2.000webhostapp.com/Station1.php?id=".$uniqueID);

echo "<script type='text/javascript'>
window.location.href = 'Station1.php?id='+'$uniqueID';
</script>";


?>