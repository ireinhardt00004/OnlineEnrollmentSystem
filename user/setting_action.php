<?php
session_start();
include "../db_conn.php";

if (isset($_SESSION['accountID'])) {
    if (isset($_POST['submit'])) {

        // Update other fields
        $accountID = $_SESSION['accountID'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $hashedPassword = '';

        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        }

        // Retrieve the email address from the registration form
        $email = $_POST['email'];

        /*// Prepare and execute a query to check if the email exists in the database
        $query = "SELECT COUNT(*) as count FROM students WHERE email = ? AND accountID = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$email, $accountID]);

        // Fetch the result
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the count is greater than 0
        if ($result['count'] > 0) {
            header("Location: settings.php?error=Email Already in use.");
            exit(); // Stop further execution
        }
*/
        // Prepare and execute a query to check if the password exists in the database
        $query = "SELECT COUNT(*) as count FROM students WHERE password = ? AND accountID = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$password, $accountID]);

        // Fetch the result
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the count is equal to or greater than 1
        if ($result['count'] >= 1) {
            header("Location: settings.php?error=Password Already in use.");
            exit(); // Stop further execution
        }

        $stmt = $db->prepare("UPDATE students SET 
            email = COALESCE(:email, email),
            password = COALESCE(:password, password)
            WHERE accountID = :accountID AND role = 'user'");

        $stmt->bindParam(":email", $email);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(":accountID", $accountID);
        $stmt->execute();

        if ($stmt->rowCount() >=1) {
            echo "Edit successful.";
            header("Location: ../user/settings.php?error=Edit successfully!");
        } else {
            echo "No rows were updated.";
            header("Location: ../user/settings.php?error=Edit unsuccessful!");
        }

        $stmt->close();
        $db = null;
    }
}
?>
