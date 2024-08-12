<?php
// Database Connection


/*// File upload code
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
}*/

// Form Data Processing
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Form data processing...
    define('DBNAME', 'db_enroll');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBHOST', 'localhost');
    $db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$full_name = $_POST['full_name'];
   $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $role = $_POST['role'];



function generateUniqueNumber() {
  // Generate a unique number based on your requirements
  // Here's an example using a random number
  $min = 000; // Minimum value for the unique number
  $max = 999; // Maximum value for the unique number

  return mt_rand($min, $max); // Generate a random number within the specified range
}

    
// Generate a unique ID with a preset and a unique number
$prefix = "ADMIN-100-";
$uniqueNumber = generateUniqueNumber(); // You need to implement this function

$admin_ID  = $prefix . $uniqueNumber;

// Function to generate a unique number



// Retrieve the email address from the registration form
    $email = $_POST['username'];

    // Prepare and execute a query to check if the email exists in the database
    $query = "SELECT COUNT(*) as count FROM useraccounts WHERE username = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$full_name]);

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the count is greater than 0
    if ($result['count'] > 0) {
        header("Location: ../super/superreg.php?error=Username Already in use.");
        exit(); // Stop further execution
    }

$query = "INSERT INTO useraccounts (admin_ID, full_name, username, password, role) VALUES (:admin_ID, :full_name, :username, :password, :role)";
$stmt = $db->prepare($query);
$stmt->bindParam(':full_name', $full_name, PDO::PARAM_STR);
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->bindParam(':role', $role, PDO::PARAM_STR);
$stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
$stmt->bindParam(':admin_ID', $admin_ID, PDO::PARAM_STR);

$stmt->execute();

    if ($stmt == true) {
        header("location:../super/superreg.php?msg=Registration Successfully!");
    } else {
        echo 'Something went wrong';
    }
}
?>
