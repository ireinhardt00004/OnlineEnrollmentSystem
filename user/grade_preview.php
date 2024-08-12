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
    <title>Certificate of Grades</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../assets/css/gradepreview.css">
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
      font-size:20px !important;
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
            font-size: 20px !important;
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
  table {
    font-size: 11px;
  }

</style>
</head>
<body>
    <div class="page-break">
    <div class="row">
  <div class="col-sm-1">
  </div>

    <div class="col-sm-10" style="border: 2px solid black; padding:10px;">
       
         <div class="row">
          <div class="col-2">
            <img src="../assets/img/logo.png " class="img-circle"style="border: 1px solid black; width:150px; height:160px; padding:10px;">
          </div>
           <div class="col">
              <div class="main-heading" style="text-align:center;">MONTEMAYOR COLLEGE</div>
     <p  style="font-size: 15px;"class="sub-heading"> CHED No. ABCDEFGHIJKLMNOP2345</p>
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
   <h3>CERTIFICATE OF GRADES</h3><br>
  </div>
  <div >Student Number: &nbsp; <b><?php echo $_SESSION['accountID']; ?></b></div>
  <div >Student Name: &nbsp; <b><?php echo $_SESSION['fname']; ?>&nbsp;<?php echo $_SESSION['middlename']; ?>&nbsp;<?php echo $_SESSION['lname']; ?></b></div>
  <div >Course: &nbsp; <b><?php echo $_SESSION['course']; ?></b></div>
  <div >Year : &nbsp; <b><?php echo $_SESSION['year']; ?>&nbsp;&nbsp; &nbsp;  </b>Semester:&nbsp; <b><?php echo $_SESSION['semester']; ?></b></div>
 <!-- Overall Grade -->

                     <?php
                    define('DBNAME', 'db_enroll');
                    define('DBUSER', 'root');
                    define('DBPASS', '');
                    define('DBHOST', 'localhost');
                    try {
                        $db = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Retrieve subject details based on course, year, and semester using INNER JOIN
                        $query = "SELECT student_courses.subject_code, student_courses.subject_name, tblschedule.facultyname, student_courses.action, grade.finals, grade.remark, grade.faculty_id
                        FROM student_courses
                        LEFT JOIN students ON student_courses.student_id = students.accountID
                        LEFT JOIN tblschedule ON student_courses.subject_code = tblschedule.subject_code
                        LEFT JOIN grade ON students.accountID = grade.student_num AND grade.subject_code = tblschedule.subject_code AND grade.faculty_id = tblschedule.accountID
                        WHERE student_courses.course = :course
                        AND student_courses.subject_year = :year
                        AND student_courses.subject_semester = :semester
                        AND student_courses.action IN ('added', 'update')
                        ";


                        $stmt = $db->prepare($query);
                        $stmt->bindParam(':course', $_SESSION['course']);
                        $stmt->bindParam(':year', $_SESSION['year']);
                        $stmt->bindParam(':semester', $_SESSION['semester']);
                        $stmt->execute();
                        $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            function convertScoreToGPA($score) {
                                if ($score >= 96.7 && $score <= 100.0) {
                                    return 1.00;
                                } elseif ($score >= 93.4 && $score <= 96.6) {
                                    return 1.25;
                                } elseif ($score >= 90.1 && $score <= 93.3) {
                                    return 1.50;
                                } elseif ($score >= 86.7 && $score <= 90.0) {
                                    return 1.75;
                                } elseif ($score >= 83.4 && $score <= 86.6) {
                                    return 2.00;
                                } elseif ($score >= 80.1 && $score <= 83.3) {
                                    return 2.25;
                                } elseif ($score >= 76.7 && $score <= 80.0) {
                                    return 2.50;
                                } elseif ($score >= 73.4 && $score <= 76.6) {
                                    return 2.75;
                                } elseif ($score >= 70.0 && $score <= 73.3) {
                                    return 3.00;
                                } elseif ($score >= 50.0 && $score <= 69.9) {
                                    return 4.00;
                                } else {
                                    return 5.00;
                                }
                            }
                        // Output the retrieved subject details
                       
                        echo '<div class="container-lg mt-4 p-4">';
                        
                        echo '<div class="row justify-content-center">';
                        echo '<div class="col-sm-10 col-md-10 col-lg-10">';
                        echo '<div class="table- my-5">';
                        echo '<table class="table text-uppercase table-hover text-center my-1">';
                        echo '<thead class="text-bg-warning">';
                        echo '<tr class="col-sm">';
                        echo '<th scope="col">Course Code</th>';
                        echo '<th scope="col">Course Title</th>';
                        //echo '<th scope="col">Total Lecture Score (OBA)</th>';
                      //  echo '<th scope="col">Total Laboratory Score (OBA)</th>';
                       echo '<th scope="col">Grade</th>';
                        echo '<th scope="col">Remarks</th>';
                        echo '<th scope="col">Instructor</th>';
                        
                        echo '</tr>';
                        echo '</thead>';
                        echo '</tbody>';
           

$displayedSubjectCodes = []; // Array to track displayed subject codes
$totalOverallGPA = 0; // Variable to track the sum of overall GPAs

foreach ($subjects as $subject) {
    // Check if the subject code has already been displayed
    if (in_array($subject['subject_code'], $displayedSubjectCodes)) {
        continue; // Skip this iteration if the subject code has been displayed
    }
    
    echo '<tr>';
    echo '<td>' . $subject['subject_code'] . '</td>';
    echo '<td>' . $subject['subject_name'] . '</td>';
   
    if (!empty($subject['finals']) && !empty($subject['remark'])) {
        // Retrieve the midterm score for the subject
        $query = "SELECT midterm FROM grade WHERE student_num = :student_num AND subject_code = :subject_code";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':student_num', $_SESSION['accountID']);
        $stmt->bindParam(':subject_code', $subject['subject_code']);
        $stmt->execute();
        $midterm = $stmt->fetchColumn();
        
        // Convert midterm score and final score to GPA
        $midtermGPA = convertScoreToGPA($midterm);
        $finalGPA = convertScoreToGPA($subject['finals']);
        
        // Calculate the overall GPA
        $overallGPA = ($midtermGPA + $finalGPA) / 2;
        echo '<td style="font-weight:bold;">' . $overallGPA . '</td>';

        echo '<td>' . $subject['remark'] . '</td>';
        
        // Add the overall GPA to the total
        $totalOverallGPA += $overallGPA;
        
    } else {
        echo '<td colspan="2">N/A</td>'; // Span two columns for subject without finals or remark
    }
    
    echo '<td>' . ($subject['facultyname'] ?? 'No Instructor Assigned') . '</td>';
  
    echo '</tr>';
    
    // Add the displayed subject code to the array
    $displayedSubjectCodes[] = $subject['subject_code'];
}

// Calculate the average grade
$totalSubjects = count($subject);
$averageGPA = $totalSubjects > 0 ? $totalOverallGPA / $totalSubjects : 0;

//to get the nearest thousandths
$formattedAverageGPA = number_format($averageGPA, 2);

                        echo '</tbody>';
                        echo '<tfoot>';
                        echo '<tr>';
           
                        echo '<td>';'</td>';

                        echo '<td colspan="2"><b>Overall Grade</b></td>';
                       echo '<td colspan="5" style="font-weight: bold; font-size: 20px;">' . $formattedAverageGPA .'</td>';
                        echo '</tr>';
                        echo '</tfoot>';
                        echo '</table>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';

                    } catch (PDOException $e) {
                        echo 'Connection failed: ' . $e->getMessage();
                    }
                    ?>
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
    }$query = "SELECT full_name
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
              <div class="col-3">
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
    ?>
</div>
</div>

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