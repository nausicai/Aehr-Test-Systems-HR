<?php
include 'db.php'; // Ensure this file contains your DB connection logic
header("Content-Type: application/json; charset=UTF-8");

error_reporting(E_ALL);
ini_set('display_errors', 1);

function customLog($employee_no, $name, $department, $status, $submission_date, $message) {
    global $conn;

    // Delete the previous log (ensures only 1 row exists)
    $conn->query("DELETE FROM logs");

    // Insert new log
    $query = "INSERT INTO logs (employee_no, name, department, status, submission_date, log_message) 
              VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("ssssss", $employee_no, $name, $department, $status, $submission_date, $message);
        $stmt->execute();
        $stmt->close();
    }
}


if (isset($_POST['employee_no'], $_POST['name'], $_POST['department'], $_POST['status'], $_POST['submission_date'])) {
    $employee_no = trim($_POST['employee_no']);
    $name = trim($_POST['name']);
    $department = trim($_POST['department']);
    $status = trim($_POST['status']);
    $submission_date = trim($_POST['submission_date']);

    // Convert to MySQL format (Ensure consistency)
    $submission_date = date("Y-m-d H:i:s", strtotime($submission_date));

    // Log received POST data
    customLog($employee_no, $name, $department, $status, $submission_date, 
        "Fetching submission for: Employee No=$employee_no, Name=$name, Department=$department, Status=$status, Submission Date=$submission_date");

    // Validate MySQL connection
    if (!$conn) {
        customLog($employee_no, $name, $department, $status, $submission_date, "Database connection failed: " . mysqli_connect_error());
        echo json_encode(["error" => "Database connection failed"]);
        exit;
    }

    // Fetch using LIKE for sub_date to match timestamp more flexibly
    $query = "SELECT * FROM bills_sub WHERE employee_no = ? AND name = ? AND department = ? AND status = ? AND sub_date LIKE ?";
    $submission_date = substr($submission_date, 0, 16) . "%"; // Match year-month-day hour:minute
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        customLog($employee_no, $name, $department, $status, $submission_date, "SQL Prepare Error: " . $conn->error);
        echo json_encode(["error" => "SQL Prepare failed"]);
        exit;
    }

    $stmt->bind_param("sssss", $employee_no, $name, $department, $status, $submission_date);

    if (!$stmt->execute()) {
        customLog($employee_no, $name, $department, $status, $submission_date, "SQL Error: " . $stmt->error);
        echo json_encode(["error" => "SQL Execution failed"]);
        exit;
    }

    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Exclude bill_image from the response
        unset($row['bill_image']);
        echo json_encode($row);
    } else {
        customLog($employee_no, $name, $department, $status, $submission_date, "No data found for provided values.");
        echo json_encode(["error" => "No data found"]);
    }

    $stmt->close();
    $conn->close();
} else {
    customLog("", "", "", "", "", "Invalid request - Missing parameters.");
    echo json_encode(["error" => "Invalid request"]);
}
?>
