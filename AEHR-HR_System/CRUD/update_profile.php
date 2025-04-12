<?php
session_name('HR_EMP_SESSION');
session_start();
require 'db.php';

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($_SESSION["employee_no"])) {
    echo json_encode(["success" => false, "message" => "Session expired. Please log in again."]);
    exit;
}

$employee_no = $_SESSION["employee_no"];

if (isset($data['username'], $data['password']) && !empty($data['username']) && !empty($data['password'])) {
    $username = $conn->real_escape_string($data['username']);
    $password = password_hash($data['password'], PASSWORD_BCRYPT); // Password hashing

    // Check if the user exists
    $checkStmt = $conn->prepare("SELECT employee_no FROM employees WHERE employee_no = ?");
    $checkStmt->bind_param("s", $employee_no); // Use "s" since employee_no is a string
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(["success" => false, "message" => "User not found."]);
        exit;
    }

    // Check if the new username (hrs_account) is already in use by another user
    $checkUsernameStmt = $conn->prepare("SELECT employee_no FROM employees WHERE hrs_account = ? AND employee_no != ?");
    $checkUsernameStmt->bind_param("ss", $username, $employee_no);
    $checkUsernameStmt->execute();
    $usernameResult = $checkUsernameStmt->get_result();

    if ($usernameResult->num_rows > 0) {
        echo json_encode(["success" => false, "message" => "Username already taken by another user."]);
        exit;
    }

    // Update only the logged-in user's account
    $stmt = $conn->prepare("UPDATE employees SET hrs_account = ?, hrs_password = ? WHERE employee_no = ?");
    $stmt->bind_param("sss", $username, $password, $employee_no);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Profile updated successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to update profile."]);
    }

    // Close statements
    $stmt->close();
    $checkStmt->close();
    $checkUsernameStmt->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid request. Both username and password are required."]);
}

$conn->close();
?>
