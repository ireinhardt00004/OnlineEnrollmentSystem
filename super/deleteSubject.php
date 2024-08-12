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
$query = "DELETE FROM subject WHERE subject_id = :subject_id";
$stmt = $db->prepare($query);
$stmt->bindParam(":subject_id", $_GET['subject_id'], PDO::PARAM_INT);
$stmt->execute();

// Redirect back to index.php
header("Location: ../super/subject.php?msg=Delete Subject Successfully!");
exit;
?>
