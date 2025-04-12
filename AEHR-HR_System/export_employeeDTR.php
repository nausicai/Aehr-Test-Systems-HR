<?php
session_start();
require 'vendor/autoload.php'; // Load PHPSpreadsheet
include "CRUD/db.php"; // Database connection

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

// Ensure user is logged in
if (!isset($_SESSION["employee_no"])) {
    header("Location: index.php");
    exit();
}

$employee_no = $_SESSION["employee_no"]; // Use logged-in employee's session

// Load the Excel template
$templateFile = 'DTR_Template.xlsx'; // Ensure this file exists in the project folder
$spreadsheet = IOFactory::load($templateFile);
$sheet = $spreadsheet->getActiveSheet(); // Select active sheet

// Fetch the DTR record for the logged-in employee
$sql = "SELECT year, months, day_from, day_to, shift, employee_no, employee_name, general_field, admin_field, finance_field, design_field, board_repair, pm, 
            tech_support, maint_support, log_comm, report_meeting, warranty, 
            bill_service, upgrades, presales_supp, special_proj, total_hours, 
            weekends_supp, regholiday_ot, specholiday_ot, reg_ot, night_diff, 
            salary_deduc, vl, sl, sub_date FROM dtr WHERE employee_no = ? LIMIT 1"; 

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $employee_no);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc(); // Fetch only one row

if ($data) {
    $sheet->setCellValue('O4', $data['year']);  
    $sheet->setCellValue('C4', $data['months']);
    $sheet->setCellValue('G4', $data['day_from']);
    $sheet->setCellValue('J4', $data['day_to']);
    $sheet->setCellValue('B9', $data['employee_no']);
    $sheet->setCellValue('C8', $data['employee_name']);
    $sheet->setCellValue('E9', $data['general_field']);
    $sheet->setCellValue('F9', $data['admin_field']);
    $sheet->setCellValue('G9', $data['finance_field']);
    $sheet->setCellValue('H9', $data['design_field']);
    $sheet->setCellValue('I9', $data['board_repair']);
    $sheet->setCellValue('J9', $data['pm']);
    $sheet->setCellValue('K9', $data['tech_support']);
    $sheet->setCellValue('L9', $data['maint_support']);
    $sheet->setCellValue('M9', $data['log_comm']);
    $sheet->setCellValue('N9', $data['report_meeting']);
    $sheet->setCellValue('O9', $data['warranty']);
    $sheet->setCellValue('P9', $data['bill_service']);
    $sheet->setCellValue('Q9', $data['upgrades']);
    $sheet->setCellValue('R9', $data['presales_supp']);
    $sheet->setCellValue('S9', $data['special_proj']);
    $sheet->setCellValue('V8', $data['weekends_supp']);
    $sheet->setCellValue('W8', $data['regholiday_ot']);
    $sheet->setCellValue('X8', $data['specholiday_ot']);
    $sheet->setCellValue('Y8', $data['reg_ot']);
    $sheet->setCellValue('Z8', $data['night_diff']);
    $sheet->setCellValue('AA8', $data['salary_deduc']);
    $sheet->setCellValue('AB8', $data['vl']);
    $sheet->setCellValue('AC8', $data['sl']);
}

// Close database connection
$stmt->close();
$conn->close();

// Save and output the file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="D-HR-0022-01_EMPLOYEE_TIME_RECORD.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output'); // Output file directly to browser
exit();
?>
