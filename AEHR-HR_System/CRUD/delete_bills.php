<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["employee_no"]) && isset($_POST["sub_date"])) {
        $employee_no = $_POST["employee_no"];
        $sub_date = $_POST["sub_date"];

        $stmt = $conn->prepare("DELETE FROM bills_sub WHERE employee_no = ? AND sub_date = ? LIMIT 1");
        $stmt->bind_param("ss", $employee_no, $sub_date);

        if ($stmt->execute()) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting record.";
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Invalid request.";
    }
} else {
    echo "Invalid request method.";
}
?>