<?php
session_start();
define('DBNAME', 'db_enroll');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBHOST', 'localhost');

try {
    $db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if (isset($_SESSION['admin_ID']) && isset($_POST['submit'])) {
    // Update other fields
    $admin_ID = $_GET['admin_ID']; // Make sure to validate and sanitize this value

    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashedPassword = '';

    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    }

    $stmt = $db->prepare("UPDATE useraccounts SET 
        username = COALESCE(:username, username),
        password = COALESCE(:password, password)
        WHERE admin_ID = :admin_ID");

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
    $stmt->bindParam(":admin_ID", $admin_ID);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        header("Location: ../super/settings.php?msg=Edit successfully!");
        exit;
    } else {
        header("Location: ../super/settings.php?msg=Edit unsuccessful!");
        exit;
    }
}
?>
