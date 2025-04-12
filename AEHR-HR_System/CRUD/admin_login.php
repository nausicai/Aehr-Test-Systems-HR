<?php
session_name("admin_session"); // Set a custom session name for admin
session_start([
    'use_strict_mode' => 1,
    'cookie_httponly' => 1,
    'cookie_secure' => 0,
    'use_only_cookies' => 1,
    'sid_length' => 128
]);

include 'db.php';
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_account = trim($_POST['adminUsername']);
    $admin_password = trim($_POST['adminPassword']);

    $stmt = $conn->prepare("SELECT id, account, password FROM admin WHERE account = ?");
    $stmt->bind_param("s", $admin_account);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();
        
        if (password_verify($admin_password, $admin['password'])) {
            session_regenerate_id(true); // Prevent session fixation
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_account'] = $admin['account'];
            
            echo json_encode(["status" => "success", "redirect" => "dashboard.php"]);
            exit();
        }
    }
    
    echo json_encode(["status" => "error", "message" => "Invalid credentials"]);
    exit();
}

header("Location: index.php");
exit();
?>
