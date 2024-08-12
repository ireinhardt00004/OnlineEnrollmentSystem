<?php
// Form data processing...
define('DBNAME', 'db_enroll');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBHOST', 'localhost');
$conn = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['contact_id'])) {
    $contactId = $_GET['contact_id'];

    // Prepare and execute the SQL query to retrieve the message details
    $stmt = $conn->prepare("SELECT * FROM contact WHERE contact_id = ?");
    $stmt->execute([$contactId]); // Pass the parameter directly to execute()
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result !== false) {
        // Return the message details as JSON response
        header('Content-Type: application/json');
        echo json_encode($result);
    } else {
        // No message found with the given contact_id
        echo "Message not found.";
    }

    $stmt->closeCursor();
} else {
    // No contact_id parameter provided
    echo "Invalid request.";
}

// Close the database connection
$conn = null;
?>
