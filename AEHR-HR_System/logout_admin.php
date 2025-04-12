<?php
session_name("admin_session"); // Ensure the correct session is targeted
session_start();
session_unset();
session_destroy();
setcookie("admin_session", "", time() - 3600, "/"); // Delete session cookie

echo "<script>sessionStorage.clear(); window.location.href = 'index.php';</script>";
exit();
?>
