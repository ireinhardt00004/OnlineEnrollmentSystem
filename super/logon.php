<?php

include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    session_start(); // Initialize the session

    function validate($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $email = validate($_POST['username']);
    $enteredPassword = $_POST['password'];

    if (empty($email)) {
        header("Location: ../super/index.php?error=Username is required");
        exit();
    } else if (empty($enteredPassword)) {
        header("Location: ../super/index.php?error=Password is required");
        exit();
    }

    // Establish database connection
    define('DBNAME', 'db_enroll');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBHOST', 'localhost');
    $db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT password FROM useraccounts WHERE username = :username";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $email); // Updated from $username to $email
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result && password_verify($enteredPassword, $result['password'])) {
        $hashedPassword = $result['password'];
        $sql = "SELECT * FROM useraccounts WHERE username = :username AND password = :password ";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':username', $email); // Updated from $username to $email
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $_SESSION['username'] = $row['username'];
            $_SESSION['full_name'] = $row['full_name'];
           
            $_SESSION['admin_ID'] = $row['admin_ID'];
           
            $_SESSION['role'] = $row['role'];
            header("Location: ../super/dashboard.php");
            exit();
        }
    } 
    // Password is incorrect or no matching user found
    header("Location: ../super/index.php?error=Incorrect Username or Password");
    exit();
} else {
    header("Location: ../super/index.php");
    exit();
}
?>
