<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST["startDate"]) || !isset($_POST["endDate"])) {
        die(json_encode(["error" => "Missing startDate or endDate"]));
    }

    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];

    $sql = "SELECT 
                e.employee_no, 
                e.name,  
                d.sub_date,
                d.total_hours
            FROM employees e 
            LEFT JOIN dtr d 
                ON e.employee_no = d.employee_no 
                AND d.sub_date BETWEEN ? AND ? 
            ORDER BY e.employee_no ASC";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die(json_encode(["error" => "SQL Prepare failed", "message" => $conn->error]));
    }

    $stmt->bind_param("ss", $startDate, $endDate);
    if (!$stmt->execute()) {
        die(json_encode(["error" => "SQL Execution failed", "message" => $stmt->error]));
    }

    $result = $stmt->get_result();
    $employees = [];

    while ($row = $result->fetch_assoc()) {
        // Only count as "Submitted" if total_hours is not null or empty
        $isSubmitted = (!empty($row["total_hours"]) && $row["total_hours"] != "0");

        $employees[] = [
            "employee_no" => $row["employee_no"],
            "name" => $row["name"],
            "sub_date" => $isSubmitted ? $row["sub_date"] : null, // If not submitted, set sub_date to null
            "total_hours" => $row["total_hours"] ?? null
        ];
    }

    echo json_encode($employees);
    $stmt->close();
    $conn->close();
}
?>
