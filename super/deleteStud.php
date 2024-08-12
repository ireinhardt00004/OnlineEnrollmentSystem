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


// Retrieve the accountID from the URL query string
$id = $_GET['id'];

// Prepare the statement
$query = "DELETE FROM students WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->bindParam(":id", $id, PDO::PARAM_INT);
$stmt->execute();

// Redirect back to list.php
header("Location: ../super/lists.php?error=Delete Successfully!");
exit;
?>
