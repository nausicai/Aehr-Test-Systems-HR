<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

session_start();

// Ensure invoice data exists
if (!isset($_SESSION['invoice_data']) || empty($_SESSION['invoice_data'])) {
    die("No data available to export.");
}

// Clear output buffer to prevent corruption
ob_end_clean();

// Create new Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Headers
$headers = ['Title', 'TIN Number', 'Account Number', 'Date', 'Invoice Number', 'Payment Due', 'Total Amount'];
$col = 'A';

// Set headers in the first row
foreach ($headers as $header) {
    $sheet->setCellValue($col . '1', $header);
    $col++;
}

// Retrieve data from session
$data = $_SESSION['invoice_data'];
$row = 2;

// Write multiple invoices if available
foreach ($data as $invoice) {
    $sheet->setCellValue('A' . $row, $invoice['title']);
    $sheet->setCellValue('B' . $row, $invoice['tin_number']);
    $sheet->setCellValue('C' . $row, $invoice['account_number']);
    $sheet->setCellValue('D' . $row, $invoice['date']);
    $sheet->setCellValue('E' . $row, $invoice['invoice_number']);
    $sheet->setCellValue('F' . $row, $invoice['payment_due']);
    $sheet->setCellValue('G' . $row, $invoice['total_amount']);
    $row++;
}

// Set headers for file download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="invoice_data.xlsx"');
header('Cache-Control: max-age=0');

// Save the Excel file and output it
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
