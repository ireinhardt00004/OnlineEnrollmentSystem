<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['accountID'], $_SESSION['img_url'], $_SESSION['fname'], $_SESSION['bdate'], $_SESSION['middlename'], $_SESSION['address'], $_SESSION['cnum'], $_SESSION['lname'], $_SESSION['course'], $_SESSION['year'], $_SESSION['gender'], $_SESSION['category'], $_SESSION['acadyear'], $_SESSION['semester'])) {


    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="grade.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link href="../assets/img/logo.png" rel="icon">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <title>View Grades</title>
    </head>

    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>

        <button class="navbar-toggler position-fixed" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="material-symbols-outlined text-dark fs-1 mt-1">
                density_medium
            </span>
        </button>
        <nav class="navbar bg-body-tertiary">
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title fs-2 text-uppercase border-bottom border-danger border-2"
                        id="offcanvasNavbarLabel"><a href="index.php" style="text-decoration: none;">Dashboard</a></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav fs-5 justify-content-start flex-grow-1 ps-1">
                        <li class="nav-item p-2 mt-4">
                            Student ID:
                            <?php echo $_SESSION['accountID']; ?>
                        </li>
                        
                        <li class="nav-item p-2 mt-4">
                            <a class="nav-link" href="course.php"><span class="material-symbols-outlined float-start p-2">
                                    school
                                </span>Courses</a>
                        </li>
                        <li class="nav-item p-2 mt-4">
                            <a class="nav-link" href="grade.php"><span class="material-symbols-outlined float-start p-2">
                                    show_chart
                                </span>Grades</a>
                        </li>
                        <li class="nav-item p-2 mt-4">
                            <a class="nav-link" href="regform.php"><span class="material-symbols-outlined float-start p-2">
                                    pen_size_4
                                </span>Registration Form</a>
                        </li>
                        <li class="nav-item p-2 mt-4 ">
                            <a class="nav-link" href="calendar.php"><span class="material-symbols-outlined float-start p-2">
                                    calendar_month
                                </span>Calendar</a>
                        </li>
                        <li class="nav-item p-2 mt-4 ">
                            <a class="nav-link" href="settings.php"><span class="material-symbols-outlined float-start p-2">
                                    settings
                                </span>Change Login Credentials</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav fs-5 justify-content-start flex-grow-1 ps-1  mt-5">
                        <li class="nav-item p-2 mt-5 pt-10">
                            <a class="nav-link" href="../database/logout.php"><span
                                    class="material-symbols-outlined float-start p-2">
                                    logout
                                </span>Log out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-lg">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-10 col-lg-10 mt-4">
                    <h2>View Grades</h2>
                    <div class="btn-group">
                        <button class="btn btn-warning btn-sm ms-2" type="button">
                            Academic Year and Semester
                        </button>
                        <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item active" href="#">
                                    <?php echo $_SESSION['semester']; ?>-AY
                                    <?php echo $_SESSION['acadyear']; ?>
                                </a></li>
                            <li><a class="dropdown-item" href="#">---AY
                                    <?php echo $_SESSION['acadyear']; ?>
                                </a></li>
                            <li><a class="dropdown-item" href="#">---AY
                                    <?php echo $_SESSION['acadyear']; ?>
                                </a></li>
                        </ul>
                    </div><br>
                     
                     <!-- DATABASE FOR MIDTERM SUBJECT -->
                    <?php
                    define('DBNAME', 'db_enroll');
                    define('DBUSER', 'root');
                    define('DBPASS', '');
                    define('DBHOST', 'localhost');

                    try {
                         $db = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Retrieve subject details based on course, year, and semester using INNER JOIN
                        $query = "SELECT student_courses.subject_code, student_courses.subject_name, tblschedule.facultyname, student_courses.action, grade.midterm, grade.remark, grade.faculty_id
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

                        // Output the retrieved subject details
                        
                        echo '  <button type="button" class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal"data-bs-target="#staticBackdrop"style="float:right;">
                                       GPA Comparison Table
                                    </button>';
                        echo '<div class="container-lg mt-4 p-4">';
                        echo '<h2>Midterm Grades</h2>';
                        echo '<div class="row justify-content-center">';
                        echo '<div class="col-sm-10 col-md-10 col-lg-10">';
                        echo '<div class="table-responsive my-5">';
                        echo '<table class="table text-uppercase table-hover text-center my-1">';
                        echo '<thead class="text-bg-warning">';
                        echo '<tr class="col-sm">';
                        echo '<th scope="col">Course Code</th>';
                        echo '<th scope="col">Course Title</th>';
                        //echo '<th scope="col">Total Lecture Score (OBA)</th>';
                      //  echo '<th scope="col">Total Laboratory Score (OBA)</th>';
                        echo '<th scope="col">Midterm Score</th>';
                        echo '<th scope="col">Midterm GPA</th>';
                        echo '<th scope="col">Remarks</th>';
                        echo '<th scope="col">Instructor</th>';
                        
                        echo '</tr>';
                        echo '</thead>';
                        echo '</tbody>';
           

$displayedSubjectCodes = []; // Array to track displayed subject codes
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

foreach ($subjects as $subject) {
    // Check if the subject code has already been displayed
    if (in_array($subject['subject_code'], $displayedSubjectCodes)) {
        continue; // Skip this iteration if the subject code has been displayed
    }
    
    echo '<tr>';
    echo '<td>' . $subject['subject_code'] . '</td>';
    echo '<td>' . $subject['subject_name'] . '</td>';
   
    if (!empty($subject['midterm']) && !empty($subject['remark'])) {
        echo '<td>' . $subject['midterm'] . '</td>';
         // Convert midterm score to GPA
        $midtermGPA = convertScoreToGPA($subject['midterm']);
        echo '<td>' . $midtermGPA . '</td>';

        echo '<td>' . $subject['remark'] . '</td>';
    } else {
        echo '<td colspan="2">N/A</td>'; // Span two columns for subject without finals and remark
    }
    
    echo '<td>' . ($subject['facultyname'] ?? 'No Instructor Assigned') . '</td>';
  
    echo '</tr>';
    
    // Add the displayed subject code to the array
    $displayedSubjectCodes[] = $subject['subject_code'];
}


// Calculate the average grade
$totalSubjects = count($subjects);
$totalMidtermGPA = 0;

foreach ($subjects as $subject) {
    if (!empty($subject['midterm'])) {
        $midtermGPA = convertScoreToGPA($subject['midterm']);
        $totalMidtermGPA += $midtermGPA;
    }
}

$totalMidtermScores = $totalSubjects > 0 ? $totalMidtermGPA / $totalSubjects : 0;


                    echo '</tbody>';
                    echo '<tfoot>';
                    echo '<tr>';
                    echo '<td colspan="5"><b>Midterm Score</b></td>';
                    echo '<td>' . $totalMidtermScores . '</td>';
                    echo '<td></td>';
                    echo '</tr>';
                    echo '</tfoot>';
                    echo '</table>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</table>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';

                    } catch (PDOException $e) {
                        echo 'Connection failed: ' . $e->getMessage();
                    }
                    ?>
                    <hr>



                    <!-- DATABASE FOR FINALS SUBJECT -->
                    <?php
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

                        // Output the retrieved subject details

                        echo '  <button type="button" class="btn btn-primary btn-sm mt-2" data-bs-toggle="modal"data-bs-target="#staticBackdrop"style="float:right;">
                                       GPA Comparison Table
                                    </button>';
                        echo '<div class="container-lg mt-4 p-4">';
                        echo '<h2>Finals Grades</h2>';
                        echo '<div class="row justify-content-center">';
                        echo '<div class="col-sm-10 col-md-10 col-lg-10">';
                        echo '<div class="table-responsive my-5">';
                        echo '<table class="table text-uppercase table-hover text-center my-1">';
                        echo '<thead class="text-bg-warning">';
                        echo '<tr class="col-sm">';
                        echo '<th scope="col">Course Code</th>';
                        echo '<th scope="col">Course Title</th>';
                        //echo '<th scope="col">Total Lecture Score (OBA)</th>';
                      //  echo '<th scope="col">Total Laboratory Score (OBA)</th>';
                       echo '<th scope="col">Finals Score</th>';
                        echo '<th scope="col">Finals GPA</th>';
                        echo '<th scope="col">Remarks</th>';
                        echo '<th scope="col">Instructor</th>';
                        
                        echo '</tr>';
                        echo '</thead>';
                        echo '</tbody>';
           

$displayedSubjectCodes = []; // Array to track displayed subject codes

foreach ($subjects as $subject) {
    // Check if the subject code has already been displayed
    if (in_array($subject['subject_code'], $displayedSubjectCodes)) {
        continue; // Skip this iteration if the subject code has been displayed
    }
    
    echo '<tr>';
    echo '<td>' . $subject['subject_code'] . '</td>';
    echo '<td>' . $subject['subject_name'] . '</td>';
   
    if (!empty($subject['finals']) && !empty($subject['remark'])) {
        echo '<td>' . $subject['finals'] . '</td>';
         // Convert finals score to GPA
        $finalGPA = convertScoreToGPA($subject['finals']);
        echo '<td>' .  $finalGPA . '</td>';

        echo '<td>' . $subject['remark'] . '</td>';
    } else {
        echo '<td colspan="2">N/A</td>'; // Span two columns for subject without finals and remark
    }
    
    echo '<td>' . ($subject['facultyname'] ?? 'No Instructor Assigned') . '</td>';
  
    echo '</tr>';
    
    // Add the displayed subject code to the array
    $displayedSubjectCodes[] = $subject['subject_code'];
}
 // Calculate the average grade
$totalSubjects = count($subjects);
$totalFinalGPA = 0;

foreach ($subjects as $subject) {
    if (!empty($subject['finals'])) {
        $finalGPA = convertScoreToGPA($subject['finals']);
        $totalFinalGPA += $finalGPA;
    }
}

$totalFinalsScores = $totalSubjects > 0 ? $totalFinalGPA / $totalSubjects : 0;

                        echo '</tbody>';
                        echo '<tfoot>';
                        echo '<tr>';
                         echo '<td colspan="5"><b>Final Score</b></td>';
                        echo '<td colspan="5">' . $totalFinalsScores . '</td>';
                        echo '<td>';'</td>';
                 
                        
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
                </div>
            </div>
        </div>

        <!-- Overall Grade -->

                    <?php
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

                        // Output the retrieved subject details
                        echo '<a href="grade_preview.php" target="_blank">"<button   style="float: right;" type="button" class="btn btn-primary btn-sm mt-2">
                        <i class="bi bi-download"></i>
                        Download COG
                    </button></a>';
                        echo '<div class="container-lg mt-4 p-4">';
                        echo '<h2>OVERALL GRADES</h2>';
                        echo '<div class="row justify-content-center">';
                        echo '<div class="col-sm-10 col-md-10 col-lg-10">';
                        echo '<div class="table-responsive my-5">';
                        echo '<table class="table text-uppercase table-hover text-center my-1">';
                        echo '<thead class="text-bg-warning">';
                        echo '<tr class="col-sm">';
                        echo '<th scope="col">Course Code</th>';
                        echo '<th scope="col">Course Title</th>';
                        //echo '<th scope="col">Total Lecture Score (OBA)</th>';
                      //  echo '<th scope="col">Total Laboratory Score (OBA)</th>';
                       echo '<th scope="col">Overall GRADES</th>';
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
        echo '<td>' . $overallGPA . '</td>';

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
                </div>
            </div>
        </div>
      
        <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><i
                                                            class="bi bi-pencil-square me-2"></i>GPA COMPARISON TABLE</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-lg">
                                                        <div class="row justify-content-center">
                                                            <div class="col-sm-10 col-lg-10 col-md-10 ">
                                                                <ol style="list-style: none;">
                                                                 <li>   96.7 – 100.0 &nbsp;&rarr;&nbsp;<h5>1.00</h5></li>
                                             <li>   93.4 – 96.6 &nbsp;&rarr;&nbsp;<h5>1.25</h5></li>
                                            <li>    90.1 - 93.30&nbsp;&rarr;&nbsp;<h5> 1.50</h5></li>
                                            <li>    86.7 – 90.0&nbsp;&rarr;&nbsp; <h5>1.75</h5></li>
                                             <li>   83.4 – 86.6&nbsp;&rarr;&nbsp; <h5>2.00</h5></li>
                                             <li>   80.1 – 83.3&nbsp;&rarr;&nbsp; <h5>2.25</h5></li>
                                             <li>   76.7 – 80.0&nbsp;&rarr;&nbsp; <h5>2.50</h5></li>
                                             <li>   73.4 – 76.6&nbsp;&rarr;&nbsp; <h5>2.75</h5></li>
                                                <li>70.00 – 73.3&nbsp;&rarr;&nbsp; <h5>3.00</h5></li>
                                               <li> 50.0-69.9 &nbsp;&rarr;&nbsp;<h5>4.00</h5>
                                               <li> Below 50.0 &nbsp;&rarr;&nbsp;<h5>5.00</h5>
                                               </ol>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><br>
        <!--  Footer -->
        <footer id="footer" style="text-align:center;">
            <div class="container">
                <div class="copyright">
                    &copy; <span><a href="contact.php"><strong>MMC&nbsp;&nbsp;</strong></a></span>All Rights Reserved 2023
                </div>
                <div class="credits">

                </div>
            </div>
        </footer><!-- End  Footer -->


        <div id="preloader"></div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>
    </body>

    </html>
    <?php
} else {
    header("Location: ../user/index.php");
    exit();
}
?>