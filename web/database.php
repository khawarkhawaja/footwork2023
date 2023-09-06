<?php
$servername = "localhost";
$database = "u803772280_workfrater_web";
$username = "u803772280_workfrater_web";
$password = "Zaq!2wsxcde34rfv";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


?>