<?php
$host = 'localhost'; // Hostname
$username = 'root'; // MySQL username
$password = ''; // MySQL password
$database = 'payroll2'; // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
