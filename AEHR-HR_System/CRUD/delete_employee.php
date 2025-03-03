<?php
include 'db.php'; // Ensure database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['employee_nos'])) {
    $employee_nos = $_POST['employee_nos'];

    if (!empty($employee_nos)) {
        $placeholders = implode(',', array_fill(0, count($employee_nos), '?'));
        $sql = "DELETE FROM employees WHERE employee_no IN ($placeholders)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(str_repeat('s', count($employee_nos)), ...$employee_nos);

        if ($stmt->execute()) {
            echo json_encode(["success" => "Employees deleted successfully."]);
        } else {
            echo json_encode(["error" => "Failed to delete employees."]);
        }

        $stmt->close();
    } else {
        echo json_encode(["error" => "No employees selected."]);
    }
} else {
    echo json_encode(["error" => "Invalid request."]);
}

$conn->close();
?>
