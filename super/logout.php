<?php
session_start();

// Clear session variables
session_unset();
unset($_SESSION['admin_ID']);
unset($_SESSION['username']);

// Destroy the session
session_destroy();

// Redirect to login page with a logout parameter
header("Location: ../super/index.php?logout=1");
exit();
?>
