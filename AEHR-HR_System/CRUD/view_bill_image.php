<?php
include 'db.php'; // Ensure this path is correct
header("Access-Control-Allow-Origin: *");

if (!isset($_GET['employee_no']) || !isset($_GET['sub_date'])) {
    header("Content-Type: application/json");
    echo json_encode(["success" => false, "message" => "Invalid request parameters."]);
    exit;
}

$employee_no = trim($_GET['employee_no']);
$sub_date = trim($_GET['sub_date']);

$sql = "SELECT bill_image, bill_mime FROM bills_sub WHERE employee_no = ? AND sub_date = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    header("Content-Type: application/json");
    echo json_encode(["success" => false, "message" => "Database error: " . $conn->error]);
    exit;
}

$stmt->bind_param("ss", $employee_no, $sub_date);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($bill_image, $bill_mime);
    $stmt->fetch();

    if (!empty($bill_image)) {
        if (strpos($bill_mime, 'image') !== false) {
            // Return base64 image as JSON
            header("Content-Type: application/json");
            echo json_encode([
                "success" => true,
                "type" => "image",
                "image" => "data:" . htmlspecialchars($bill_mime, ENT_QUOTES, 'UTF-8') . ";base64," . base64_encode($bill_image)
            ]);
        } elseif ($bill_mime === "application/pdf") {
            // Return base64 PDF as JSON
            header("Content-Type: application/json");
            echo json_encode([
                "success" => true,
                "type" => "application/pdf",
                "image" => "data:" . htmlspecialchars($bill_mime, ENT_QUOTES, 'UTF-8') . ";base64," . base64_encode($bill_image)
            ]);
        } else {
            header("Content-Type: application/json");
            echo json_encode(["success" => false, "message" => "Unsupported file type."]);
        }
    } else {
        header("Content-Type: application/json");
        echo json_encode(["success" => false, "message" => "No file found."]);
    }
} else {
    header("Content-Type: application/json");
    echo json_encode(["success" => false, "message" => "No record found."]);
}

$stmt->close();
$conn->close();
?> 