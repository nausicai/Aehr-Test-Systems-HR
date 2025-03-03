<?php
include 'db.php'; // Ensure this includes the database connection

// Query to get the last used employee_no
$sql = "SELECT employee_no FROM employees ORDER BY LENGTH(employee_no) DESC, employee_no DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $last_employee_no = $row['employee_no'];

    // Extract numeric part using regex (assuming format A001, A002, etc.)
    preg_match('/(\d+)/', $last_employee_no, $matches);
    $number = isset($matches[1]) ? intval($matches[1]) + 1 : 1; // Increment numeric part

    // Format new employee_no (keeping prefix 'A')
    $next_employee_no = "A" . str_pad($number, 3, '0', STR_PAD_LEFT);
} else {
    // Default first employee_no if no records exist
    $next_employee_no = "A001";
}

// Return response as JSON
echo json_encode(["next_employee_no" => $next_employee_no]);

$conn->close();
?>
