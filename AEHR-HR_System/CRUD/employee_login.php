<?php
session_name('HR_EMP_SESSION');

session_start();
include "db.php"; // Database connection

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = trim($_POST["empUsername"]);
    $password = trim($_POST["empPassword"]);

    if (empty($input)) {
        echo json_encode(["status" => "error", "message" => "Please enter your employee number or account."]);
        exit();
    }

    // Check if employee exists using employee_no OR hrs_account
    $stmt = $conn->prepare("SELECT employee_no, hrs_account, hrs_password FROM employees WHERE employee_no = ? OR hrs_account = ?");
    $stmt->bind_param("ss", $input, $input);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($employee_no, $db_account, $db_password);
        $stmt->fetch();

        if (empty($db_password)) { // If password is empty, require setup
            $_SESSION["employee_no"] = $employee_no; // Store employee_no for setup
            $_SESSION["first_login"] = true;
            echo json_encode(["status" => "setup", "redirect" => "set_password.php"]); // Redirect user to password setup page
            exit();
        } elseif (password_verify($password, $db_password)) { // Verify hashed password
            $_SESSION["employee_no"] = $employee_no;  // Use `employee_no` instead of `user_id`
            $_SESSION["first_login"] = false;
            echo json_encode(["status" => "success", "redirect" => "Employee_dashboard.php"]);
            exit();
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid password."]);
            exit();
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Account does not exist."]);
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
