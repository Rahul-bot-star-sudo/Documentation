<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "attendence";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Successful connection message removed

?>
