<?php

$host = "localhost:3307";
$userName = "admin";
$password = "1234";
$dbName = "Restaurant";

// Create database connection
$conn = new mysqli($host, $userName, $password, $dbName);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

?>