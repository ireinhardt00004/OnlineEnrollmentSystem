<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['accountID'], $_SESSION['img_url'], $_SESSION['fname'], $_SESSION['bdate'], $_SESSION['middlename'], $_SESSION['address'], $_SESSION['cnum'], $_SESSION['lname'], $_SESSION['course'], $_SESSION['year'], $_SESSION['gender'], $_SESSION['category'], $_SESSION['acadyear'], $_SESSION['semester'])) {


    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration form Preview</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../assets/css/preview.css">
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

<!-- Favicons -->
  <link href="../assets/img/logo.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<style type="text/css">
    @page { size: legal;  margin: 10mm; margin-right: -70px; margin-left: -70px;}
@media print {
    a[href]:after {
        content: none !important;
    }
}
@page {
        size: legal;
        margin: 0;
    }
@media print {
        #printbtn {
        display: none !important;

    }
     .page-break {
            page-break-after: always;
        }
    }
    .main-heading
    {
      font-size:30px !important;
    }

    .underline{
line-height: 27px !important;
 text-decoration-style: dotted !important;
}
.close-button {
                display: block;
            }
/* Hide the button when printing */
  @media print {
    .print-hide {
      display: none;

    }
    /* Increase the font size of the main heading when printing */
        .main-heading {
            font-size: 30px !important;
        }

        /* Adjust line height and text decoration style for underline elements when printing */
        .underline {
            line-height: 1px !important;
            text-decoration-style: dotted !important;
        }

        .close-button {
                display: none;
            }
       
  }
 body {
            margin: 0.1cm;
            
        }
table {
      font-size: 8px;
    }

</style>
</head>
<body>
    <div class="page-break">
<?php /*
$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "db_enroll";

$db = mysqli_connect($sname, $uname, $password, $db_name);

if (!$db) {
    echo "Connection failed!";
    exit();
}
        $sql = "SELECT count(*) FROM students WHERE accountID = :accountID";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':accountID', $id, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->fetchColumn();

      if ($count == 0) {
            echo 'Registration number is missing or invalid. Kindly fill up <a href="student_admission.php">admission form</a>.';
        } else {
            $sql = "SELECT * FROM students WHERE accountID = :accountID";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':accountID', $id, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll();
}
            foreach ($rows as $row) {
               */{ ?> 
                
    <div class="row">
  <div class="col-sm-1">
  </div>

    <div class="col-sm-10" style="border: 2px solid black; padding:10px;">
       <?php /*

         $sql="SELECT * from students WHERE accountID=:accountID"; 
         $stmt = $db->prepare($sql);
           $stmt->bindParam(':accountID', $accountID, PDO::PARAM_STR);
           $stmt->execute();
           $rows=$stmt->fetchall();
        */ ?> 
         <div class="row">
          <div class="col-2">
            <img src="../assets/img/logo.png " class="img-circle"style="border: 1px solid black; width:150px; height:160px; padding:10px;">
          </div>
           <div class="col">
              <div class="main-heading">MONTEMAYOR COLLEGE</div>
     <p class="sub-heading"> CHED No. ABCDEFGHIJKLMNOP2345</p>
      <div class="address"> 13th floor, Trece Martyrs Tower, Trece Martires City, Cavite 4109
</div>
         <p class="email"> Email: <i>admissions@montemayorcollege.edu.ph</i><br> Website: <u> www.montemayorcollege.com</u></p>
          </div>
          <div class="col-sm-12">
            <hr class="hrcls"> 
          </div>
      </div>
      <div class="row">
  <p id="message"></p>
  <div class="col-sm-2">
  </div>
  <div class="col-sm-8" style="text-align: center;padding-bottom: 5px;">
   <h3>REGISTRATION FORM</h3><br><br>
  </div>
  <div class="col-sm-2">
  </div>

  </div>

<div class="row">
    <div class="col-6">
        <div class="form-group row">
   <div class="col-4">

      <label class="lable">Reg No.  </label>
    </div>
     <div class="col-6">
      <strong><?php echo $_SESSION['accountID'] ?></strong>
    </div>
    </div>

      <div class="form-group row">
   <div class="col-4">

      <label class="lable">First Name</label>
    </div>
     <div class="col-8">
      <?php echo $_SESSION['fname'] ?>
    </div>
    </div>
    <div class="form-group row">
   <div class="col-4">

      <label class="lable">Middle Name</label>
    </div>
     <div class="col-8">
     <?php echo $_SESSION['middlename'] ?>
    </div>
    </div>

    <div class="form-group row">
   <div class="col-4">
      <label class="lable">Last Name</label>
    </div>
     <div class="col-8">
      <?php echo $_SESSION['lname'] ?>
    </div>
    </div>
    <div class="form-group row">
   <div class="col-4">
      <label class="lable">Address</label>
    </div>
     <div class="col-8">
      <?php echo $_SESSION['address'] ?>
    </div>
    </div>
    <div class="form-group row">
   <div class="col-4">
      <label class="lable">Email</label>
    </div>
     <div class="col-8">
     <?php echo $_SESSION['email'] ?>
    </div>
    </div>
    <div class="form-group row">
   <div class="col-4">
      <label class="lable">Mobile No</label>
    </div>
     <div class="col-8">
      <?php echo $_SESSION['cnum'] ?>
    </div>
    </div>

<div class="form-group row">
   <div class="col-4">
      <label class="lable">Date of Birth</label>
    </div>
     <div class="col-8" required>
   <?php echo $_SESSION['bdate'] ?>
    </div>
    </div>
    
<div class="form-group row">
   <div class="col-4">
      <label class="lable">Gender</label>
    </div>
     <div class="col-8">
          <?php echo $_SESSION['gender'] ?>
    </div>
    </div>
    </div>
    <div class="col-6">
  <div class="row">
    <div class="col-12">
    <div class="form-group" style="float: right; right: 30;">
         <label class="lable"> Photo </label>
   <div style="width: 150px; ">
      <img src="../uploads/<?php echo $_SESSION['img_url'] ?> "  width="150" height="160">
  </div>

  </div>
  </div>
  </div>  
  
  

    </div>

</div> 
  <div class="row">
  <div class="col-6">
    <div class="form-group row">
      <div class="col-4">
        <label class="lable">Category</label>
      </div>
      <div class="col-8">
        <?php echo $_SESSION['category'] ?>
      </div>
    </div>
  </div>
  <div class="col-6">
    <div class="form-group row">
      <div class="col-4">
        <label class="lable">Year</label>
      </div>
      <div class="col-8">
        <?php echo $_SESSION['year'] ?>
      </div>
      <div class="col-4">
        <label class="lable">Semester</label>
      </div>
      <div class="col-8">
        <?php echo $_SESSION['semester'] ?>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-2"><label class="lable">Course </label></div>
      <?php echo $_SESSION['course'] ?>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-6">
    <div class="form-group row">
      <div class="col-4">
        <label class="lable">Fees</label>
      </div>
      <div class="col-8">
        <?php
        $sname = "localhost";
        $uname = "root";
        $password = "";
        $db_name = "db_enroll";

        $conn = mysqli_connect($sname, $uname, $password, $db_name);

        if (!$conn) {
          echo "Connection failed!";
          exit();
        }

        // Retrieve fee details based on course, year, and semester
        $course = $_SESSION['course'];
        //$year =  $_SESSION['year'];
        //$semester =  $_SESSION['semester'];

        $query = "SELECT fee.price FROM fee WHERE fee_department = '$course'";// AND fee.year = '$year' AND fee.semester = '$semester'";
        $result = mysqli_query($conn, $query);

        $totalPrice = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          $totalPrice += intval($row['price']);
        }

        echo "&#8369; " . $totalPrice;
        ?>

      </div>
    </div>
  </div>
  <div class="col-6">
    <div class="form-group row">
      <div class="col-4">
        <label class="lable">Payment Status</label>
      </div>
      <div class="col-8" style="color: red; font-weight:bold;">
        PAID [Republic Act 10931]
      </div>
    </div>
    <?php
    // Establish a PDO database connection
    $dsn = "mysql:host=localhost;dbname=db_enroll";
    $username = "root";
    $password = "";

    try {
      $db = new PDO($dsn, $username, $password);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      exit();
    }
    $query = "SELECT full_name
              FROM useraccounts
              WHERE role = 'Registrar'
              ";
    $stmt = $db->prepare($query); //AND fee.year = :year  AND fee.semester = :semester
    $stmt->execute();
    $fees = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($fees)) {
      foreach ($fees as $fee) {
        ?>
        <div class="row">
          <div class="col-12">
            <div class="form-group row">
              <div class="col-4">
                <label class="lable">College Registrar:</label>
              </div>
              <div class="col-8">
                <h6><?php echo $fee['full_name']; ?></h6>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
    }
    ?><br>
    <?php
    $id =  $_SESSION['accountID'];
    $query = "SELECT fname, middlename, lname
              FROM students
              WHERE accountID = :accountID";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':accountID', $id); // Bind the parameter for accountID
    $stmt->execute();
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($students)) {
      foreach ($students as $student) {
        ?>
        <div class="form-group row">
          <div class="col-8">
            <label class="lable">Signature: </label>
          </div>
          <div class="col-10">
            <h5><?php echo $student['fname'] . ' ' . $student['middlename'] . ' ' . $student['lname']; ?></h5>
          </div>
        </div>
        </div>
        </div><i>Page 1 of 2</i>
      </div>
    </div>
    </div>
  </div>
  <?php
      }
    }
    ?>


</div>


<br>

</div> <!-- Row 4 end --> 

<?php } ?> 
</div>
 
<div class="col-2">
  </div>

</div>
<br>


</div>
<!--SECOND PAGE -->
<div class="page-break">

<main>
    <i>Page 2 of 2</i>
    <h4 style="text-align: center; "><u><b>List of Subjects</b></u></h4>
    <table class="table">
       <?php
$id = $_SESSION['accountID'];
$course = $_SESSION['course'];
$year = $_SESSION['year'];
$semester = $_SESSION['semester'];

// Establish a PDO database connection

$dsn = "mysql:host=localhost;dbname=db_enroll";
$username = "root";
$password = "";

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

$query = "SELECT student_courses.subject_code, student_courses.subject_name, student_courses.lecture, student_courses.lab, student_courses.action
          FROM student_courses 
          WHERE course = :course
          AND student_courses.subject_year = :year
          AND student_courses.subject_semester = :semester 
          AND student_courses.action IN ('added', 'update')";
$stmt = $db->prepare($query);
$stmt->bindParam(':course', $course);
$stmt->bindParam(':year', $year);
$stmt->bindParam(':semester', $semester);
$stmt->execute();
$subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Subject Code</th>
            <th scope="col">Subject Name</th>
            <th scope="col">Lecture</th>
            <th scope="col">Lab</th>
            <th scope="col">Remark</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $totalLecture = 0;
        $totalLab = 0;
        foreach ($subjects as $subject):
    $totalLecture += intval($subject['lecture']);
    $totalLab += intval($subject['lab']);
    $remark = ($subject['action'] === 'update') ? 'ADDED SUBJECT' : '';
    ?>
    <tr>
        <td><?php echo $subject['subject_code']; ?></td>
        <td><?php echo $subject['subject_name']; ?></td>
        <td><?php echo $subject['lecture']; ?></td>
        <td><?php echo $subject['lab']; ?></td>
        <td><?php echo $remark; ?></td>
    </tr>
<?php endforeach; ?>

    </tbody>
    <tfoot>
        <tr>
            <td colspan="2"><b>Total Units:</b></td>
            <td><b><?php echo $totalLecture; ?></b></td>
            <td><b><?php echo $totalLab; ?></b></td>
        </tr>
    </tfoot>
</table>

    <h4 style="text-align: center; "><u><b>List of School Fees</b></u></h4>
     
    <div>

        <table class="table">
            <?php
            $id =  $_SESSION['accountID'];
        $course = $_SESSION['course'];
        $year = $_SESSION['year'];
        $semester = $_SESSION['semester'];

            // Retrieve fee details based on course, year, and semester
            $query = "SELECT fee.name, fee.fee_description, fee.price
                      FROM fee
                      WHERE fee_department = :course
                      ";
            $stmt = $db->prepare($query);//AND fee.year = :year  AND fee.semester = :semester
                     
            $stmt->bindParam(':course', $course);
          //  $stmt->bindParam(':year', $year);
          //  $stmt->bindParam(':semester', $semester);
            $stmt->execute();
            $fees = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalPrice = 0;

                    foreach ($fees as $fee):
                        $totalPrice += intval($fee['price']);
                        ?>
                        <tr>
                            <td><?php echo $fee['name']; ?></td>
                            <td><?php echo $fee['fee_description']; ?></td>
                            <td><?php echo $fee['price']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2"><b>Total Price :</b></td>
                        <td><b>&#8369;&nbsp;<?php echo $totalPrice; ?></b></td>
                    </tr>
                </tfoot>
            </table>
        </table>
    </div>
    <br>
    
<center>
  <button type="button" class="btn btn-warning" id="printbtn" onclick="window.print()">Print Form</button>
</center>
</main></div>

<button  class="close-button"id="closeButton"style="float:right; background: indianred;
     color: whitesmoke; font-weight: bold; font-size: 1.5em;"class="btn btn-warning" >CLOSE PAGE</a>
</button>
<br>
<script>
  // JavaScript code
  document.getElementById("closeButton").addEventListener("click", function() {
    // Close the current window/tab
    window.close();
  });
</script>
</body>
</html>
 <?php
} else {
    header("Location: ../user/index.php");
    exit();
}
?>