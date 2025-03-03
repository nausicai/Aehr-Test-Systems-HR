<?php
session_start();
include 'db.php'; // Include database connection

header('Content-Type: application/json'); // Ensure JSON response

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUsername = trim($_POST['adminUsername']);
    $newPassword = trim($_POST['adminPassword']);

    // Prevent SQL Injection
    $newUsername = mysqli_real_escape_string($conn, $newUsername);

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update admin details in the database
    $sql = "UPDATE admin SET account = '$newUsername', password = '$hashedPassword' WHERE id = 1";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Admin account updated successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error updating admin: " . $conn->error]);
    }
}
?>
