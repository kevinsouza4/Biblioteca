<?php
$servername = 'DB_HOST';
$database = 'DB_NAME';
$username = 'DB_USER';
$password = 'DB_PASS';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
?>