<?php
session_name('HR_EMP_SESSION');
session_start();
include "db.php";

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION["employee_no"])) {
        echo json_encode(["status" => "error", "message" => "Session expired. Please log in again."]);
        exit();
    }

    $employee_no = $_SESSION["employee_no"]; // Get employee number from session
    $new_username = trim($_POST["newUsername"]);
    $new_password = trim($_POST["newPassword"]);

    if (empty($new_username) || empty($new_password)) {
        echo json_encode(["status" => "error", "message" => "Username and password cannot be empty."]);
        exit();
    }

    if (strlen($new_password) < 6) {
        echo json_encode(["status" => "error", "message" => "Password must be at least 6 characters long."]);
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

    // Check if employee exists
    $check_stmt = $conn->prepare("SELECT * FROM employees WHERE employee_no = ?");
    $check_stmt->bind_param("s", $employee_no);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(["status" => "error", "message" => "Employee not found."]);
        exit();
    }
    
    $check_stmt->close();

    // Update only the logged-in user's account
    $stmt = $conn->prepare("UPDATE employees SET hrs_account = ?, hrs_password = ? WHERE employee_no = ?");
    $stmt->bind_param("sss", $new_username, $hashed_password, $employee_no);

    if ($stmt->execute()) {
        $_SESSION["first_login"] = false;
        echo json_encode(["status" => "success", "message" => "Account setup successful.", "redirect" => "Employee_dashboard.php"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error updating account."]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}
?>
