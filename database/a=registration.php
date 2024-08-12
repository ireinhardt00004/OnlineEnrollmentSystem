<?php
// Database Connection
include "../db_conn.php";
// File upload code
if (isset($_FILES['my_image']) && $_FILES['my_image']['error'] === 0) {
    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];

    if ($img_size > 1250000) {
        $em = "Sorry, your file is too large.";
        header("Location: ../faculty_admission.php?error=$em");
        exit();
    }

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);

    $allowed_exs = array("jpg", "jpeg", "png");
    if (!in_array($img_ex_lc, $allowed_exs)) {
        $em = "Sorry, only JPG, JPEG, and PNG files are allowed.";
        header("Location: ../faculty_admission.php?error=$em");
        exit();
    }

    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
    $img_upload_path = '../uploads/' . $new_img_name;

    move_uploaded_file($tmp_name, $img_upload_path);
}

// Form Data Processing
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $lname = $_POST['lname'];
    $middlename = $_POST['middlename'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $bdate = $_POST['bdate'];
    $cnum = $_POST['cnum'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $role = $_POST['admin'];
    $accountID = uniqid('', true);

    // Retrieve the email address from the registration form
    $email = $_POST['email'];

    // Prepare and execute a query to check if the email exists in the database
    $query = "SELECT COUNT(*) as count FROM faculty WHERE email = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$email]);

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the count is greater than 0
    if ($result['count'] > 0) {
        header("Location: ../faculty_admission.php?error=Email Already in use.");
        exit(); // Stop further execution
    }

    // SQL query to insert data into the database
    $sql = "INSERT INTO faculty (fname, middlename, lname, password, gender, bdate, address, course, email, cnum,  accountID, img_url,role) VALUES (:fname, :middlename, :lname, :password,:gender, :bdate, :address, :course, :email, :cnum, :accountID, :img_url, :role)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
    $stmt->bindParam(':middlename', $middlename, PDO::PARAM_STR);
    $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
    $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
    $stmt->bindParam(':bdate', $bdate, PDO::PARAM_STR);
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
     $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
    $stmt->bindParam(':course', $course, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':cnum', $cnum, PDO::PARAM_STR);
    $stmt->bindParam(':accountID', $accountID, PDO::PARAM_STR);
    $stmt->bindParam(':img_url', $new_img_name, PDO::PARAM_STR);
    $stmt->bindParam(':role', $role, PDO::PARAM_STR);
    
    if ($stmt->execute()) {
    header("Location: ../faculty_admission.php?msg=Registered successfully!");
    exit();
} else {
    header("Location: ../faculty_admission.php?error=Error inserting data: " . $stmt->error);
    exit();
}


    $stmt->close();
    $conn->close();
}
?>
