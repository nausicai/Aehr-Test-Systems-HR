<?php
require_once "db.php"; // Include database connection

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $employee_no = $_POST["employee_no"] ?? "";

    if (empty($employee_no)) {
        echo json_encode(["status" => "error", "message" => "Invalid employee number."]);
        exit;
    }

    // Reset password to a default (e.g., empty string or 'default123')
    $default_password = ""; // Empty password
    $stmt = $conn->prepare("UPDATE employees SET hrs_password = ? WHERE employee_no = ?");
    $stmt->bind_param("ss", $default_password, $employee_no);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to reset password."]);
    }

    $stmt->close();
    $conn->close();
}
?>
