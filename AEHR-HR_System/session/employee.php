<?php
session_name('HR_EMP_SESSION');

session_start([
    'use_strict_mode' => 1,
    'cookie_httponly' => 1,
    'cookie_secure' => 0, // Set to 1 if using HTTPS
    'use_only_cookies' => 1,
    'sid_length' => 128, 
]);

include "CRUD/db.php"; // Database connection

// Redirect if session doesn't exist
if (!isset($_SESSION["employee_no"])) {
    header("Location: index.php");
    exit();
}

$employee_no = $_SESSION["employee_no"];

// Fetch user details
$sql = "SELECT name FROM employees WHERE employee_no = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $employee_no);
$stmt->execute();
$stmt->bind_result($employee_name);
$stmt->fetch();
$stmt->close();
$conn->close();
?>
