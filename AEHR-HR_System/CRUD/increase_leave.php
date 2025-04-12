<?php
require 'db.php'; // Ensure this connects to your database

$response = ["status" => false, "message" => ""];

// Get current date
$currentDate = date("Y-m-d");

// Get all employees
$query = "SELECT employee_no, date_hired FROM employees";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $employee_no = $row['employee_no'];
        $date_hired = $row['date_hired'];

        if (!$date_hired) continue; // Skip if no hire date

        // Calculate years in company
        $yearsPassed = floor((strtotime($currentDate) - strtotime($date_hired)) / (365 * 24 * 60 * 60));

        // Determine VL increase based on years worked
        if ($yearsPassed < 5) {
            $vl_increment = 6.66;
        } elseif ($yearsPassed < 10) {
            $vl_increment = 10.00; // Rounded from 9.99
        } else {
            $vl_increment = 13.33;
        }

        $sl_increment = 3.33; // SL always increases by 3.33 per run

        // Check if employee exists in DTR
        $checkDTR = "SELECT vl_bal, sl_bal FROM dtr WHERE employee_no = '$employee_no'";
        $dtrResult = $conn->query($checkDTR);

        if ($dtrResult->num_rows == 0) {
            // Insert new record if employee not found in DTR
            $insertDTR = "INSERT INTO dtr (employee_no, vl_bal, sl_bal) VALUES ('$employee_no', $vl_increment, $sl_increment)";
            $conn->query($insertDTR);
        } else {
            // Fetch current VL & SL balance
            $currentData = $dtrResult->fetch_assoc();
            $currentVL = floatval($currentData['vl_bal']);
            $currentSL = floatval($currentData['sl_bal']);

            // Stack the new values
            $newVL = $currentVL + $vl_increment;
            $newSL = $currentSL + $sl_increment;

            // Update leave balances if employee exists
            $updateQuery = "UPDATE dtr 
                            SET vl_bal = $newVL, 
                                sl_bal = $newSL 
                            WHERE employee_no = '$employee_no'";
            $conn->query($updateQuery);
        }
    }
    $response["status"] = true;
    $response["message"] = "Leave balances updated successfully.";
} else {
    $response["message"] = "No employees found.";
}

echo json_encode($response);
?>
