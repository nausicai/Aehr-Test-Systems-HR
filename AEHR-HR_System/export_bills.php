<?php
require 'vendor/autoload.php'; // Load PHPSpreadsheet
include "CRUD/db.php"; // Database connection

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Ensure department and month-year are provided
if (!isset($_GET['department']) || !isset($_GET['allow_for'])) {
    die("Missing parameters.");
}

$department = mysqli_real_escape_string($conn, $_GET['department']);
$allowFor = mysqli_real_escape_string($conn, $_GET['allow_for']);

// Map department abbreviations to full names
$departmentMapping = [
    "Operations" => "OPERATIONS DEPARTMENT",
    "HR" => "HUMAN RESOURCES DEPARTMENT",
    "CS" => "CS DEPARTMENT"
];

$departmentFull = $departmentMapping[$department] ?? $department;

// Define department managers and cost centers
$departmentInfo = [
    "OPERATIONS DEPARTMENT" => ["manager" => "RICKY GO", "costCenter" => "520"],
    "HUMAN RESOURCES DEPARTMENT" => ["manager" => "NANCY CHESTNUT", "costCenter" => "820"],
    "CS DEPARTMENT" => ["manager" => "NATHANIEL FLORES", "costCenter" => "740"]
];

$manager = $departmentInfo[$departmentFull]["manager"] ?? "";
$costCenter = $departmentInfo[$departmentFull]["costCenter"] ?? "";

// Load the template
$templatePath = "Bills_template.xlsx"; 
if (!file_exists($templatePath)) {
    die("Template file not found.");
}

$spreadsheet = IOFactory::load($templatePath);
$sheet = $spreadsheet->getActiveSheet();

// Fetch number of employees
$countQuery = "SELECT COUNT(DISTINCT employee_no) AS total FROM bills_sub 
               WHERE department = '$departmentFull' AND allow_for = '$allowFor' AND status = 'Approved'";
$countResult = $conn->query($countQuery);
$numEmployees = ($countResult->num_rows > 0) ? $countResult->fetch_assoc()['total'] : 0;

// Insert department info into designated cells
$sheet->setCellValue("A7", $departmentFull);
$sheet->setCellValue("S7", $costCenter);
$sheet->setCellValue("AE7", $manager);
$sheet->setCellValue("BO7", $allowFor);
$sheet->setCellValue("CG7", $numEmployees);

// Find the first empty row for data insertion
$rowNumber = 12; // Assuming data starts from row 12
while ($sheet->getCell("A$rowNumber")->getValue() !== null && $rowNumber < 1000) {
    $rowNumber++;
}

// Fetch approved submissions
$sql = "SELECT employee_no, name, pay_to, mer_refnum, pay_from, paytrans_refnum, trans_date, paid_amount, reim_phonealow 
        FROM bills_sub 
        WHERE department = '$departmentFull' AND allow_for = '$allowFor' AND status = 'Approved'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($data = $result->fetch_assoc()) {
        $sheet->setCellValue("A$rowNumber", $data['employee_no']);
        $sheet->setCellValue("G$rowNumber", $data['name']);
        $sheet->setCellValue("V$rowNumber", $data['pay_to']);
        $sheet->setCellValue("AB$rowNumber", $data['mer_refnum']);
        $sheet->setCellValue("AP$rowNumber", $data['pay_from']);
        $sheet->setCellValue("AW$rowNumber", $data['paytrans_refnum']);
        $sheet->setCellValue("BN$rowNumber", $data['trans_date']);
        $sheet->setCellValue("BY$rowNumber", number_format($data['paid_amount'], 2));
        $sheet->setCellValue("CJ$rowNumber", number_format($data['reim_phonealow'], 2));
        
        $rowNumber++; // Move to the next row
    }
} else {
    die("<strong>No approved records found.</strong>");
}

// Set response headers to download as Excel file
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=Bills_Report.xlsx");
header("Cache-Control: max-age=0");

$writer = new Xlsx($spreadsheet);
$writer->save("php://output");
?>
