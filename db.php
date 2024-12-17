<?php
$servername = "localhost:3306"; // Your database server
$username = "root"; // Your database username
$password = "45P@x2YT"; // Your database password
$dbname = "palhome"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
