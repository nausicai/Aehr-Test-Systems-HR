<?php
require 'db.php'; // Ensure correct DB connection

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $employee_no = $_POST['employee_no'] ?? null;
    $sub_date = $_POST['sub_date'] ?? null;
    $status = $_POST['status'] ?? null;
    $allow_for_raw = $_POST['allow_for'] ?? null;
    $reimbursement = $_POST['reimbursement'] ?? null; // New reimbursement input

    // Debugging: Print received POST data
    error_log("Received Data: employee_no={$employee_no}, sub_date={$sub_date}, status={$status}, allow_for={$allow_for_raw}, reimbursement={$reimbursement}");

    if (!$employee_no || !$sub_date || !$status || !$allow_for_raw || !$reimbursement) {
        echo "Missing required fields.";
        exit;
    }

    // Convert "YYYY-MM" to "Month YYYY" format
    $timestamp = strtotime($allow_for_raw . "-01");
    $allow_for = date("F Y", $timestamp); // Example: "March 2025"

    // Check if reimbursement is a valid numeric value
    if (!is_numeric($reimbursement)) {
        echo "Invalid reimbursement amount.";
        exit;
    }

    // Correct the column name if needed
    $sql = "UPDATE bills_sub SET status = ?, allow_for = ?, reim_phonealow = ? WHERE employee_no = ? AND sub_date = ?";
    $stmt = $conn->prepare($sql);

    // Check if prepare() failed
    if (!$stmt) {
        die("SQL Prepare Error: " . $conn->error);
    }

    $stmt->bind_param("sssss", $status, $allow_for, $reimbursement, $employee_no, $sub_date);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Database update failed: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
