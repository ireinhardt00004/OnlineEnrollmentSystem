<?php

include "../db_conn.php";

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
        <title>Teacher Dashboard</title>
        
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
                                    <img src="../uploads/<?php echo $_SESSION['img_url']; ?>" class="img-fluid ms-1 p-1"
                                        style="width: 80px; height: 80px; border-radius: 40%;" alt="...">
                                    <p class="fs-2 mt-3 ms-1 text-white font-monospace">
                                        <?php echo $_SESSION['fname']; ?>&nbsp;
                                        <?php echo $_SESSION['middlename']; ?>&nbsp;
                                        <?php echo $_SESSION['lname']; ?>
                                    </p>
                                </div>
                                <div class="float-end mt-2 me-1">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">
                                        <i class="bi bi-pencil-square fs-3"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><i
                                                            class="bi bi-pencil-square me-2"></i>Edit Information</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-lg">
                                                        <div class="row justify-content-center">
                                                            <div class="col-sm-10 col-lg-10 col-md-10 ">
                                                                <form class="text-dark fs-5 g-3 my-1" action="../admin/personal_info.php" method="post" enctype="multipart/form-data">
                                                                    <div class="col-lg">
                                                                        <label for="validationDefault01"
                                                                            class="form-label">Picture</label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-text text-bg-warning"
                                                                                id="inputGroupPrepend2"><i
                                                                                    class="bi bi-card-image"></i></span>
                                                                            <input class="form-control" type="file" name="my_image" 
                                                                                id="formFile" >
                                                                        </div>
                                                                        <label for="validationDefault01"
                                                                            class="form-label">First name</label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-text text-bg-warning"
                                                                                id="inputGroupPrepend2"><i
                                                                                    class="bi bi-person-fill"></i></span>
                                                                            <input type="text" class="form-control" name="fname"
                                                                                id="validationDefault01"
                                                                                placeholder="First Name" value=" <?php echo $_SESSION['fname']; ?>">
                                                                        </div>
                                                                        <div class="mt-3">
                                                                            <label for="validationDefault02"
                                                                                class="form-label">Last name</label>
                                                                            <input type="text" class="form-control" name="lname" 
                                                                                id="validationDefault02"
                                                                                placeholder="Last Name" value=" <?php echo $_SESSION['lname']; ?>">
                                                                        </div>
                                                                        <div class="mt-3">
                                                                            <label for="validationDefault06"
                                                                                class="form-label">Middle Name</label>
                                                                            <input type="text" class="form-control" name="middlename" 
                                                                                id="validationDefault06"
                                                                                placeholder="Middle Name" value=" <?php echo $_SESSION['middlename']; ?>">
                                                                        </div>
                                                                        <div class="mt-3">
                                                                            
                                                                        </div>
                                                                        <div class="mt-3">
                                                                            <label for="validationDefault04"
                                                                                class="form-label">Gender</label>
                                                                            <div class="input-group">
                                                                                <span
                                                                                    class="input-group-text text-bg-warning"
                                                                                    id="inputGroupPrepend2"><i
                                                                                        class="bi bi-gender-ambiguous"></i></span>
                                                                                <select class="form-select"
                                                                                    id="validationDefault04"
                                                                                    aria-label="Default select example" name="gender" value=" <?php echo $_SESSION['gender']; ?>">
                                                                                    <option  value="N/A">Prefer not to say
                                                                                    </option>
                                                                                    <option value="Male">Male</option>
                                                                                    <option value="Female">
                                                                                    Female</option>
                                                                                    <option selected value="<?php echo $_SESSION['gender']; ?>"><?php echo $_SESSION['gender']; ?>
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mt-3">
                                                                            <label for="validationDefault03"
                                                                                class="form-label">Address</label>
                                                                            <div class="input-group">
                                                                                <span
                                                                                    class="input-group-text text-bg-warning"
                                                                                    id="inputGroupPrepend2"><i
                                                                                        class="bi bi-house-fill"></i></span>
                                                                                <input type="text" class="form-control" name="address" value="<?php echo $_SESSION['address']; ?>" 
                                                                                    id="validationDefault03"
                                                                                    placeholder="Address" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="mt-3">
                                                                            <label for="validationDefaultcont"
                                                                                class="form-label">Contact No.</label>
                                                                            <div class="input-group">
                                                                                <span
                                                                                    class="input-group-text text-bg-warning"
                                                                                    id="inputGroupPrepend2"><i
                                                                                        class="bi bi-telephone-fill"></i></span>
                                                                                <input type="tel" maxlength="11"
                                                                                    class="form-control"
                                                                                    id="validationDefaultcont"
                                                                                    aria-describedby="inputGroupPrepend2" name="cnum" 
                                                                                    value="<?php echo $_SESSION['cnum']; ?>" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="mt-4">
                                                                            <label for="validationDefaultdate"
                                                                                class="form-label">Birthdate.</label>
                                                                            <div class="input-group">
                                                                                <span
                                                                                    class="input-group-text text-bg-warning"
                                                                                    id="inputGroupPrepend2"><i
                                                                                        class="bi bi-calendar-fill"></i></span>
                                                                                <input type="date"name="bdate" class="form-control" value="<?php echo $_SESSION['bdate']; ?>" 
                                                                                    id="validationDefaultdate"
                                                                                    aria-describedby="inputGroupPrepend2"
                                                                                   >
                                                                            </div>
                                                                        </div>
                                                                        <div class=" mt-5">
                                                                            <div class="form-check">
                                                                    
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-body d-flex justify-content-between flex-column">
                                <h4 class="card-title">Information:</h4>
                            <?php if (isset($_GET['message'])) { ?>
                            <p style="color:red; text-align:center;  "class="error"><?php echo $_GET['message']; ?></p>
                            
                            <?php } ?>
                                <div class="table-responsive">
                                    <table class="table table-hover fs-5  text-center">
                                        <tbody>
                                            <tr>
                                                <td><i class="bi bi-house-fill me-3"></i> Address</td>
                                                <td>
                                                    <?php echo $_SESSION['address']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><i class="bi bi-telephone-fill me-3"></i> Contact No.</td>
                                                <td>
                                                    <?php echo $_SESSION['cnum']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><i class="bi bi-mortarboard-fill me-3"></i>Department</td>
                                                <td>
                                                    <?php echo $_SESSION['course']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><i class="bi bi-envelope-at-fill me-3"></i>Email</td>
                                                <td>
                                                    <?php echo $_SESSION['email']; ?>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                           <td><i class="bi bi-calendar3-fill me-3"></i>Year</td>
                                            <td>First</td>
                                        </tr>-->
                                            <tr>
                                                <td><i class="bi bi-calendar2-heart me-3"></i></i>Birthdate</td>
                                                <td>
                                                    <?php echo $_SESSION['bdate']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><i class="bi bi-gender-ambiguous me-3"></i></i>Gender</td>
                                                <td>
                                                    <?php echo $_SESSION['gender']; ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted"></small>
                            </div>
                        </div>
                    </div>
                    
                    <div> <button class="btn btn-primary" id="insert-btn" data-toggle="modal" data-target="#myModal"
                            style="float:right;">CHECKLIST SUBJECT</button><br></div>
                    <div class="card-group my-3">
                        <div class="card">
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

                            // Query to get the student count per subject
                            $query = "SELECT tblschedule.subject_code, COUNT(DISTINCT students.accountID) AS student_count
                            FROM tblschedule
                            LEFT JOIN student_courses ON student_courses.subject_code = tblschedule.subject_code
                            LEFT JOIN students ON student_courses.student_id = students.accountID
                            WHERE tblschedule.accountID = :accountID
                            GROUP BY tblschedule.subject_code";


                            $stmt = $db->prepare($query);
                            $stmt->bindParam(':accountID', $_SESSION['accountID'], PDO::PARAM_STR);
                            $stmt->execute();

                            // Fetch the result
                            $results = $stmt->fetchAll();

                            // Generate HTML markup
                            $html = '';
                            foreach ($results as $row) {
                                $html .= "<tr>";
                                $html .= "<td>{$row['subject_code']}</td>";
                                $html .= "<td>{$row['student_count']}</td>";
                                $html .= "</tr>";
                            }
                            ?>
                            <i
                                class="bi bi-person-circle  text-start d-flex justify-content-start text-bg-success display-3">
                                <p class="fs-4 mt-3 ms-4 font-monospace"> Enrollment Statistics</p>
                            </i>
                            <div class="card-body text-center mt-4">
                                <h2 class="card-title">Students Enrolled in the Class</h2>
                                <table class="table" style="table-layout: fixed;">
                                    <thead>
                                        <tr>
                                            <th>Subject Code</th>
                                            <th>Student Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo $html; ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="card-footer">
                                <small class="text-muted"></small>
                            </div>
                        </div>

                        <div class="card">
                            <i
                                class="bi bi-calendar-date-fill text-bg-success text-start d-flex justify-content-start display-3">
                                <p class="fs-4 mt-3 ms-4 font-monospace"> Class Schedule </p>
                            </i><button  style="font-size: 4px !important;"type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#schedule-modal">
                                <i class="bi bi-pencil-square fs-3">&nbsp;Insert</i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="schedule-modal" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel"><i
                                                    class="bi bi-pencil-square me-2"></i>Edit Schedule</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-lg">
                                                <div class="row justify-content-center">
                                                    <div class="col-sm-10 col-lg-10 col-md-10 ">
                                                        <form class="text-dark fs-5 g-3 my-1" action="insert_sched.php"
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
                                                                <label for="validationDefault01"
                                                                    class="form-label">Teacher's Name</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text text-bg-warning"
                                                                        id="inputGroupPrepend2"><i
                                                                            class="bi bi-person-fill"></i></span>
                                                                    <input type="text" class="form-control"
                                                                        id="validationDefault01"
                                                                        placeholder=" Enter First Name" name="facultyname"
                                                                        value="<?php echo $_SESSION['fname']; ?>&nbsp;<?php echo $_SESSION['middlename']; ?>&nbsp;<?php echo $_SESSION['lname']; ?>">
                                                                </div>


                                                                <div class="mt-3">
                                                                    <label for="validationDefaultemail"
                                                                        class="form-label">Schedule From</label>
                                                                    <div class="input-group">

                                                                        <input type="text" class="form-control"
                                                                            id="validationDefaultemail"
                                                                            aria-describedby="inputGroupPrepend2"
                                                                            placeholder="Enter Schedule From-"
                                                                            name="schedFrom" required>
                                                                    </div>
                                                                </div>

                                                                <div class="mt-3">
                                                                    <label for="validationDefaultemail"
                                                                        class="form-label">Schedule To</label>
                                                                    <div class="input-group">

                                                                        <input type="text" class="form-control"
                                                                            id="validationDefaultemail"
                                                                            aria-describedby="inputGroupPrepend2"
                                                                            placeholder="Enter Schedule To-" name="schedTo"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="accountID"
                                                                    value="<?php echo $_SESSION['accountID']; ?>">
                                                                <div class="mt-3">
                                                                    <label for="validationDefaultemail"
                                                                        class="form-label">Schedule Day </label>
                                                                    <div class="input-group">

                                                                        <input type="text" class="form-control"
                                                                            id="validationDefaultemail"
                                                                            aria-describedby="inputGroupPrepend2"
                                                                            placeholder="(Enter the day)" name="schedDay"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-3">
                                                                    <label for="validationDefaultcont"
                                                                        class="form-label">Contact No.</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text text-bg-warning"
                                                                            id="inputGroupPrepend2"><i
                                                                                class="bi bi-telephone-fill"></i></span>
                                                                        <input type="tel" maxlength="11"
                                                                            class="form-control" id="validationDefaultcont"
                                                                            name="cnum"
                                                                            aria-describedby="inputGroupPrepend2"
                                                                            value="<?php echo $_SESSION['cnum']; ?>"
                                                                            placeholder="09xxxxxxxxx." required>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-4">

                                                                    <label for="validationDefaultdate"
                                                                        class="form-label">Department</label>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text text-bg-warning"
                                                                                id="inputGroupPrepend2"><i
                                                                                    class="bi bi-journal"></i></span>
                                                                                <select class="form-select" name="course"
                                                                                    required>
                                                                                    <option class="form-control" selected
                                                                                        value="Bachelor of Science in Information Technology">
                                                                                        Information Technology</option>
                                                                                    <option class="form-control"
                                                                                        value="Bachelor of Science in Hospitality Management">
                                                                                        Hospitality Management</option>
                                                                                    <option class="form-control"
                                                                                        value="Bachelor of Science in Business Management">
                                                                                        Business Management</option>
                                                                                    <option class="form-control"
                                                                                        value="General Education">General
                                                                                        Education</option>
                                                                                    <option class="form-control" value="">Select
                                                                                        Department</option>
                                                                                </select>
                                                                        </div>
                                                                </div>
    

                                                            
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" value="submit" class="btn btn-primary">Save
                                                Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover fs-5  text-center">
                                        <?php if (isset($_GET['msg'])) { ?>
                            <p style="color:red;  "class="error"><?php echo $_GET['msg']; ?></p>
                            <?php } ?>
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
                                        /// Prepare the statement
                                        $query = "SELECT * FROM tblschedule WHERE accountID = :accountID";
                                        $stmt = $db->prepare($query);

                                        // Bind the parameter
                                        $stmt->bindParam(':accountID', $_SESSION['accountID'], PDO::PARAM_STR);

                                        $stmt->execute();

                                        
                                        $results = $stmt->fetchAll();

                                        // Generate HTML markup
                                        $html = '';
                                        foreach ($results as $row) {
                                            $html .= "<tr>";
                                            $html .= "<td>{$row['subject_code']}</td>";
                                            $html .= "<td>{$row['schedFrom']}</td>";
                                            $html .= "<td>{$row['schedTo']}</td>";
                                           $html .= "<td><a href='deleteSched.php?schedID={$row['schedID']}' class='btn btn-danger' onclick='return confirmDelete()'>Delete</a></td>";


                                            $html .= "</tr>";
                                        }
                                        ?>


                                        <thead>
                                            <tr>

                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                                <th scope="col">Action</th>
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
                                    $query = "SELECT student_courses.student_id, students.accountID, students.lname, students.fname, tblschedule.subject_code, student_courses.subject_code, student_courses.action
FROM students
INNER JOIN student_courses ON student_courses.student_id = students.accountID
INNER JOIN tblschedule ON student_courses.subject_code = tblschedule.subject_code
WHERE student_courses.subject_code IN (SELECT subject_code FROM tblschedule)
  AND tblschedule.accountID = :accountID";

$stmt = $db->prepare($query);
$stmt->bindValue(':accountID', $_SESSION['accountID']);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Generate HTML markup
$html = '';
foreach ($results as $row) {
    $html .= "<tr>";
    $html .= "<td>{$row['accountID']}</td>";
    $html .= "<td>{$row['lname']}</td>";
    $html .= "<td>{$row['fname']}</td>";
    $html .= "<td>{$row['subject_code']}</td>";
    $html .= "</tr>";
}
?>
                                    <table class="table table-hover fs-5 text-center">
                                        <thead>
                                            <tr>
                                                <th>Student no.</th>
                                                <th>Last Name</th>
                                                <th>First Name</th>
                                                <th>Subject Code</th>
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
                    <div class="card-group my-3">
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
                        /// Prepare the statement
                        $query = "SELECT * FROM tblschedule WHERE accountID = :accountID";
                        $stmt = $db->prepare($query);

                        // Bind the parameter
                        $stmt->bindParam(':accountID', $_SESSION['accountID'], PDO::PARAM_STR);

                        // Execute the statement
                        $stmt->execute();

                        $results = $stmt->fetchAll();
                        $html = '';

                        // Function to generate a card using the provided row data
                        function generateCard($row)
                        {
                            $cardHtml = "<div class='card'>";
                            $cardHtml .= "<div class='bg-warning'>";
                            $cardHtml .= "<img src='https://images.pexels.com/photos/1188751/pexels-photo-1188751.jpeg?auto=compress&cs=tinysrgb&w=600' class='img-fluid card-img-top' style='height: 100px;' alt='...'>";
                            $cardHtml .= "</div>";
                            $cardHtml .= "<div class='card-body'>";

                            // Check if subject code is empty, display "TBA" if empty
                            $subjectCode = !empty($row['subject_code']) ? $row['subject_code'] : "TBA";
                            $schedDay = !empty($row['schedDay']) ? $row['schedDay'] : "TBA";
                            $schedFrom = !empty($row['schedFrom']) ? $row['schedFrom'] : "TBA";
                            $schedTo = !empty($row['schedTo']) ? $row['schedTo'] : "TBA";

                            $cardHtml .= "<h5 class='card-title'>" . $subjectCode . "</h5>";
                            $cardHtml .= "<p class='card-text'>" . $schedDay . "<br>" . $schedFrom . "&nbsp;-&nbsp;" . $schedTo . "</p>";
                            $cardHtml .= "<p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>";
                            $cardHtml .= "</div>";
                            $cardHtml .= "<a href='#' class='btn btn-primary'>Enter</a>";
                            $cardHtml .= "</div>";

                            return $cardHtml;
                        }

                        // Function to generate a placeholder card
                        function generatePlaceholderCard()
                        {
                            $cardHtml = "<div class='card'>";
                            $cardHtml .= "<div class='bg-warning'>";
                            $cardHtml .= "<img src='https://images.pexels.com/photos/1188751/pexels-photo-1188751.jpeg?auto=compress&cs=tinysrgb&w=600' class='img-fluid card-img-top' style='height: 100px;' alt='...'>";
                            $cardHtml .= "</div>";
                            $cardHtml .= "<div class='card-body'>";
                            $cardHtml .= "<h5 class='card-title'>N/A</h5>";
                            $cardHtml .= "<p class='card-text'>N/A</p>";
                            $cardHtml .= "<p class='card-text'><small class='text-muted'>N/A</small></p>";
                            $cardHtml .= "</div>";
                            $cardHtml .= "<a href='#' class='btn btn-primary'>Enter</a>";
                            $cardHtml .= "</div>";

                            return $cardHtml;
                        }
                        if (!empty($results)) {
                            $html = "<div class='card'>";
                            $html .= "<div class='bi bi bi-house-door text-start d-flex justify-content-start text-bg-success display-3'>";
                            $html .= "<p class='fs-4 mt-3 ms-4 font-monospace'>Classroom</p>";
                            $html .= "</div>";
                            $html .= "<div class='card-group'>";

                            // Generate cards for the top row
                            $count = 0;
                            $topRowResults = array_slice($results, 0, 4); // Get the first 4 rows for the top row
                            foreach ($topRowResults as $row) {
                                $html .= generateCard($row);
                                $count++;
                            }

                            $html .= "</div>"; // Close the card-group div for the top row
                    
                            $html .= "<div class='card-group'>";

                            // Generate cards for the bottom row
                            $bottomRowResults = array_slice($results, 4); // Get the remaining rows for the bottom row
                            foreach ($bottomRowResults as $row) {
                                $html .= generateCard($row);
                            }

                            // Generate additional cards if needed to fill up the bottom row
                            $additionalCardCount = 4 - count($bottomRowResults); // Adjust the count to the desired number of additional cards
                            for ($i = 0; $i < $additionalCardCount; $i++) {
                                $html .= generatePlaceholderCard();
                            }

                            $html .= "</div>"; // Close the card-group div for the bottom row
                            $html .= "</div>"; // Close the main card div
                        }

                        echo $html;

                        ?>

                        <script>
                            $(document).ready(function () {
                                $('#myModal').modal('hide'); // Hides the modal by default
                            });
                        </script>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
                            crossorigin="anonymous"></script>

                        <?php // Database connection parameters
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
                            } ?>
                        <!-- Modal Body -->
                        <!-- Add a modal HTML structure -->
                        <div id="myModal" class="modal modal-centered">
                            <link rel="stylesheet"
                                href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                            <div class="modal-dialog modal-dialog-centered" style="max-width: 1200px;">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header text-bg-warning">
                                        <h4 class="modal-title">LIST OF SUBJECTS</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal Body -->
                                    <div class="modal-body-centered">
                                        <div class="container-lg">
                                            <div class="row justify-content-center">
                                                <div class="col-sm-10 col-md-10 col-lg-10">
                                                    <?php
                                                    // Retrieve the total number of Subject BM
                                                    $query = "SELECT COUNT(*) AS total FROM subject";
                                                    $stmt = $db->prepare($query);
                                                    $stmt->execute();

                                                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                    $totalALL = $row['total'];
                                                    ?>

                                                    <table class=" table subject-table table-responsive table-striped">
                                                        <h4 class="text-center my-0">&nbsp;&nbsp;(Total Number=&nbsp;
                                                            <?php echo $totalALL; ?>)
                                                        </h4><br>

                                                        <?php
                                                        // Retrieve subject details and apply sorting
                                                        $query = "SELECT * FROM subject";
                                                        $result = $db->query($query);

                                                        // Generate HTML markup
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
                                                        ?>
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
                                                            <?php echo $html; ?>
                                                        </tbody>
                                                    </table>
                                                 </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


            <script>
                function confirmDelete() {
                    if (confirm("Are you sure you want to delete this schedule?")) {
                        return true; // Proceed with deletion
                    } else {
                        return false; // Cancel deletion
                    }
                }
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