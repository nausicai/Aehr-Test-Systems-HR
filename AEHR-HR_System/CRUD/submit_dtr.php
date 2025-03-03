<?php
require 'db.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and fetch input values
    $year = $_POST['year'] ?? '';
    $months = $_POST['month'] ?? '';
    $day_from = $_POST['dayFrom'] ?? '';
    $day_to = $_POST['dayTo'] ?? '';
    $shift = $_POST['shift'] ?? '';

    $employee_no = $_POST['employeeNo'] ?? '';
    $employee_name = $_POST['employeeName'] ?? '';

    // Work fields
    $general_field = $_POST['general'] ?? 0;
    $admin_field = $_POST['admin'] ?? 0;
    $finance_field = $_POST['finance'] ?? 0;
    $design_field = $_POST['design'] ?? 0;
    $board_repair = $_POST['boardRepair'] ?? 0;
    $pm = $_POST['pm'] ?? 0;
    $tech_support = $_POST['technicalSupport'] ?? 0;
    $maint_support = $_POST['maintenance'] ?? 0;
    $log_comm = $_POST['logistics'] ?? 0;
    $report_meeting = $_POST['reports'] ?? 0;
    $warranty = $_POST['warranty'] ?? 0;
    $bill_service = $_POST['billableService'] ?? 0;
    $upgrades = $_POST['upgrade'] ?? 0;
    $presales_supp = $_POST['preSales'] ?? 0;
    $special_proj = $_POST['specialProject'] ?? 0;
    $total_hours = $_POST['totalHours'] ?? 0;

    // Additional Fields
    $weekends_supp = $_POST['weekendSupport'] ?? 0;
    $regholiday_ot = $_POST['regularHolidayOvertime'] ?? 0;
    $specholiday_ot = $_POST['specialHolidayOvertime'] ?? 0;
    $reg_ot = $_POST['regularOvertime'] ?? 0;
    $night_diff = $_POST['nightDifferential'] ?? 0;
    $salary_deduc = $_POST['salaryDeduction'] ?? 0;
    $vl = $_POST['vlHours'] ?? 0;
    $sl = $_POST['slHours'] ?? 0;
    
    // Submission Date
    $sub_date = date("Y-m-d H:i:s");

    // Prepare SQL query
    $sql = "INSERT INTO dtr_records (
        year, months, day_from, day_to, shift, employee_no, employee_name, 
        general_field, admin_field, finance_field, design_field, board_repair, pm, 
        tech_support, maint_support, log_comm, report_meeting, warranty, 
        bill_service, upgrades, presales_supp, special_proj, total_hours, 
        weekends_supp, regholiday_ot, specholiday_ot, reg_ot, night_diff, 
        salary_deduc, vl, sl, sub_date
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "isssssssiiiiiiiiiiiiiiiiiiiiiss",
        $year, $months, $day_from, $day_to, $shift, $employee_no, $employee_name,
        $general_field, $admin_field, $finance_field, $design_field, $board_repair, $pm,
        $tech_support, $maint_support, $log_comm, $report_meeting, $warranty,
        $bill_service, $upgrades, $presales_supp, $special_proj, $total_hours,
        $weekends_supp, $regholiday_ot, $specholiday_ot, $reg_ot, $night_diff,
        $salary_deduc, $vl, $sl, $sub_date
    );

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "DTR submitted successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error submitting DTR: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}
?>
