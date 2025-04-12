<?php
session_name("admin_session"); // Set the session name for admin
session_start([
    'use_strict_mode' => 1,
    'cookie_httponly' => 1, 
    'cookie_secure' => 0,   // Set to 1 if using HTTPS
    'use_only_cookies' => 1,
    'sid_length' => 128
]);

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}
?>
