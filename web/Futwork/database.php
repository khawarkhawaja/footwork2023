<?php
$servername = "localhost";
$database = "id21013612_jumpshoot2";
$username = "id21013612_jumpshoot";
$password = "Zaq!2wsxcde34rfv";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


?>