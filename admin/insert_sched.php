<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Form data processing...
    define('DBNAME', 'db_enroll');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBHOST', 'localhost');
    $db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Update other fields
    $accountID = $_SESSION['accountID'];
    $subjectCode = $_POST['subjectCode'];
    $facultyname = $_POST['facultyname'];
    $schedFrom = $_POST['schedFrom'];
    $schedTo = $_POST['schedTo'];
    $schedDay = $_POST['schedDay'];
    $cnum = $_POST['cnum'];
    $course = $_POST['course'];
    $accountID = $_POST['accountID'];

    $sql = "INSERT INTO tblschedule (subject_code,facultyname, accountID, schedFrom, schedTo, schedDay, cnum, course) VALUES (:subject_code,:facultyname, :accountID, :schedFrom, :schedTo, :schedDay, :cnum, :course)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':subject_code', $subjectCode, PDO::PARAM_STR);
    $stmt->bindParam(':facultyname', $facultyname, PDO::PARAM_STR);
     $stmt->bindParam(':accountID', $accountID, PDO::PARAM_STR);
    $stmt->bindParam(':schedFrom', $schedFrom, PDO::PARAM_STR);
    $stmt->bindParam(':schedTo', $schedTo, PDO::PARAM_STR);
    $stmt->bindParam(':schedDay', $schedDay, PDO::PARAM_STR);
    $stmt->bindParam(':cnum', $cnum, PDO::PARAM_STR);
    $stmt->bindParam(':course', $course, PDO::PARAM_STR);

    $stmt->execute();

    if ($stmt == true) {
        header("location:index.php?msg=Insert Schedule Successfully");
    } else {
        echo 'Something went wrong';
    }
}
?>
