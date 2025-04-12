<?php
include 'db.php'; // Ensure correct path

header('Content-Type: application/json'); // Ensure JSON response

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $year = $_POST["year"] ?? '';
    $month = $_POST["month"] ?? '';
    $dayFrom = $_POST["dayFrom"] ?? '';
    $dayTo = $_POST["dayTo"] ?? '';

    // Debugging: Log received values
    error_log("Received: Year=$year, Month=$month, DayFrom=$dayFrom, DayTo=$dayTo");

    if (empty($year) || empty($month) || empty($dayFrom) || empty($dayTo)) {
        echo json_encode(["error" => "Missing parameters"]);
        exit;
    }

    // Select all fields from the table
    $sql = "SELECT 
                year, months, day_from, day_to, shift, employee_no, employee_name, 
                general_field, admin_field, finance_field, design_field, board_repair, pm, 
                tech_support, maint_support, log_comm, report_meeting, warranty, 
                bill_service, upgrades, presales_supp, special_proj, total_hours, 
                weekends_supp, regholiday_ot, specholiday_ot, reg_ot, night_diff, 
                salary_deduc, vl, sl, sub_date 
            FROM dtr
            WHERE year = ? AND months = ? AND day_from = ? AND day_to = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssss", $year, $month, $dayFrom, $dayTo); // Ensure correct data types
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode($data);
    } else {
        error_log("SQL Error: " . $conn->error);
        echo json_encode(["error" => "Query failed"]);
    }
} else {
    echo json_encode(["error" => "Invalid request"]);
}
?>
