<?php
$host = "localhost";  // Change if using a remote server
$username = "root";   // Default XAMPP MySQL username
$password = "";       // Default XAMPP MySQL password (empty)
$database = "aehr_hrs"; // Your database name

// Create a MySQL connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the PHP timezone to Philippine Time
date_default_timezone_set('Asia/Manila');

// The connection is now ready to use in other PHP files
?>
