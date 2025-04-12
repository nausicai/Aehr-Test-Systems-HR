<?php

require 'db.php'; // Include your database connection
header('Content-Type: application/json'); // Ensure JSON response
date_default_timezone_set('Asia/Manila');

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
    $general_field = (float)($_POST['general'] ?? 0);
    $admin_field = (float)($_POST['admin'] ?? 0);
    $finance_field = (float)($_POST['finance'] ?? 0);
    $design_field = (float)($_POST['design'] ?? 0);
    $board_repair = (float)($_POST['boardRepair'] ?? 0);
    $pm = (float)($_POST['pm'] ?? 0);
    $tech_support = (float)($_POST['technicalSupport'] ?? 0);
    $maint_support = (float)($_POST['maintenance'] ?? 0);
    $log_comm = (float)($_POST['logistics'] ?? 0);
    $report_meeting = (float)($_POST['reports'] ?? 0);
    $warranty = (float)($_POST['warranty'] ?? 0);
    $bill_service = (float)($_POST['billableService'] ?? 0);
    $upgrades = (float)($_POST['upgrade'] ?? 0);
    $presales_supp = (float)($_POST['preSales'] ?? 0);
    $special_proj = (float)($_POST['specialProject'] ?? 0);
    $total_hours = (float)($_POST['totalHours'] ?? 0);

    // Additional Fields
    $weekends_supp = (float)($_POST['weekendSupport'] ?? 0);
    $regholiday_ot = (float)($_POST['regularHolidayOvertime'] ?? 0);
    $specholiday_ot = (float)($_POST['specialHolidayOvertime'] ?? 0);
    $reg_ot = (float)($_POST['regularOvertime'] ?? 0);
    $night_diff = (float)($_POST['nightDifferential'] ?? 0);
    $salary_deduc = (float)($_POST['salaryDeduction'] ?? 0);
    $vl = (float)($_POST['vlHours'] ?? 0);
    $sl = (float)($_POST['slHours'] ?? 0);

    // Get previous VL and SL balances
    $vl_bal = 0;
    $sl_bal = 0;

    $balance_sql = "SELECT vl_bal, sl_bal FROM dtr WHERE employee_no = ? ORDER BY sub_date DESC LIMIT 1";
    $stmt_balance = $conn->prepare($balance_sql);
    $stmt_balance->bind_param("s", $employee_no);
    $stmt_balance->execute();
    $result_balance = $stmt_balance->get_result();

    if ($row = $result_balance->fetch_assoc()) {
        $vl_bal = (float)$row['vl_bal'];
        $sl_bal = (float)$row['sl_bal'];
    }
    $stmt_balance->close();

    // Update VL and SL balances
    $vl_bal += $vl; // Add new VL to previous balance
    $sl_bal += $sl; // Add new SL to previous balance

    // Submission Date
    $sub_date = date("Y-m-d H:i:s");

    // Check if record already exists
    $check_sql = "SELECT * FROM dtr WHERE employee_no = ? AND year = ? AND months = ? AND day_from = ? AND day_to = ?";
    $stmt_check = $conn->prepare($check_sql);
    $stmt_check->bind_param("sssss", $employee_no, $year, $months, $day_from, $day_to);
    $stmt_check->execute();
    $result = $stmt_check->get_result();
    
    if ($result->num_rows > 0) {
        // If record exists, update it
        $update_sql = "UPDATE dtr SET 
            shift = ?, general_field = ?, admin_field = ?, finance_field = ?, design_field = ?, board_repair = ?, 
            pm = ?, tech_support = ?, maint_support = ?, log_comm = ?, report_meeting = ?, warranty = ?, 
            bill_service = ?, upgrades = ?, presales_supp = ?, special_proj = ?, total_hours = ?, weekends_supp = ?, 
            regholiday_ot = ?, specholiday_ot = ?, reg_ot = ?, night_diff = ?, salary_deduc = ?, vl = ?, sl = ?, vl_bal = ?, sl_bal = ?, sub_date = ? 
            WHERE employee_no = ? AND year = ? AND months = ? AND day_from = ? AND day_to = ?";

        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param(
            "sddddddddddddddddddddddddddssssss",
            $shift, $general_field, $admin_field, $finance_field, $design_field, $board_repair, 
            $pm, $tech_support, $maint_support, $log_comm, $report_meeting, $warranty, 
            $bill_service, $upgrades, $presales_supp, $special_proj, $total_hours, $weekends_supp, 
            $regholiday_ot, $specholiday_ot, $reg_ot, $night_diff, $salary_deduc, $vl, $sl, $vl_bal, $sl_bal, $sub_date, 
            $employee_no, $year, $months, $day_from, $day_to
        );
        
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "DTR updated successfully."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to update DTR: " . $stmt->error]);
        }
    } else {
        // If no existing record, insert a new one
        $insert_sql = "INSERT INTO dtr (
            year, months, day_from, day_to, shift, employee_no, employee_name, 
            general_field, admin_field, finance_field, design_field, board_repair, pm, 
            tech_support, maint_support, log_comm, report_meeting, warranty, 
            bill_service, upgrades, presales_supp, special_proj, total_hours, 
            weekends_supp, regholiday_ot, specholiday_ot, reg_ot, night_diff, 
            salary_deduc, vl, sl, vl_bal, sl_bal, sub_date
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param(
            "sssssssdddddddddddddddddddddddddds",
            $year, $months, $day_from, $day_to, $shift, $employee_no, $employee_name,
            $general_field, $admin_field, $finance_field, $design_field, $board_repair, $pm,
            $tech_support, $maint_support, $log_comm, $report_meeting, $warranty,
            $bill_service, $upgrades, $presales_supp, $special_proj, $total_hours,
            $weekends_supp, $regholiday_ot, $specholiday_ot, $reg_ot, $night_diff,
            $salary_deduc, $vl, $sl, $vl_bal, $sl_bal, $sub_date
        );

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "DTR submitted successfully."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to submit DTR: " . $stmt->error]);
        }
    }

    // Close statements and connection
    $stmt_check->close();
    $stmt->close();
    $conn->close();

} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}

?>
