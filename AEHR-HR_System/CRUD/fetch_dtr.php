<?php
session_name('HR_EMP_SESSION');
session_start();
include "db.php";

if (!isset($_SESSION["employee_no"])) {
  header("Location: index.php");
    exit();
}

$employee_no = $_SESSION["employee_no"];
$month = $_POST['month'];
$dayFrom = $_POST['dayFrom'];
$dayTo = $_POST['dayTo'];
$year = $_POST['year'];
$shift = $_POST['shift'];

try {
    $sql = "SELECT * FROM dtr 
            WHERE employee_no = ? 
            AND months = ? 
            AND day_from = ? 
            AND day_to = ? 
            AND year = ? 
            AND shift = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $employee_no, $month, $dayFrom, $dayTo, $year, $shift);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        
        // Format numbers
        $numericFields = [
            'general_field', 'admin_field', 'finance_field', 'design_field',
            'board_repair', 'pm', 'tech_support', 'maint_suport', 'log_comm',
            'report_meeting', 'warranty', 'bill_service', 'upgrades', 'presales_supp',
            'special_proj', 'weekends_supp', 'regholiday_ot', 'specholiday_ot',
            'reg_ot', 'night_diff', 'salary_deduc', 'vl', 'sl'
        ];
        
        foreach ($numericFields as $field) {
            if (isset($data[$field])) {
                $data[$field] = (float)$data[$field] == (int)$data[$field] 
                               ? (int)$data[$field] 
                               : (float)$data[$field];
            }
        }
        
        echo json_encode(['status' => 'success', 'data' => $data]);
    } else {
        echo json_encode(['status' => 'empty']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}

$stmt->close();
$conn->close();
?>