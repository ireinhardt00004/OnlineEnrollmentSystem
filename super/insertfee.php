<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Form data processing...
    define('DBNAME', 'db_enroll');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBHOST', 'localhost');
    $db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pay_name = $_POST['pay_name'];
    $price_description = $_POST['price_description'];
    $price = $_POST['price'];
    $subject_year = $_POST['subject_year'];
    $subject_department = $_POST['subject_department'];
    $subject_semester = $_POST['subject_semester'];
    
    
    $sql = "INSERT INTO fee  
        (name, fee_description, price, year, fee_department, semester) 
        VALUES ( :pay_name, :price_description, :price, :subject_year, :subject_department, :subject_semester)";
     $stmt = $db->prepare($sql);

    $stmt->bindParam(":pay_name", $pay_name);
    $stmt->bindParam(":price_description", $price_description);
    $stmt->bindParam(":price", $price);
    $stmt->bindParam(":subject_year", $subject_year);
    $stmt->bindParam(":subject_department", $subject_department);
    $stmt->bindParam(":subject_semester", $subject_semester);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Insert successful.";
        header("Location: fee.php?error=Insert Data successfully!");
        exit();
    } else {
        echo "Insert unsuccessful.";
        header("Location: fee.php?error=Insert Data unsuccessful!");
          exit();
    }

    $stmt->close();
} 
?>
