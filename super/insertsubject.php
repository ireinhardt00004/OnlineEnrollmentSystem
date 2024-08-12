<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Form data processing...
    define('DBNAME', 'db_enroll');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBHOST', 'localhost');
    $db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $subject_code = $_POST['subject_code'];
    $subject_name = $_POST['subject_name'];
    $subject_description = $_POST['subject_description'];
    $subject_year = $_POST['subject_year'];
    $subject_department = $_POST['subject_department'];
    $subject_semester = $_POST['subject_semester'];
    $lecture = $_POST['lecture'];
    $lab = $_POST['lab'];
    
    $sql = "INSERT INTO subject  
        (subject_code, subject_name, subject_description, subject_year, subject_department, subject_semester, lecture, lab) 
        VALUES ( :subject_code, :subject_name, :subject_description, :subject_year, :subject_department, :subject_semester, :lecture, :lab)";
     $stmt = $db->prepare($sql);

    $stmt->bindParam(":subject_code", $subject_code);
    $stmt->bindParam(":subject_name", $subject_name);
    $stmt->bindParam(":subject_description", $subject_description);
    $stmt->bindParam(":subject_year", $subject_year);
    $stmt->bindParam(":subject_department", $subject_department);
    $stmt->bindParam(":subject_semester", $subject_semester);
    $stmt->bindParam(":lecture", $lecture);
    $stmt->bindParam(":lab", $lab);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Insert successful.";
        header("Location: subject.php?msg=Insert Subject Successfully!");
        exit();
    } else {
        echo "Insert unsuccessful.";
        header("Location: subject.php?msg=Insert Subject Unsuccessful!");
          exit();
    }

    $stmt->close();
} 
?>
