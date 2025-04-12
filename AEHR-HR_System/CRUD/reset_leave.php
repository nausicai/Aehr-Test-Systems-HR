<?php
// CRUD/reset_leave.php
include 'db.php'; // Adjust path as needed

header('Content-Type: application/json'); // Set response header

// Get POST data
$employee_no = $_POST['employee_no'] ?? '';
$reset_type = $_POST['reset_type'] ?? 'BOTH';

// Validate input
if (empty($employee_no)) {
    echo json_encode(['status' => 'error', 'message' => 'Employee number is required']);
    exit;
}

// Determine which balances to reset
$vl_value = ($reset_type === 'VL' || $reset_type === 'BOTH') ? 0 : null;
$sl_value = ($reset_type === 'SL' || $reset_type === 'BOTH') ? 0 : null;

// Prepare SQL statement
if ($vl_value !== null && $sl_value !== null) {
    // Reset both
    $sql = "UPDATE dtr SET vl_bal = 0, sl_bal = 0 WHERE employee_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $employee_no);
} elseif ($vl_value !== null) {
    // Reset only VL
    $sql = "UPDATE dtr SET vl_bal = 0 WHERE employee_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $employee_no);
} elseif ($sl_value !== null) {
    // Reset only SL
    $sql = "UPDATE dtr SET sl_bal = 0 WHERE employee_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $employee_no);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid reset type']);
    exit;
}

// Execute the statement
if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo json_encode(['status' => 'success', 'message' => 'Leave balances reset successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No records updated - employee may not exist']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?>