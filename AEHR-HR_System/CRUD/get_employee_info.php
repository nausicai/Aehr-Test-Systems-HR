<?php
include 'db.php'; // Adjust path based on your setup

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['employee_no'])) {
    $employee_no = $_POST['employee_no'];

    $stmt = $conn->prepare("SELECT employee_no, name, email, phone, department, position, hrs_account, date_of_birth, date_hired, address FROM employees WHERE employee_no = ?");
    $stmt->bind_param("s", $employee_no);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $employee = $result->fetch_assoc();
        echo json_encode($employee);
    } else {
        echo json_encode(["error" => "Employee not found"]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["error" => "Invalid request"]);
}
?>
