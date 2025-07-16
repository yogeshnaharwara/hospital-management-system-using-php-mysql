<?php
$host = "localhost";     // your database host
$user = "root";          // your MySQL username
$pass = "";              // your MySQL password
$db   = "hospital_db";   // your database name

// Create connection
$conn = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
