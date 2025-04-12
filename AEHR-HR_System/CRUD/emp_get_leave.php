<?php
session_name('HR_EMP_SESSION');
session_start();
include 'db.php'; // Database connection

if (!isset($_SESSION["employee_no"])) {
    echo json_encode(["error" => "User not logged in"]);
    exit();
}

$employee_no = $_SESSION["employee_no"];

$sql = "SELECT vl_bal, sl_bal FROM dtr WHERE employee_no = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $employee_no);
$stmt->execute();
$stmt->bind_result($vl_bal, $sl_bal);
$stmt->fetch();
$stmt->close();
$conn->close();

echo json_encode(["vl" => $vl_bal, "sl" => $sl_bal]);
?>
