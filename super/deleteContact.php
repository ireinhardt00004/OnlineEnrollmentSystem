<?php
// Database connection parameters
$host = "localhost";
$dbname = "db_enroll";
$username = "root";
$password = "";

// Create PDO connection
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Prepare the statement
$query = "DELETE FROM contact WHERE contact_id = :contact_id";
$stmt = $db->prepare($query);
$stmt->bindParam(":contact_id", $_GET['contact_id'], PDO::PARAM_INT);
$stmt->execute();

// Redirect back to index.php
header("Location: ../super/message.php?error=Delete Message Successfully!");
exit;
?>
