<?php
session_start();
include 'db.php';

header("Content-Type: application/json"); // Ensure JSON response

if (!isset($_SESSION["employee_no"])) {  // Ensure correct session variable
    echo json_encode(["success" => false, "error" => "User not logged in"]);
    exit();
}

$employee_no = $conn->real_escape_string($_SESSION["employee_no"]);
$sql = "SELECT name FROM employees WHERE employee_no = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $employee_no);
$stmt->execute();
$stmt->bind_result($employee_name);
$stmt->fetch();
$stmt->close();

if (!empty($employee_name)) {
    echo json_encode(["success" => true, "name" => $employee_name]);
} else {
    echo json_encode(["success" => false, "error" => "Employee not found"]);
}
$conn->close();
?>
