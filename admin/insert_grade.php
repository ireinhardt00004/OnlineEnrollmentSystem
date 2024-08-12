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
    $faculty_id = $_SESSION['accountID'];
    $subjectCode = $_POST['subjectCode'];
    $full_name = $_POST['full_name'];
    $student_num = $_POST['student_num'];
    $midterm = $_POST['midterm'];
    $finals = $_POST['finals'];
    $remark = $_POST['remark'];
    

    $sql = "INSERT INTO grade (subject_code, faculty_id, student_num, full_name, midterm, finals, remark, timestamp)
            VALUES (:subject_code, :faculty_id, :student_num, :full_name, :midterm, :finals, :remark, CURRENT_TIMESTAMP)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':subject_code', $subjectCode, PDO::PARAM_STR);
    $stmt->bindParam(':faculty_id', $faculty_id, PDO::PARAM_STR);
    $stmt->bindParam(':student_num', $student_num, PDO::PARAM_STR);
    $stmt->bindParam(':full_name', $full_name, PDO::PARAM_STR);
    $stmt->bindParam(':midterm', $midterm, PDO::PARAM_STR);
    $stmt->bindParam(':finals', $finals, PDO::PARAM_STR);
    $stmt->bindParam(':remark', $remark, PDO::PARAM_STR);

    $stmt->execute();

    if ($stmt == true) {
        header("location: grade.php?msg=Insert Grade Successfully!");
    } else {
        echo 'Something went wrong';
    }
}
?>
