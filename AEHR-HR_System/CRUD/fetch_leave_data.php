<?php
include 'db.php'; // Include database connection

// SQL query to get employees and latest VL and SL balances, ensuring no duplicates
$sql = "SELECT e.employee_no, e.name AS employee_name, 
               COALESCE(MAX(d.vl_bal), 0) AS vl_bal, 
               COALESCE(MAX(d.sl_bal), 0) AS sl_bal
        FROM employees e
        LEFT JOIN dtr d ON e.employee_no = d.employee_no
        GROUP BY e.employee_no, e.name
        ORDER BY e.employee_no ASC"; // Ensure sorted order

$result = $conn->query($sql);

// Check for SQL errors
if (!$result) {
    die("Query failed: " . $conn->error); // Debugging: Show SQL error if query fails
}

// Display employee data if found
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['employee_no']}</td>
                <td>{$row['employee_name']}</td>
                <td>{$row['vl_bal']}</td>
                <td>{$row['sl_bal']}</td>
                <td>
                    <div class='btn-group'>
                        <button class='btn-edit' data-employee='{$row['employee_no']}' data-vl='{$row['vl_bal']}' data-sl='{$row['sl_bal']}'>
                            <i class='fas fa-edit'></i> Edit
                        </button>
                        <button class='btn-reset' data-employee='{$row['employee_no']}'>
                            <i class='fas fa-sync-alt'></i> Reset
                        </button>
                    </div>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5' class='text-center'>No employees found</td></tr>";
}

$conn->close();
?>
