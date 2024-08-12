<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['accountID'], $_SESSION['img_url'], $_SESSION['fname'], $_SESSION['bdate'], $_SESSION['middlename'], $_SESSION['address'], $_SESSION['cnum'], $_SESSION['lname'], $_SESSION['course'], $_SESSION['gender'])) {


    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=
    , initial-scale=1.0">
        <link rel="stylesheet" href="index3.">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link href="../assets/img/logo.png" rel="icon">
        <title>Upload Grade</title>
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
    </head>

    <body>
        <button class="navbar-toggler position-absolute" type="button" data-bs-toggle="offcanvas"
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
                        id="offcanvasNavbarLabel">
                        <a href="index.php" style="text-decoration: none;">Dashboard</a>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav fs-5 justify-content-start flex-grow-1 ps-1">
                        <li class="nav-item p-2 mt-4">
                            Account ID:
                            <?php echo $_SESSION['accountID']; ?>
                        </li>

                        
                        <li class="nav-item p-2 mt-4">
                            <a class="nav-link" href="grade.php"><span class="material-symbols-outlined float-start p-2">
                                    show_chart
                                </span>Grades</a>
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
        </nav><br><br>
        <div class="container-lg">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-10 col-lg-10">
                    <div class="card-group my-3">
                        <div class="card">
                            <div class="d-flex justify-content-between bg-success">
                                <div class="d-flex justify-content-start">
                                    
                                </div>
                              </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                 
                            <!-- Modal -->
                            <div class="modal fade" id="schedule-modal" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel"><i
                                                    class="bi bi-pencil-square me-2"></i>Upload Grade</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-lg">
                                                <div class="row justify-content-center">
                                                    <div class="col-sm-10 col-lg-10 col-md-10 ">
                                                        <form class="text-dark fs-5 g-3 my-1" action="insert_grade.php"
                                                            enctype="multipart" method="post">
                                                            <div class="col-lg">
                                                                <label for="validationDefault01" class="form-label">Subject
                                                                    Code</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text text-bg-warning"
                                                                        id="inputGroupPrepend2"><i
                                                                            class="bi bi-card-text"></i></span>
                                                                    <input class="form-control" type="text" id="subjectCode"
                                                                        name="subjectCode"
                                                                        placeholder="Enter the Subject Code" required>
                                                                </div>
                                                                <label for="validationDefault01" class="form-label">Student Number </label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text text-bg-warning"
                                                                        id="inputGroupPrepend2"><i
                                                                            class="bi bi-card-text"></i></span>
                                                                    <input class="form-control" type="text" id="accountID"
                                                                        name="student_num"
                                                                        placeholder="Enter the Midterm Grade" required>

                                                                </div>
                                                                
                                                                <label for="validationDefault01"
                                                                    class="form-label">Student Name</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text text-bg-warning"
                                                                        id="inputGroupPrepend2"><i
                                                                            class="bi bi-person-fill"></i></span>
                                                                    <input type="text" class="form-control"
                                                                        id="validationDefault01"
                                                                        placeholder=" Enter First Name" name="full_name" id="validationDefault01" 
                                                                      >
                                                                </div>


                                                                <label for="validationDefault01" class="form-label">MidTerm Grade </label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text text-bg-warning"
                                                                        id="inputGroupPrepend2"><i
                                                                            class="bi bi-card-text"></i></span>
                                                                    <input class="form-control" type="text" id="subjectCode"
                                                                        name="midterm"
                                                                        placeholder="Enter the Midterm Grade" required>

                                                                </div>

                                                                <label for="validationDefault01" class="form-label">Final Grade </label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text text-bg-warning"
                                                                        id="inputGroupPrepend2"><i
                                                                            class="bi bi-card-text"></i></span>
                                                                    <input class="form-control" type="text" id="subjectCode"
                                                                        name="finals"
                                                                        placeholder="Enter the Midterm Grade" required>

                                                                </div>
                                                                <label for="validationDefault01" class="form-label">Remarks </label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text text-bg-warning"
                                                                        id="inputGroupPrepend2"><i
                                                                            class="bi bi-card-text"></i></span>
                                                                    <select name="remark" required>
                                                                        <option value="Passed">Passed</option><option value="Failed">Failed</option><option selected>Remarks</option>
                                                                    </select>

                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
<button type="submit" value="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to submit? This action cannot be undone.');">Upload Grade</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                           
                    <div class="card-group my-3">
                        <div class="card">
                                <i
                                    class="bi bi-person-circle  text-start d-flex justify-content-start text-bg-success  display-3">
                                    <p class="fs-4 mt-3 ms-4 font-monospace"> Students</p>
                                </i>
                            <div class="card-body d-flex justify-content-between flex-column">
                                <h4 class="card-title">List of Students</h4>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Year-Section
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">BSIT 3-2</a></li>
                                        <li><a class="dropdown-item" href="#">BSIT 3-2</a></li>
                                        <li><a class="dropdown-item" href="#">BSIT 3-2</a></li>
                                    </ul>
                                </div>

                                <div class="table-responsive">
                                    <?php
                                    // Database connection parameters
                                    $host = "localhost";
                                    $dbname = "db_enroll";
                                    $username = "root";
                                    $password = "";

                                    // Create PDO connection
                                    try {
                                        $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                                        // Set PDO error mode to exception
                                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    } catch (PDOException $e) {
                                        echo "Connection failed: " . $e->getMessage();
                                        exit;
                                    }
                                    $query = "SELECT student_courses.student_id, students.accountID, students.lname, students.fname, students.middlename, tblschedule.subject_code, student_courses.subject_code, student_courses.action
                          FROM students
                          INNER JOIN student_courses ON student_courses.student_id = students.accountID
                          INNER JOIN tblschedule ON student_courses.subject_code = tblschedule.subject_code
                          WHERE student_courses.subject_code IN (SELECT subject_code FROM tblschedule)
                          AND tblschedule.accountID = :accountID";

                        $stmt = $db->prepare($query);
                        $stmt->bindValue(':accountID', $_SESSION['accountID']);
                        $stmt->execute();


                                    // Fetch the result
                                    $results = $stmt->fetchAll();

                                    // Generate HTML markup
                                    $html = '';
                                    foreach ($results as $row) {
                                        $html .= "<tr>";
                                        $html .= "<td>{$row['accountID']}</td>";
                                        $html .= "<td>{$row['fname']}&nbsp;{$row['middlename']}&nbsp;{$row['lname']}</td>";
                                        $html .= "<td>{$row['subject_code']}</td>";
                                        $html .= '<td> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#schedule-modal" data-accountid="' . $row['accountID'] . '" data-subjectcode="' . $row['subject_code'] . '" data-fname="' . $row['fname'] . '" data-middlename="' . $row['middlename'] . '" data-lname="' . $row['lname'] . '"><i class="bi bi-pencil fs-3"></i></button></td>';



                                        $html .= "</tr>";
                                    }
                                    ?>
                                     <?php if (isset($_GET['msg'])) { ?>
                            <p style="color:red; text-align:center;  "class="error"><?php echo $_GET['msg']; ?></p>
                            <?php } ?>
                                    <table class="table table-hover fs-5 text-center">
                                        <thead>
                                            <tr>
                                                <th>Student no.</th>
                                                <th>Full name</th>
                                                
                                                <th>Subject Code</th>
                                                <th>Upload Grade</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo $html; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted"></small>
                            </div>
                        </div>
                    </div>
                   
                        <script>
                            $(document).ready(function () {
                                $('#myModal').modal('hide'); // Hides the modal by default
                            });
                        </script>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
                            crossorigin="anonymous"></script>

                           <script>
    $(document).ready(function() {
        $('#schedule-modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var accountID = button.data('accountid'); // Extract the data attributes
            var subjectCode = button.data('subjectcode');
            var fname = button.data('fname');
            var middlename = button.data('middlename');
            var lname = button.data('lname');

            // Update the input values in the modal
            $('#validationDefault01').val(fname + ' ' + middlename + ' ' + lname);
            $('#accountID').val(accountID);
            $('#subjectCode').val(subjectCode);
        });
    });
</script>








                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
                            crossorigin="anonymous"></script>
                    </div>
                    <div>
                    <footer id="footer" style="text-align:center;">
                        <div class="container">
                            <div class="copyright">
                                &copy; <span><a href="contact.php"><strong>MMC&nbsp;&nbsp;</strong></a></span>All Rights
                                Reserved
                                2023
                            </div>
                            <div class="credits">

                            </div>
                        </div>
                    </footer><!-- End  Footer --></div>
    </body>

    </html>

<?php
} else {
    header("Location: ../admin/index.php");
    exit();
}
?>