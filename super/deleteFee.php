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
$query = "DELETE FROM fee WHERE fee_id = :fee_id";
$stmt = $db->prepare($query);
$stmt->bindParam(":fee_id", $_GET['fee_id'], PDO::PARAM_INT);
$stmt->execute();

// Redirect back to index.php
header("Location: ../super/fee.php?msg=Delete Successfully");
exit;
?>
