<?php
include 'db.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employeeNo = $_POST['employee_no'];
    $vlBal = $_POST['vlBalance'];
    $slBal = $_POST['slBalance'];

    // First, check if the employee exists in `dtr`
    $checkQuery = "SELECT COUNT(*) FROM dtr WHERE employee_no = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("s", $employeeNo);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        // If exists, update the record
        $updateQuery = "UPDATE dtr SET vl_bal = ?, sl_bal = ? WHERE employee_no = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("dds", $vlBal, $slBal, $employeeNo);
    } else {
        // If not exists, insert a new record
        $insertQuery = "INSERT INTO dtr (employee_no, vl_bal, sl_bal) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("sdd", $employeeNo, $vlBal, $slBal);
    }

    // Execute the query and return response
    if ($stmt->execute()) {
        echo "success"; 
    } else {
        echo "error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
