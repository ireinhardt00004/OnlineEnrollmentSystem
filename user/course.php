<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['accountID'], $_SESSION['img_url'], $_SESSION['fname'], $_SESSION['bdate'], $_SESSION['middlename'], $_SESSION['address'], $_SESSION['cnum'], $_SESSION['lname'], $_SESSION['course'], $_SESSION['year'], $_SESSION['gender'], $_SESSION['category'], $_SESSION['semester'])) {


    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="../assets/img/logo.png" rel="icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <title>Courses</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script>
            function updatePage() {
                // Send an AJAX request to fetch updated data
                $.ajax({
                    url: 'fetch_data.php',
                    method: 'GET',
                    success: function (response) {
                        // Update the relevant parts of your HTML page with the new data
                        $('#dataContainer').html(response);
                    }
                });
            }

        </script>

        <script>
            $(document).ready(function () {
                $('#myModal').modal({
                    backdrop: 'static', // Prevents modal from closing on backdrop click
                    keyboard: false // Prevents modal from closing on escape key press
                });

                $('#myModal .close').on('click', function (e) {
                    e.stopPropagation(); // Prevents click event from bubbling up
                    $('#myModal').modal('hide'); // Hides the modal
                });

                $('#myModal form').on('submit', function (e) {
                    e.preventDefault(); // Prevents the form from submitting
                });

                $('#myModal button[type="submit"]').on('click', function (e) {
                    e.stopPropagation(); // Prevents click event from bubbling up
                });
            });
        </script>

        <style type="text/css">
            #action-mode {
                text-align: center;
                align-items: center;
            }

            .subject-table {
                width: 100%;
                /* Adjust the width to your desired value */
                table-layout: fixed;
                font-size: 1em;
            }

            .subject-table th {
                padding: 10px;
            }

            select {
                width: 60%;
                display: block;
                border: 2px solid #ccc;
                padding: 10px;
                margin: 10px auto;
                border-radius: 5px;
                font-size: 1em;
                font-weight: bold !important;
            }

            option {
                font-size: 1.5em;
            }

            #insert-btn {
                float: right;
            }

            input {

                display: block;
                border: 2px solid #ccc;
                width: 60%;
                padding: 10px;
                margin: 10px auto;
                border-radius: 5px;
                font-size: 1.5em;
                font-weight: bold !important;
            }

            option {
                font-size: 1.5em;
            }

            label {
                padding: 10px;
                margin: 10px auto;
                font-weight: bold;
                color: #888;
                font-size: 18px;
                padding: 10px;
            }

            #addModal {
                align-items: center;
                /* Align the modal content to the left */
                justify-content: center;
                /* Align the modal content to the left */
                width: 100%;
                /* Adjust the width to your desired value */
            }

            #modal-centered {
                align-items: center;
                justify-content: center;
                width: 100%;
            }

            .modal-centered {
                align-items: flex-start;
                /* Align the modal content to the left */
                justify-content: flex-start;
                /* Align the modal content to the left */
                width: 1200px;
                /* Adjust the width to your desired value */
            }

            .modal-body-centered {
                float: left;
                flex-grow: 2;
                display: inline-block;
                flex-direction: column;
                justify-content: center;
                width: 70%;
                /* Adjust the width to your desired value */
            }
        </style>


    </head>

    <body>
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
        <div>
            <!-- -->


            <main>
                <br><br><br>
                <div id="action-mode">
                    <h1>Student Course Management</h1> <br>
                    <?php if (isset($_GET['msg'])) { ?>
                            <p style="color:red;  "class="error"><?php echo $_GET['msg']; ?></p>
                            <?php } ?>

                    <button class="btn btn-primary" id="insert-btn" data-toggle="modal" data-target="#myModal"
                        style="float:left;">CHECKLIST SUBJECT</button><br>

                    <button class="btn btn-primary" id="insert-btn" data-toggle="modal" data-target="#addModal">ADD / DROP
                        SUBJECT</button>&nbsp;


                    <!-- Add a modal HTML structure -->
                    <div id="addModal" class="modal modal-centered">
                        <link rel="stylesheet"
                            href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" style="text-align:center;">ADD / DROP Subject</h4><br>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body-centered" id="modal-centered">
                                    <!-- Add your form elements here -->
                                    <div class="container-fluid">
                                        <div class="row justify-content-center">
                                            <div class="col-sm-10 col-md-10 col-lg-10">
                                                <!-- Form inputs -->

                                                <h2><br>Add Course</h2>
                                                <form action="add_process.php" method="post">
                                                    <div class="form-group">
                                                        <label for="subjectdepartment">Department:</label>
                                                        <select class="form-select" style="font-size: .85rem;" name="course"
                                                            required>
                                                            <option class="form-control"
                                                                value="Bachelor of Science in Information Technology">
                                                                Bachelor
                                                                of
                                                                Science in Information Technology</option>
                                                            <option class="form-control"
                                                                value="Bachelor of Science in Hospitality Management">
                                                                Bachelor
                                                                of
                                                                Science in Hospitality Management</option>
                                                            <option class="form-control"
                                                                value="Bachelor of Science in Business Management">
                                                                Bachelor of
                                                                Science in Business Management</option>
                                                            <option class="form-control" selected
                                                                value="<?php echo $_SESSION['course']; ?>"><?php echo $_SESSION['course']; ?></option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="subjectYear">Subject Year:</label>
                                                        <select class="form-select" name="year" required>
                                                            <option class="form-control" value="First">First</option>
                                                            <option class="form-control" value="Second">Second</option>
                                                            <option class="form-control" value="Third">Third</option>
                                                            <option class="form-control" value="Fourth">Fourth</option>
                                                            <option class="form-control" value="MidYear">Mid-Year
                                                            </option>
                                                            <option class="form-control" selected
                                                                value="<?php echo $_SESSION['year']; ?>"><?php echo $_SESSION['year']; ?></option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="subjectSemester">Semester:</label>
                                                        <select class="form-select" name="semester" required>
                                                            <option class="form-control" value="First">First</option>
                                                            <option class="form-control" value="Second">Second</option>
                                                            <option class="form-control" value="MidYear">Mid-Year
                                                            </option>
                                                            <option class="form-control" selected
                                                                value="<?php echo $_SESSION['semester']; ?>"><?php echo $_SESSION['semester']; ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="studentId">Student ID:</label>
                                                        <input type="text" class="form-control" name="studentId"
                                                            id="studentId" value="<?php echo $_SESSION['accountID']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="subjectCode">Subject Code:</label>
                                                        <input type="text" class="form-control" name="courseCode"
                                                            placeholder="Enter subject code">
                                                    </div>
                                                    <label for="subjectName">Subject Name:</label>
                                                    <input type="text" class="form-control" name="subject_name"
                                                        placeholder="Enter subject name">

                                                    <label for="subjectName">Lecture Units:</label>
                                                    <input type="number" class="form-control" name="lecture"
                                                        placeholder="Enter Units">

                                                    <label for="subjectName">Laboratory Units:</label>
                                                    <input type="number" class="form-control" name="lab"
                                                        placeholder="Enter Units">
                                                    <input type="hidden" name="action" value="added">
                                                    <br><button type="submit" class=" btn btn-primary"
                                                        style="float: right; width: 150px;">ADD</button><br>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <br>
                                <div class="container-fluid">
                                    <div class="row justify-content-center">
                                        <div class="col-sm-10 col-md-10 col-lg-10">
                                            <div class="form-group">
                                                <h2>Drop Course</h2>
                                                <form action="drop_process.php" method="post">
                                                    <div class="form-group">
                                                        <label for="courseId">Course Code:</label>
                                                        <input type="text" class="form-control" name="courseCode"
                                                            id="courseId" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="studentId">Student ID:</label>
                                                        <input type="text" class="form-control" name="studentId"
                                                            id="studentId" value="<?php echo $_SESSION['accountID']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="courseId">Course:</label>
                                                        <select class="form-select" style="font-size: .85rem;" name="course"
                                                            required>
                                                            <option class="form-control" selected
                                                                value="Bachelor of Science in Information Technology">
                                                                Bachelor of
                                                                Science in Information Technology</option>
                                                            <option class="form-control"
                                                                value="Bachelor of Science in Hospitality Management">
                                                                Bachelor of
                                                                Science in Hospitality Management</option>
                                                            <option class="form-control"
                                                                value="Bachelor of Science in Business Management">Bachelor
                                                                of Science
                                                                in Business Management</option>
                                                            <option class="form-control" value="">Select Department</option>
                                                        </select>

                                                        <input type="hidden" name="action" value="dropped">
                                                    </div>

                                                    <button type="submit" class=" btn btn-danger"
                                                        style="float: right; width: 150px;">DROP</button><br><br>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- DATABASE FOR SUBJECT -->
                <?php
                define('DBNAME', 'db_enroll');
                define('DBUSER', 'root');
                define('DBPASS', '');
                define('DBHOST', 'localhost');

               function generateRandomColor()
                    {
                        $colors = [/*'primary', 'secondary',*/ 'success', /*'danger', 'warning',  'dark','info'*/];
                        
                        if (isset($_SESSION['color'])) {
                            $color = $_SESSION['color'];
                        } else {
                            $color = $colors[array_rand($colors)];
                            $_SESSION['color'] = $color; // Store the color in the session
                        }
                        
                        return $color;
                    }



                try {
                    $db = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // Retrieve subject details based on course, year, and semester using INNER JOIN
                    $query = "SELECT subject_code, subject_name, lecture, lab, subject_year, subject_semester
          FROM subject
          WHERE subject_department = :course
          AND subject_year = :year
          AND subject_semester = :semester";

                    $stmt = $db->prepare($query);
                    $stmt->bindParam(':course', $_SESSION['course']);
                    $stmt->bindParam(':year', $_SESSION['year']);
                    $stmt->bindParam(':semester', $_SESSION['semester']);
                    $stmt->execute();
                    $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Insert subject details into the student_courses table
                    $tableName = "student_courses";
                    $addedAction = 'added';
                    $droppedAction = 'dropped';
                    $subject_year = $_SESSION['year'];
                    $subject_semester = $_SESSION['semester'];

                    foreach ($subjects as $subject) {
                        $subjectCode = $subject['subject_code'];

                        // Check if the subject has already been dropped
                        $selectDroppedQuery = "SELECT COUNT(*) AS count FROM $tableName WHERE student_id = :studentId AND subject_code = :subjectCode AND action = :droppedAction AND subject_year = :year AND subject_semester = :semester";
                        $selectDroppedStmt = $db->prepare($selectDroppedQuery);
                        $selectDroppedStmt->bindParam(':studentId', $_SESSION['accountID']);
                        $selectDroppedStmt->bindParam(':subjectCode', $subjectCode);
                        $selectDroppedStmt->bindParam(':droppedAction', $droppedAction);
                        $selectDroppedStmt->bindParam(':year', $_SESSION['year']);
                        $selectDroppedStmt->bindParam(':semester', $_SESSION['semester']);
                        $selectDroppedStmt->execute();
                        $droppedRowCount = $selectDroppedStmt->fetchColumn();

                        if ($droppedRowCount == 0) {
                            // Check if the subject already exists for the student with 'added' action
                            $selectAddedQuery = "SELECT COUNT(*) AS count FROM $tableName WHERE student_id = :studentId AND subject_code = :subjectCode AND action = :addedAction AND subject_year = :year AND subject_semester = :semester";
                            $selectAddedStmt = $db->prepare($selectAddedQuery);
                            $selectAddedStmt->bindParam(':studentId', $_SESSION['accountID']);
                            $selectAddedStmt->bindParam(':subjectCode', $subjectCode);
                            $selectAddedStmt->bindParam(':addedAction', $addedAction);
                            $selectAddedStmt->bindParam(':year', $_SESSION['year']);
                            $selectAddedStmt->bindParam(':semester', $_SESSION['semester']);
                            $selectAddedStmt->execute();
                            $addedRowCount = $selectAddedStmt->fetchColumn();

                            if ($addedRowCount == 0) {
                                // Subject not found with 'added' action, insert the row
                                $subjectName = $subject['subject_name'];
                                $lecture = $subject['lecture'];
                                $lab = $subject['lab'];
                                $subject_year = $subject['subject_year'];
                                $subject_semester = $subject['subject_semester'];
                                $insertQuery = "INSERT INTO $tableName (student_id, course, subject_code, subject_name, lecture, lab, enrollment_date, action, subject_year, subject_semester)
                            VALUES (:studentId, :course, :subjectCode, :subjectName, :lecture, :lab, NOW(), :addedAction, :subject_year, :subject_semester)";

                                $insertStmt = $db->prepare($insertQuery);
                                $insertStmt->bindParam(':studentId', $_SESSION['accountID']);
                                $insertStmt->bindParam(':course', $_SESSION['course']);
                                $insertStmt->bindParam(':subjectCode', $subjectCode);
                                $insertStmt->bindParam(':subjectName', $subjectName);
                                $insertStmt->bindParam(':lecture', $lecture);
                                $insertStmt->bindParam(':lab', $lab);
                                $insertStmt->bindParam(':subject_year', $subject_year);
                                $insertStmt->bindParam(':subject_semester', $subject_semester);
                                $insertStmt->bindParam(':addedAction', $addedAction);
                                $insertStmt->execute();

                            }
                        }
                    }
                    // Retrieve the list of subjects' codes and names where subject_year and subject_semester match the session year and semester
                    $sql = "SELECT student_courses.subject_code, student_courses.subject_name, tblschedule.facultyname, tblschedule.schedFrom, tblschedule.schedTo, tblschedule.schedDay, student_courses.lecture, student_courses.lab, student_courses.action
        FROM student_courses
        LEFT JOIN tblschedule ON tblschedule.subject_code = student_courses.subject_code
        WHERE student_courses.course = :course
        AND student_courses.subject_year = :year
        AND student_courses.subject_semester = :semester";

                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':course', $_SESSION['course']);
                    $stmt->bindParam(':year', $_SESSION['year']);
                    $stmt->bindParam(':semester', $_SESSION['semester']);
                    $stmt->execute();
                    // Display any errors
                    if ($stmt->errorCode() !== '00000') {
                        $errorInfo = $stmt->errorInfo();
                        echo "Error executing query: " . $errorInfo[2];
                    }
                    // Display the subjects and their details
                    echo "<h1>COURSES</h1><br><br>";
                    $addedSubjects = [];
                    $updatedSubjects = [];
                    $droppedSubjects = [];

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        // Retrieve the column values from the result set
                        $subjectCode = $row['subject_code'];
                        $subjectName = $row['subject_name'];
                        $facultyName = $row['facultyname'] ?? ''; // Use 'N/A' as the default value if facultyname is null or empty
                        $schedFrom = $row['schedFrom'] ?? '';
                        $schedTo = $row['schedTo'] ?? '';
                        $schedDay = $row['schedDay'] ?? '';
                        $lecture = $row['lecture'];
                        $lab = $row['lab'];
                        $action = $row['action'];

                        // Determine the action and add the subject to the respective array
                        if ($action === 'added') {
                            $addedSubjects[$subjectCode] = [
                                'subjectName' => $subjectName,
                                'facultyName' => $facultyName,
                                'schedFrom' => $schedFrom,
                                'schedTo' => $schedTo,
                                'schedDay' => $schedDay,
                                'lecture' => $lecture,
                                'lab' => $lab,
                            ];
                        } elseif ($action === 'update') {
                            $updatedSubjects[$subjectCode] = [
                                'subjectName' => $subjectName,
                                'facultyName' => $facultyName,
                                'schedFrom' => $schedFrom,
                                'schedTo' => $schedTo,
                                'schedDay' => $schedDay,
                                'lecture' => $lecture,
                                'lab' => $lab,
                            ];
                        } elseif ($action === 'dropped') {
                            $droppedSubjects[$subjectCode] = [
                                'subjectName' => $subjectName,
                                'facultyName' => $facultyName,
                                'schedFrom' => $schedFrom,
                                'schedTo' => $schedTo,
                                'schedDay' => $schedDay,
                                'lecture' => $lecture,
                                'lab' => $lab,
                            ];
                        }
                    }

                    // Retrieve the total number of Subject credit
                    $query = "SELECT SUM(lecture)+SUM(lab) AS total FROM student_courses WHERE action  IN ('added','update') AND course = :course AND student_id = :student_id";
                    $stmt = $db->prepare($query);
                    $stmt->bindParam(':course', $_SESSION['course']);
                    $stmt->bindParam(':student_id', $_SESSION['accountID']);
                    $stmt->execute();

                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $totalLecture = $row['total'];
                    // Display added subjects
                    if (!empty($addedSubjects)) {
                        echo "<h2>Enrolled Subjects =&nbsp;$totalLecture&nbsp;Units</h2>";
                        foreach ($addedSubjects as $subjectCode => $subjectDetails) {
                            $subjectName = $subjectDetails['subjectName'];
                            $facultyName = $subjectDetails['facultyName'];
                            $schedFrom = $subjectDetails['schedFrom'];
                            $schedTo = $subjectDetails['schedTo'];
                            $schedDay = $subjectDetails['schedDay'];
                            $lecture = $subjectDetails['lecture'];
                            $lab = $subjectDetails['lab'];

                            echo "<div class='accordion-item mt-4'>
                <h2 class='accordion-header'>
                    <button class='accordion-button mt-2 p-4 text-bg-" . generateRandomColor() . " fs-2' type='button'
                        data-bs-toggle='collapse' data-bs-target='#flush-collapse" . $subjectCode . "'
                        aria-expanded='false'
                        aria-controls='flush-collapse" . $subjectCode . "'>"
                                . $subjectCode . " - " . $subjectName . "</button>
                </h2>
                <div id='flush-collapse" . $subjectCode . "'
                    class='accordion-collapse collapse' data-bs-parent='#accordionFlushExample'>
                    <div class='accordion-body fs-5'>";

                            // Display instructor and schedule if available
                            if (!empty($facultyName)) {
                                echo "<p>Instructor: $facultyName</p>";
                            } else {
                                echo "<p>Instructor: TBA</p>";
                            }
                            if (!empty($schedFrom) && !empty($schedTo) && !empty($schedDay)) {
                                echo "<p>Schedule: $schedDay, $schedFrom - $schedTo</p><br>
            <p>Lecture Units: $lecture</p><br>
            <p>Laboratory Units: $lab</p><br>
           <p><button class='btn btn-primary' onclick='showAlert()'>Enter</button></p>";


                            } else {
                                echo "<p>Schedule: TBA</p><br>
            <p>Lecture Units: $lecture</p><br>
            <p>Laboratory Units: $lab</p><br>
            <p><button class='btn btn-primary' onclick='showAlert()'>Enter</button></p>";

                            }

                            echo "</div>
                </div>
            </div>";
                        }
                    }



                    // Retrieve the total number of Subject BM
                    $query = "SELECT SUM(lecture)+SUM(lab) AS total FROM student_courses WHERE action = 'update' AND course = :course";
                    $stmt = $db->prepare($query);
                    $stmt->bindParam(':course', $_SESSION['course']);
                    $stmt->execute();

                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $totalLecture = $row['total'];

                    // Display updated subjects
                    if (!empty($updatedSubjects)) {
                        echo "<hr><br><h2>Added Subjects=&nbsp;$totalLecture&nbsp;Units</h2>";
                        foreach ($updatedSubjects as $subjectCode => $subjectDetails) {
                            $subjectName = $subjectDetails['subjectName'];
                            $facultyName = $subjectDetails['facultyName'];
                            $schedFrom = $subjectDetails['schedFrom'];
                            $schedTo = $subjectDetails['schedTo'];
                            $schedDay = $subjectDetails['schedDay'];
                            $lecture = $subjectDetails['lecture'];
                            $lab = $subjectDetails['lab'];

                            echo "<div class='accordion-item mt-4'>
                <h2 class='accordion-header'>
                    <button class='accordion-button mt-2 p-4 text-bg-" . generateRandomColor() . " fs-2' type='button'
                        data-bs-toggle='collapse' data-bs-target='#flush-collapse" . $subjectCode . "'
                        aria-expanded='false'
                        aria-controls='flush-collapse" . $subjectCode . "'>"
                                . $subjectCode . " - " . $subjectName .
                                "</button>
                </h2>
                <div id='flush-collapse" . $subjectCode . "'
                    class='accordion-collapse collapse' data-bs-parent='#accordionFlushExample'>
                    <div class='accordion-body fs-5'>";

                            // Display instructor and schedule if available
                            if (!empty($facultyName)) {
                                echo "<p>Instructor: $facultyName</p>";
                            } else {
                                echo "<p>Instructor: TBA</p>";
                            }
                            if (!empty($schedFrom) && !empty($schedTo) && !empty($schedDay)) {
                                echo "<p>Schedule: $schedDay, $schedFrom - $schedTo</p><br>
            <p>Lecture Units: $lecture</p><br>
            <p>Laboratory Units: $lab</p><br>
            <p><button class='btn btn-primary' onclick='showAlert()'>Enter</button></p>";
                            } else {
                                echo "<p>Schedule: TBA</p><br>
            <p>Lecture Units: $lecture</p><br>
            <p>Laboratory Units: $lab</p><br>
            <p><button class='btn btn-primary' onclick='showAlert()'>Enter</button></p>";
                            }

                            echo "</div>
                </div>
            </div>";
                        }
                    }
/*
                    // Retrieve the total number of Subject BM
                    $query = "SELECT SUM(lecture)+SUM(lab) AS total FROM student_courses WHERE action = 'dropped'AND course = :course";
                    $stmt = $db->prepare($query);
                    $stmt->bindParam(':course', $_SESSION['course']);
                    $stmt->execute();

                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $totalLecture = $row['total'];
                    // Display dropped subjects
                    if (!empty($droppedSubjects)) {
                        echo "<hr><br><h2>Dropped Subjects=&nbsp;$totalLecture&nbsp;Units</h2>";
                        foreach ($droppedSubjects as $subjectCode => $subjectDetails) {
                            $subjectName = $subjectDetails['subjectName'];
                            $facultyName = $subjectDetails['facultyName'];
                            $schedFrom = $subjectDetails['schedFrom'];
                            $schedTo = $subjectDetails['schedTo'];
                            $schedDay = $subjectDetails['schedDay'];
                            $lecture = $subjectDetails['lecture'];
                            $lab = $subjectDetails['lab'];

                            echo "<div class='accordion-item mt-4'>
                <h2 class='accordion-header'>
                    <button class='accordion-button mt-2 p-4 text-bg-" . generateRandomColor() . " fs-2' type='button'
                        data-bs-toggle='collapse' data-bs-target='#flush-collapse" . $subjectCode . "'
                        aria-expanded='false'
                        aria-controls='flush-collapse" . $subjectCode . "'>"
                                . $subjectCode . " - " . $subjectName .
                                "</button>
                </h2>
                <div id='flush-collapse" . $subjectCode . "'
                    class='accordion-collapse collapse' data-bs-parent='#accordionFlushExample'>
                    <div class='accordion-body fs-5'>";

                            // Display instructor and schedule if available
                            if (!empty($facultyName)) {
                                echo "<p>Instructor: $facultyName</p>";
                            } else {
                                echo "<p>Instructor: TBA</p>";
                            }
                            if (!empty($schedFrom) && !empty($schedTo) && !empty($schedDay)) {
                                echo "<p>Schedule: $schedDay, $schedFrom - $schedTo</p><br>
            <p>Lecture Units: $lecture</p><br>
            <p>Laboratory Units: $lab</p>";
                            } else {
                                echo "<p>Schedule: TBA</p><br>
            <p>Lecture Units: $lecture</p><br>
            <p>Laboratory Units: $lab</p>";
                            }

                            echo "</div>
                </div>
            </div>";
                        }
                    }*/

                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>

            </main>
            <script>
                var accordions = document.querySelectorAll('.accordion-item');

                accordions.forEach(function (accordion) {
                    var button = accordion.querySelector('.accordion-button');
                    var collapse = accordion.querySelector('.accordion-collapse');

                    button.addEventListener('click', function () {
                        var expanded = button.getAttribute('aria-expanded') === 'true';

                        button.setAttribute('aria-expanded', !expanded);
                        collapse.classList.toggle('show');
                    });
                });
            </script>
            <script>
                function showAlert() {
                    alert('To be soon');
                }
            </script>

            <script>
                $(document).ready(function () {
                    $('#myModal').modal({
                        backdrop: 'static', // Prevents modal from closing on backdrop click
                        keyboard: false // Prevents modal from closing on escape key press
                    });

                    $('#myModal .close').on('click', function (e) {
                        e.stopPropagation(); // Prevents click event from bubbling up
                        $('#myModal').modal('hide'); // Hides the modal
                    });

                    $('#myModal form').on('submit', function (e) {
                        e.preventDefault(); // Prevents the form from submitting

                        // Add your search functionality here

                        // Optionally, you can close the modal after the search is performed
                        // $('#myModal').modal('hide');
                    });
                });
            </script>


            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
                crossorigin="anonymous"></script>


            <?php

            function generateSubjectTable($db, $searchTerm = null)
            {
                $query = "SELECT * FROM subject";

                if ($searchTerm) {
                    $query .= " WHERE subject_code = '$searchTerm' OR subject_name = '$searchTerm'";
                }

                $result = $db->query($query);
                $html = '';

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $html .= "<tr>";
                    $html .= "<td>{$row['subject_id']}</td>";
                    $html .= "<td>{$row['subject_code']}</td>";
                    $html .= "<td>{$row['subject_name']}</td>";
                    $html .= "<td>{$row['subject_description']}</td>";
                    $html .= "<td>{$row['subject_department']}</td>";
                    $html .= "<td>{$row['subject_year']}</td>";
                    $html .= "<td>{$row['subject_semester']}</td>";
                    $html .= "<td>{$row['lecture']}</td>";
                    $html .= "<td>{$row['lab']}</td>";
                    $html .= "</tr>";
                }

                return $html;
            }

            // Retrieve the total number of subjects
            $query = "SELECT COUNT(*) AS total FROM subject";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $totalALL = $row['total'];

            // Check if search term is provided
            $searchTerm = isset($_GET['search']) ? $_GET['search'] : null;

            // Generate subject table based on search term
            $tableHTML = '';
            if ($searchTerm) {
                $tableHTML = generateSubjectTable($db, $searchTerm);
            } else {
                $tableHTML = generateSubjectTable($db);
            }

            ?>

            <!-- Modal Body -->
            <div id="myModal" class="modal modal-centered" data-backdrop="static" data-keyboard="false">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                <div class="modal-dialog modal-dialog-centered" data-backdrop="static" data-keyboard="false"
                    style="max-width: 1200px;">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">LIST OF SUBJECTS</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body" data-backdrop="static" data-keyboard="false">
                            <div class="container-fluid">
                                <div class="row justify-content-center">
                                    <div class="col-sm-10">
                                        <div class="d-flex flex-column">
                                            <form method="GET">
                                                <label class="fs-4">Search</label>
                                                <div class="input-group mb-3">
                                                    <input class="form-control" style="height: 45px;" type="text" name="search">
                                                    <button class="btn btn-primary btn-sm input-group-text" 
                                                        type="submit"><i class="bi bi-search"></i></button>
                                                </div>
                                            </form>
                                        </div>

                                        <?php if ($searchTerm): ?>
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Subject Code</th>
                                                            <th scope="col">Subject Name</th>
                                                            <th scope="col">Description</th>
                                                            <th scope="col">Department</th>
                                                            <th scope="col">Year</th>
                                                            <th scope="col">Semester</th>
                                                            <th scope="col">Lecture</th>
                                                            <th scope="col">Laboratory</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php echo $tableHTML; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php else: ?>
                                            <h4 class="my-4" style="text-align:center;">&nbsp;&nbsp;Total Number=&nbsp;
                                                <?php echo $totalALL; ?>
                                            </h4>
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Subject Code</th>
                                                            <th scope="col">Subject Name</th>
                                                            <th scope="col">Description</th>
                                                            <th scope="col">Department</th>
                                                            <th scope="col">Year</th>
                                                            <th scope="col">Semester</th>
                                                            <th scope="col">Lecture</th>
                                                            <th scope="col">Laboratory</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php echo $tableHTML; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--  Footer -->
            <footer id="footer" style="text-align:center;">
                <div class="container">
                    <div class="copyright">
                        &copy; <span><a href="contact.php"><strong>MMC&nbsp;&nbsp;</strong></a></span>All Rights Reserved
                        2023
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