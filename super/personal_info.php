<?php
include "../db_conn.php";

if (isset($_SESSION['accountID'])) {
    if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
        // Upload image code...
        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];

        if ($error === 0) {
            if ($img_size > 1250000) {
                $em = "Sorry, your file is too large.";
                header("Location: ../admin/edit.php?error=$em");
                exit();
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png");

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = '../uploads/' . $new_img_name;

                    move_uploaded_file($tmp_name, $img_upload_path);

                    // Update image URL in the database
                    $accountID = $_SESSION['accountID'];
                    $stmt = $db->prepare("UPDATE users SET img_url = :img_url WHERE accountID = :accountID AND role='admin'");
                    $stmt->bindParam(":img_url", $new_img_name);
                    $stmt->bindParam(":accountID", $accountID);
                    $stmt->execute();
                    echo "Image uploaded and URL updated successfully.";
                }
            }
        }
    }

    // Update other fields
    $accountID = $_SESSION['accountID'];
    $fname = $_POST['fname'];
    $middlename = $_POST['middlename'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $cnum = $_POST['cnum'];
    $bdate = $_POST['bdate'];
    $address = $_POST['address'];
    $role = 'admin';

    $stmt = $db->prepare("UPDATE student SET 
        fname = :fname,
        middlename = :middlename,
        lname = :lname,
        gender = :gender,
        cnum = :cnum,
        bdate = :bdate,
        address = :address
        WHERE accountID = :accountID AND role = 'admin'");

    $stmt->bindParam(":fname", $fname);
    $stmt->bindParam(":middlename", $middlename);
    $stmt->bindParam(":lname", $lname);
    $stmt->bindParam(":gender", $gender);
    $stmt->bindParam(":cnum", $cnum);
    $stmt->bindParam(":bdate", $bdate);
    $stmt->bindParam(":address", $address);
    $stmt->bindParam(":accountID", $accountID);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Edit successful.";
        header("Location: ../admin/edit.php?error=Edit successfully!");
    } else {
        echo "No rows were updated.";
        header("Location: ../admin/edit.php?error=Edit unsuccessful!");
    }

    $stmt->close();
    $conn = null;
}
?>
