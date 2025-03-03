<?php
session_start();
include 'db.php'; // Database connection

header('Content-Type: application/json'); // Ensure JSON response

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['adminUsername']);
    $password = trim($_POST['adminPassword']);

    // Prevent SQL Injection
    $username = mysqli_real_escape_string($conn, $username);

    // Fetch admin details
    $sql = "SELECT * FROM admin WHERE account = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Verify password
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['admin'] = $username; // Start session
            echo json_encode(["status" => "success", "redirect" => "dashboard.php"]);
            exit();
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid username or password."]);
            exit();
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid username or password."]);
        exit();
    }
}
?>
