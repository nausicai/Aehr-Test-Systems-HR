<?php
require 'vendor/autoload.php'; // Load PHPSpreadsheet
include "CRUD/db.php"; // Database connection

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;

// Load the Excel template
$templateFile = 'DTR_Template.xlsx'; // Ensure this file exists
$spreadsheet = IOFactory::load($templateFile);
$sheet = $spreadsheet->getActiveSheet(); // Assign active sheet

// Define the fill style for alternating rows
$fillStyleArray = [
    'fill' => [
        'fillType' => Fill::FILL_PATTERN_DARKGRAY,
        'startColor' => ['argb' => 'FFFFFFFF'], // White background
        'endColor' => ['argb' => '00000000'],   // Black lines
    ],
];

// Check if a date range is provided
if (isset($_GET['dateRange'])) {
    $dateRange = $_GET['dateRange']; // Example: "2025-03-01:2025-03-15"

    // Extract start and end dates
    list($startDate, $endDate) = explode(":", $dateRange);
    $startDate = mysqli_real_escape_string($conn, $startDate);
    $endDate = mysqli_real_escape_string($conn, $endDate);

    // Fetch filtered employee DTR records
    $sql = "SELECT year, months, day_from, day_to, shift, employee_no, employee_name, general_field, admin_field, finance_field, design_field, board_repair, pm, 
                tech_support, maint_support, log_comm, report_meeting, warranty, 
                bill_service, upgrades, presales_supp, special_proj, total_hours, 
                weekends_supp, regholiday_ot, specholiday_ot, reg_ot, night_diff, 
                salary_deduc, vl, sl, sub_date, vl_bal, sl_bal
        FROM dtr 
        WHERE sub_date BETWEEN '$startDate' AND '$endDate'
        AND (employee_no IS NOT NULL AND employee_no != '')
        AND (total_hours IS NOT NULL AND total_hours != '')";


} else {
    echo "No date range selected.";
    exit;
}

$result = $conn->query($sql);

$rowNumber = 9; // Starting row for general fields
$rowNumberName = 8; // Starting row for employee_name and selected fields
$counter = 1; // Counter for numbering in column A

if ($result->num_rows > 0) {
    while ($data = $result->fetch_assoc()) {
        // Set numbering in column A
        $sheet->setCellValue('A' . $rowNumberName, $counter);
        
        // Set date values
        $sheet->setCellValue('O4', $data['year']);  
        $sheet->setCellValue('C4', $data['months']);
        $sheet->setCellValue('G4', $data['day_from']);
        $sheet->setCellValue('J4', $data['day_to']);

        // Employee No.
        $sheet->setCellValue('B' . $rowNumber, $data['employee_no']);
        
        // Employee Name and selected fields on row 8
        $sheet->setCellValue('C' . $rowNumberName, $data['employee_name']);
        $sheet->setCellValue('V' . $rowNumberName, $data['weekends_supp']);
        $sheet->setCellValue('W' . $rowNumberName, $data['regholiday_ot']);
        $sheet->setCellValue('X' . $rowNumberName, $data['specholiday_ot']);
        $sheet->setCellValue('Y' . $rowNumberName, $data['reg_ot']);
        $sheet->setCellValue('Z' . $rowNumberName, $data['night_diff']);
        $sheet->setCellValue('AA' . $rowNumberName, $data['salary_deduc']);
        $sheet->setCellValue('AB' . $rowNumberName, $data['vl']);
        $sheet->setCellValue('AC' . $rowNumberName, $data['sl']);
        $sheet->setCellValue('AE' . $rowNumberName, $data['vl_bal']);
        $sheet->setCellValue('AF' . $rowNumberName, $data['sl_bal']);

        // Other data starts from row 9 and increments by 2 rows
        $sheet->setCellValue('E' . $rowNumber, $data['general_field']);
        $sheet->setCellValue('F' . $rowNumber, $data['admin_field']);
        $sheet->setCellValue('G' . $rowNumber, $data['finance_field']);
        $sheet->setCellValue('H' . $rowNumber, $data['design_field']);
        $sheet->setCellValue('I' . $rowNumber, $data['board_repair']);
        $sheet->setCellValue('J' . $rowNumber, $data['pm']);
        $sheet->setCellValue('K' . $rowNumber, $data['tech_support']);
        $sheet->setCellValue('L' . $rowNumber, $data['maint_support']);
        $sheet->setCellValue('M' . $rowNumber, $data['log_comm']);
        $sheet->setCellValue('N' . $rowNumber, $data['report_meeting']);
        $sheet->setCellValue('O' . $rowNumber, $data['warranty']);
        $sheet->setCellValue('P' . $rowNumber, $data['bill_service']);
        $sheet->setCellValue('Q' . $rowNumber, $data['upgrades']);
        $sheet->setCellValue('R' . $rowNumber, $data['presales_supp']);
        $sheet->setCellValue('S' . $rowNumber, $data['special_proj']);

        // Add formula to sum columns E to S in column T (Total Hours)
        $sheet->setCellValue("T" . $rowNumber, "=SUM(E{$rowNumber}:S{$rowNumber})");

        // Move by 2 rows for other data and by 1 row for selected fields
        $rowNumber += 2;
        $rowNumberName += 2;
        $counter++; // Increment for next row
    }
}

$startRow = 8; // Starting row
$endRow = 68; // Set end row to 68
$columnRange = 'E:N'; // Columns to apply the style

for ($row = $startRow; $row <= $endRow; $row += 2) {
    $sheet->getStyle("E{$row}:N{$row}")->applyFromArray($fillStyleArray);
}

// Close database connection after all operations are complete
$conn->close();

// Save and output the file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="D-HR-0022-01 EMPLOYEE TIME RECORD FORM.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output'); // Output file directly to browser
exit();

?>
 