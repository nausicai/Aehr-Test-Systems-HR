<?php
session_name("HR_EMP_SESSION"); // Ensure the correct session is targeted
session_start();
session_unset();
session_destroy();
setcookie("HR_EMP_SESSION", "", time() - 3600, "/"); // Delete session cookie

echo "<script>sessionStorage.clear(); window.location.href = 'index.php';</script>";
exit();
?>
