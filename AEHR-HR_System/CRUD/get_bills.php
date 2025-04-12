<?php
include 'db.php'; // Include the database connection

// Fetch data from bills_sub table
$sql = "SELECT id, employee_no, name, department, status, sub_date FROM bills_sub ORDER BY sub_date DESC";
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>
