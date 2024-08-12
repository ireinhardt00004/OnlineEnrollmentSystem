<?php
// Database Connection


// File upload code
if (isset($_FILES['my_image']) && $_FILES['my_image']['error'] === 0) {
    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];

    if ($img_size > 1250000) {
        $em = "Sorry, your file is too large.";
        header("Location: edit.php?error=$em");
        exit();
    }

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    $img_ex_lc = strtolower($img_ex);

    $allowed_exs = array("jpg", "jpeg", "png");
    if (!in_array($img_ex_lc, $allowed_exs)) {
        $em = "Sorry, only JPG, JPEG, and PNG files are allowed.";
        header("Location: edit.php?error=$em");
        exit();
    }

    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
    $img_upload_path = '../uploads/' . $new_img_name;

    move_uploaded_file($tmp_name, $img_upload_path);
}

// Form Data Processing
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Form data processing...
    define('DBNAME', 'db_enroll');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBHOST', 'localhost');
    $db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $acadyear = '2023-2024';
    $lname = $_POST['lname'];
    $middlename = $_POST['middlename'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


    $bdate = $_POST['bdate'];
    $address = $_POST['address'];
    $cnum = $_POST['cnum'];
    $role = $_POST['user'];
    $course = $_POST['course'];
    $gender = $_POST['gender'];
    $category = $_POST['category'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];


    $pay_status = ''; // Define $pay_status variable
 


function generateUniqueNumber() {
  // Generate a unique number based on your requirements
  // Here's an example using a random number
  $min = 000; // Minimum value for the unique number
  $max = 999; // Maximum value for the unique number

  return mt_rand($min, $max); // Generate a random number within the specified range
}

    
// Generate a unique ID with a preset and a unique number
$prefix = "2023-100-";
$uniqueNumber = generateUniqueNumber(); // You need to implement this function

$accountID  = $prefix . $uniqueNumber;

// Function to generate a unique number



// Retrieve the email address from the registration form
    $email = $_POST['email'];

    // Prepare and execute a query to check if the email exists in the database
    $query = "SELECT COUNT(*) as count FROM students WHERE email = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$email]);

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the count is greater than 0
    if ($result['count'] > 0) {
        header("Location: ../student_admission.php?error=Email Already in use.");
        exit(); // Stop further execution
    }


   $sql = "INSERT INTO students (fname, middlename, lname, password, gender, bdate, address, category, course, year, semester, email, cnum, pay_status,  acadyear, accountID, img_url, role) VALUES (:fname, :middlename, :lname, :password,:gender, :bdate, :address, :category, :course, :year, :semester, :email, :cnum,  :pay_status, :acadyear, :accountID, :img_url,:role)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
    $stmt->bindParam(':middlename', $middlename, PDO::PARAM_STR);
    $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
    $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
    $stmt->bindParam(':bdate', $bdate, PDO::PARAM_STR);
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);

    $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
    $stmt->bindParam(':course', $course, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':role', $role, PDO::PARAM_STR);
    $stmt->bindParam(':cnum', $cnum, PDO::PARAM_STR);
     $stmt->bindParam(':year', $year, PDO::PARAM_STR);

    $stmt->bindParam(':semester', $semester, PDO::PARAM_STR);
    $stmt->bindParam(':pay_status', $pay_status, PDO::PARAM_STR); 
    $stmt->bindParam(':acadyear',$acadyear, PDO::PARAM_STR); 
    $stmt->bindParam(':accountID', $accountID, PDO::PARAM_STR);
    $stmt->bindParam(':img_url', $new_img_name, PDO::PARAM_STR);

    $stmt->execute();
    $last_id = $db->lastInsertId();
    if ($last_id != '') {
        header("location:../preview/preview.php?id=" . $accountID);
    } else {
        echo 'Something went wrong';
    }
}
?>
