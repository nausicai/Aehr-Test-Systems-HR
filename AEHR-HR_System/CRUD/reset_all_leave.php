<?php
// Adjust the path to your db.php file correctly
include 'db.php'; // or use the correct relative path like 'db.php' if it's in the same directory

header('Content-Type: application/json'); // Set response header

try {
    // Check if database connection is established
    if (!$conn) {
        throw new Exception("Database connection failed");
    }

    // Get POST data
    $reset_type = $_POST['reset_type'] ?? 'BOTH';

    // Determine which balances to reset
    $vl_reset = ($reset_type === 'VL' || $reset_type === 'BOTH');
    $sl_reset = ($reset_type === 'SL' || $reset_type === 'BOTH');

    // Prepare SQL statement
    if ($vl_reset && $sl_reset) {
        $sql = "UPDATE dtr SET vl_bal = 0, sl_bal = 0";
    } elseif ($vl_reset) {
        $sql = "UPDATE dtr SET vl_bal = 0";
    } elseif ($sl_reset) {
        $sql = "UPDATE dtr SET sl_bal = 0";
    } else {
        throw new Exception("Invalid reset type");
    }

    // Execute the statement
    if ($conn->query($sql)) {
        $affected_rows = $conn->affected_rows;
        echo json_encode([
            'status' => 'success', 
            'message' => "Reset $reset_type leave balances for $affected_rows employees"
        ]);
    } else {
        throw new Exception("Database error: " . $conn->error);
    }
} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
} finally {
    // Close connection if it exists
    if (isset($conn)) {
        $conn->close();
    }
}
?>