<?php
session_start();

// Clear session variables
session_unset();
unset($_SESSION['accountID']);
unset($_SESSION['email']);

// Destroy the session
session_destroy();

// Redirect to login page with a logout parameter
header("Location: ../login.php?logout=1");
exit();
?>
