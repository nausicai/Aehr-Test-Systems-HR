<?php
include 'db.php';

header("Content-Type: application/json");

if (isset($_POST['employee_no']) && isset($_POST['sub_date'])) {
    $employee_no = $_POST['employee_no'];
    $sub_date = $_POST['sub_date'];

    $sql = "SELECT bill_image FROM bills_sub WHERE employee_no = ? AND sub_date = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $employee_no, $sub_date);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($bill_image);
    
    $response = ["file_exists" => false];

    if ($stmt->fetch() && !empty($bill_image)) {
        $response["file_exists"] = true;
    }

    $stmt->close();
    $conn->close();

    echo json_encode($response);
}
?>
