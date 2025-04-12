<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php'; // Ensure your DB connection is included

header('Content-Type: application/json'); // Ensure JSON response format

$department = $_POST['department'] ?? ''; // Get department
$allow_for = $_POST['allow_for'] ?? ''; // The selected date (allow_for)

if (empty($department) || empty($allow_for)) {
    echo json_encode(["error" => "Missing required parameters"]);
    exit;
}

// Query the database based on department and allow_for (NOT sub_date, since it's a timestamp)
$sql = "SELECT employee_no, name, department, status, sub_date, pay_to, mer_refnum, pay_from, paytrans_refnum, trans_date, paid_amount, reim_phonealow 
        FROM bills_sub 
        WHERE department = ? AND allow_for = ?";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(["error" => "SQL Error: " . $conn->error]);
    exit;
}

$stmt->bind_param("ss", $department, $allow_for);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Always return JSON
echo json_encode($data);
?>
