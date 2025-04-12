<?php
require 'db.php'; // Ensure this correctly establishes $conn

// Set response header to JSON
header('Content-Type: application/json');

// Read input data as JSON
$input_data = json_decode(file_get_contents("php://input"), true);

if (!$input_data || !is_array($input_data)) {
    echo json_encode(["success" => false, "error" => "Invalid input data format."]);
    exit;
}

// Prepare SQL statement
$query = "UPDATE dtr SET 
    general_field = ?, 
    admin_field = ?, 
    finance_field = ?, 
    design_field = ?, 
    board_repair = ?, 
    pm = ?, 
    tech_support = ?, 
    maint_support = ?, 
    log_comm = ?, 
    report_meeting = ?, 
    warranty = ?, 
    bill_service = ?, 
    upgrades = ?, 
    presales_supp = ?, 
    special_proj = ?, 
    total_hours = ?, 
    weekends_supp = ?, 
    regholiday_ot = ?, 
    specholiday_ot = ?, 
    reg_ot = ?, 
    night_diff = ?, 
    salary_deduc = ?, 
    vl = ?, 
    sl = ? 
WHERE employee_no = ? AND employee_name = ?";

$stmt = $conn->prepare($query);
if (!$stmt) {
    echo json_encode(["success" => false, "error" => "Query preparation failed: " . $conn->error]);
    exit;
}

$success_count = 0;
$errors = [];

// Process each row
foreach ($input_data as $row) {
    $employee_no = $row['employeeNo'] ?? '';
    $employee_name = $row['employeeName'] ?? '';

    if (empty($employee_no) || empty($employee_name)) {
        $errors[] = "Missing employee details for some rows.";
        continue;
    }

    // Define numeric fields
    $fields = [
        'general', 'admin', 'finance', 'design', 'boardRepair', 'pm', 'technicalSupport', 'maintenance',
        'logistics', 'reports', 'warranty', 'billableService', 'upgrade', 'preSales', 'specialProject',
        'totalHours', 'weekendSupport', 'regularHolidayOvertime', 'specialHolidayOvertime',
        'regularOvertime', 'nightDifferential', 'salaryDeduction', 'vlHours', 'slHours'
    ];

    // Collect values
    $values = [];
    foreach ($fields as $field) {
        $values[$field] = isset($row[$field]) ? (float) $row[$field] : 0;
    }

    // Bind parameters
    $stmt->bind_param("ddddddddddddddddddddddddss", 
        $values['general'], $values['admin'], $values['finance'], $values['design'], $values['boardRepair'], 
        $values['pm'], $values['technicalSupport'], $values['maintenance'], $values['logistics'], 
        $values['reports'], $values['warranty'], $values['billableService'], $values['upgrade'], 
        $values['preSales'], $values['specialProject'], $values['totalHours'], $values['weekendSupport'], 
        $values['regularHolidayOvertime'], $values['specialHolidayOvertime'], $values['regularOvertime'], 
        $values['nightDifferential'], $values['salaryDeduction'], $values['vlHours'], $values['slHours'], 
        $employee_no, $employee_name
    );

    if ($stmt->execute()) {
        $success_count++;
    } else {
        $errors[] = "Error updating Employee No: $employee_no - " . $stmt->error;
    }
}

echo json_encode(["success" => $success_count > 0, "updated" => $success_count, "errors" => $errors]);

$stmt->close();
$conn->close();
?>
