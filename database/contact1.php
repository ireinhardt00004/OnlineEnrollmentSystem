<?php
// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validate and sanitize the input data
    // ...

    // Connect to the database (replace with your own credentials)
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'db_enroll';

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Prepare and bind the insert statement
    $stmt = $conn->prepare("INSERT INTO contact (name, subject, email, message, timestamp) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssss", $name, $subject, $email, $message);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to the thank you page
        header("Location: ../thankyou.php");
        exit();
    } else {
        // Handle the error
        $error_message = "Failed to send the message.";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
