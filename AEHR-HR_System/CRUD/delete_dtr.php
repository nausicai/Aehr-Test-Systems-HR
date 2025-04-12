<?php
require 'db.php'; // Adjust based on your file structure

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["employee_no"])) {
        $employee_no = $_POST["employee_no"];

        // Prepare the DELETE statement
        $sql = "DELETE FROM dtr WHERE employee_no = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $employee_no);
            if ($stmt->execute()) {
                echo "Employee No: $employee_no's submission has been deleted successfully.";
            } else {
                echo "Error deleting submission.";
            }
            $stmt->close();
        } else {
            echo "Database error.";
        }
    } else {
        echo "Invalid request.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
