<?php
require 'vendor/autoload.php';

use Smalot\PdfParser\Parser;

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$invoices = [];
$hasMissingData = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['pdf_files'])) {
    foreach ($_FILES['pdf_files']['tmp_name'] as $index => $pdf_path) {
        $parser = new Parser();
        $pdf = $parser->parseFile($pdf_path);
        $text = $pdf->getText();

    
        // Extract data using regex
        preg_match('/(SERVICE INVOICE|BILLING STATEMENT\/OFFICIAL RECEIPT|COVER NOTE)/i', $text, $matches);
        $title = $matches[0] ?? 'N/A';

        preg_match('/TIN NO\.\s*([\d-]+)/', $text, $matches);
        $tin_number = $matches[1] ?? 'N/A';

        preg_match('/ACCOUNT NUMBER:\s*(\w+)/', $text, $matches);
        $account_number = $matches[1] ?? 'N/A';

        preg_match('/DATE\s*[:]*\s*([\d\/-]+)/', $text, $matches);
        $date = $matches[1] ?? 'N/A';

        preg_match('/(?:INVOICE NUMBER|STATEMENT \/ RECEIPT NUMBER)\s*[:]*\s*(\d+)/i', $text, $matches);
        $invoice_number = $matches[1] ?? 'N/A';

        preg_match('/PAYMENT DUE DATE\s*[:]*\s*([\d\/-]+)/i', $text, $matches);
        $payment_due = $matches[1] ?? 'N/A';

        preg_match('/GRAND TOTAL\s*PHP\s*([\d,.]+)/i', $text, $matches);
        $total_amount = $matches[1] ?? 'N/A';

        $invoice = [
            'title' => $title,
            'tin_number' => $tin_number,
            'account_number' => $account_number,
            'date' => $date,
            'invoice_number' => $invoice_number,
            'payment_due' => $payment_due,
            'total_amount' => $total_amount
        ];

        $hasMissingData = $hasMissingData || in_array('N/A', $invoice, true);
        $invoices[] = $invoice;
    }

    $_SESSION['invoice_data'] = $invoices;

    echo json_encode([
        'success' => true,
        'invoices' => $invoices,
        'hasMissingData' => $hasMissingData
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'File upload failed.']);
}
