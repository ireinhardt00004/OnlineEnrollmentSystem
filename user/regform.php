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
        <link rel="stylesheet" >
        <link href="../assets/img/logo.png" rel="icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <title>Registration Forms</title>
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
                            <a class="nav-link active" href="regform.php"><span
                                    class="material-symbols-outlined float-start p-2">
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
                            <a class="nav-link" href="../database/logout.php"><span class="material-symbols-outlined float-start p-2">
                                    logout
                                </span>Log out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid mt-4">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-10 col-lg-10">
                    <h2>Registration Form</h2>
                    <div class="table-responsive my-5">
                        <table class="table text-uppercase table-hover text-center my-1">
                            <thead class="text-bg-warning">
                                <tr class="col-sm">
                                    <th scope="col">#</th>
                                    <th scope="col">Academic Year</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Semester</th>
                                    <th scope="col">Year Level</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <?php echo $_SESSION['acadyear']; ?>
                                    </td>
                                    <td>
                                        <?php echo $_SESSION['course']; ?>
                                    </td>
                                    <td>
                                        <?php echo $_SESSION['semester']; ?>
                                    </td>
                                    <td>
                                        <?php echo $_SESSION['year']; ?>
                                    </td>
                                    <td><a href="preview.php" target="_blank"><button class="btn btn-primary"><i class="bi bi-eye">&nbsp;View Form</i></button></a></td>


                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>--</td>
                                    <td>
                                        <?php echo $_SESSION['course']; ?>
                                    </td>
                                    <td>--</td>
                                    <td>--</td>
                                    <td><a href="#"><button class="btn btn-primary"><i class="bi bi-eye">&nbsp;View Form</i></button></a></td>

                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>--</td>
                                    <td>
                                        <?php echo $_SESSION['course']; ?>
                                    </td>
                                    <td>--</td>

                                    <td>--</td>
                                    <td><a href="#" ><button class="btn btn-primary"><i class="bi bi-eye">&nbsp;View Form</i></button></a></td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>--</td>
                                    <td>
                                        <?php echo $_SESSION['course']; ?>
                                    </td>
                                    <td>--</td>

                                    <td>--</td>
                                    <td><a href="#" ><button class="btn btn-primary"><i class="bi bi-eye">&nbsp;View Form</i></button></a></td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>--</td>
                                    <td>
                                        <?php echo $_SESSION['course']; ?>
                                    </td>
                                    <td>--</td>

                                    <td>--</td>
                                    <td><a href="#" ><button class="btn btn-primary"><i class="bi bi-eye">&nbsp;View Form</i></button></a></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>


        <!--  Footer -->
        <div class="mt-4" style="position:relative; bottom: 0; width: 100%;">
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
        </div>
    </body>

    </html>
    <?php
} else {
    header("Location: ../user/index.php");
    exit();
}
?>