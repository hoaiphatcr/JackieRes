<?php
// database-config.php
$servername = "localhost";
$username = "id2858051_hoaiphat";
$password = "12345";
$database = "id2858051_hoaiphatdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
 ?>