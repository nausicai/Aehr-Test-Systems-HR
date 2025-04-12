<?php
session_name('HR_EMP_SESSION');
session_start();
include "db.php"; // Ensure the database connection is correct

if (!isset($_SESSION["employee_no"])) {
    echo json_encode(["error" => "Unauthorized access"]);
    exit();
}

$employee_no = $_SESSION["employee_no"];

$sql = "SELECT department FROM employees WHERE employee_no = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(["error" => "Prepare failed: " . $conn->error]);
    exit();
}

$stmt->bind_param("s", $employee_no);
$stmt->execute();
$stmt->bind_result($department);
$stmt->fetch();
$stmt->close();
$conn->close();

// Debugging: Print the raw department value
if (!$department) {
    echo json_encode(["error" => "Department not found for Employee No: " . $employee_no]);
    exit();
}

// Standardize department names
$departmentMap = [
    "Operations" => "Operations",
    "operations" => "Operations",
    "OPERATIONS" => "Operations",
    "OP" => "Operations",
    "op" => "Operations",
    "ope" => "Operations",
    "Ope" => "Operations",
    "ops" => "Operations",
    "Ops" => "Operations",
    "HR" => "HR",
    "Human Resource" => "HR",
    "Human Resources" => "HR",
    "HUMAN RESOURCE" => "HR",
    "HUMAN RESOURCES" => "HR",
    "CS" => "CS",
    "Customer Service" => "CS",
    "customer service" => "CS",
    "Customers Service" => "CS",
    "customers service" => "CS",
    "CUSTOMER SERVICE" => "CS"
    
];

$standardizedDept = $departmentMap[$department] ?? $department; // Match or keep original

echo json_encode(["department" => $standardizedDept]);
?>
