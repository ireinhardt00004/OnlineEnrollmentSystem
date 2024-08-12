<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['accountID'], $_SESSION['img_url'], $_SESSION['fname'], $_SESSION['bdate'], $_SESSION['middlename'], $_SESSION['address'], $_SESSION['cnum'], $_SESSION['lname'], $_SESSION['course'], $_SESSION['year'], $_SESSION['gender'], $_SESSION['category'], $_SESSION['semester'])) {


    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head class="h-100">
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../assets/img/logo.png" rel="icon">

        <link rel="stylesheet" href="index.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <title>Dashboard</title>

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
        <button class="navbar-toggler position-fixed" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="material-symbols-outlined text-dark fs-1 mt-1">
                density_medium
            </span>
        </button>
        <nav class="navbar">
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
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-10 col-lg-10 mt-3">
                    <div class="text-bg-warning d-flex justify-content-between">
                        <div class="d-flex">
                            <img class="img img-circle" style="width: 100px; height: 100px; border-radius: 50%;"
                                src="../uploads/<?php echo $_SESSION['img_url']; ?>">
                            <h3 class="fs-2 text-white text-start mt-5 ms-3">
                                <?php echo $_SESSION['fname']; ?>
                                <?php echo $_SESSION['middlename']; ?>
                                <?php echo $_SESSION['lname']; ?>
                            </h3>
                        </div>
                        <div class="me-2 mt-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                <i class="bi bi-pencil-square fs-6"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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

                                                        <form class="text-dark fs-5 g-3 my-1" action="../user/personal_info.php" method="post" enctype="multipart/form-data">

                                                            <div class="col-lg">
                                                                <label for="validationDefault01"
                                                                    class="form-label">Picture</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text text-bg-warning"
                                                                        id="inputGroupPrepend2"><i
                                                                            class="bi bi-card-image"></i></span>
                                                                    <input class="form-control" type="file" id="formFile" name="my_image" value="<?php echo $_SESSION['img_url']; ?>"
                                                                        >
                                                                </div>
                                                                <label for="validationDefault01" class="form-label">First
                                                                    Name</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text text-bg-warning"
                                                                        id="inputGroupPrepend2"><i
                                                                            class="bi bi-person-fill"></i></span>
                                                                    <input type="text" class="form-control"
                                                                        id="validationDefault01" placeholder="First Name" value="<?php echo $_SESSION['fname']; ?>" 
                                                                        name="fname">
                                                                </div>
                                                                <div class="mt-3">
                                                                    <label for="validationDefault02" class="form-label">Middle
                                                                        Name</label>
                                                                    <input type="text" class="form-control"
                                                                        id="validationDefault02" placeholder="Middle Name"
                                                                        name="middlename" value="<?php echo $_SESSION['middlename']; ?>">
                                                                </div>
                                                                <div class="mt-3">
                                                                    <label for="validationDefault06"
                                                                        class="form-label">Last Name</label>
                                                                    <input type="text" class="form-control"
                                                                        id="validationDefault06" placeholder="Middle Name"
                                                                        name="lname" value="<?php echo $_SESSION['lname']; ?>">
                                                                </div>
                                                                <div class="mt-3">
                                                                    <label for="validationDefaultemail"
                                                                        class="form-label">Email</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text text-bg-warning"
                                                                            id="inputGroupPrepend2"><i
                                                                                class="bi bi-envelope-fill"></i></span>
                                                                        <input type="email" class="form-control"
                                                                            id="validationDefaultemail"
                                                                            aria-describedby="inputGroupPrepend2"
                                                                            placeholder="example@example.com" name="email"value="<?php echo $_SESSION['email']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="mt-3">
                                                                    <label for="validationDefault04"
                                                                        class="form-label">Gender</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text text-bg-warning"
                                                                            id="inputGroupPrepend2"><i
                                                                                class="bi bi-gender-ambiguous"></i></span>
                                                                        <select class="form-select" id="validationDefault04" name="gender" 
                                                                            aria-label="Default select example" value="<?php echo $_SESSION['gender']; ?>">
                                                                        
                                                                            <option value="Male">Male</option>
                                                                            <option value="Female">Female</option>
                                                                            <option value="N/A">Prefer not to say</option>
                                                                           
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-3">
                                                                    <label for="validationDefault03"
                                                                        class="form-label">Address</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text text-bg-warning"
                                                                            id="inputGroupPrepend2"><i
                                                                                class="bi bi-house-fill"></i></span>
                                                                        <input type="text" class="form-control"
                                                                            id="validationDefault03" placeholder="Cit, brgy" name="address" 
                                                                           value="<?php echo $_SESSION['address']; ?>">
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
                                                                            aria-describedby="inputGroupPrepend2"
                                                                            placeholder="09xxxxxxxxx." name="cnum" value="<?php echo $_SESSION['cnum']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="mt-4">
                                                                    <label for="validationDefaultdate"
                                                                        class="form-label">Birthdate.</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text text-bg-warning"
                                                                            id="inputGroupPrepend2"><i
                                                                                class="bi bi-calendar-fill"></i></span>
                                                                        <input type="date" class="form-control"
                                                                            id="validationDefaultdate"
                                                                            aria-describedby="inputGroupPrepend2" name="bdate" value="<?php echo $_SESSION['bdate']; ?>">
                                                                    </div>
                                                                </div>
                                                                <div class=" mt-5">
                                                                    <div class="form-check">
                                                                        
                                                                         <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                                                       
                                                                    </div>
                                                                </div>
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
                     <?php if (isset($_GET['msg'])) { ?>
                            <p style="color:red;  "class="error"><?php echo $_GET['msg']; ?></p>
                            <?php } ?>
                    <div class="table-responsive">
                        <table class="table table-dark table-striped text-center">

                            <tr class="fs-5">
                                <td>Category</td>
                                <td>
                                    <?php echo $_SESSION['category']; ?>&nbsp;Student
                                </td>
                            </tr>
                            <tr class="fs-5">
                                <td>Course</td>
                                <td>
                                    <?php echo $_SESSION['course']; ?>
                                </td>
                            </tr>
                            <tr class="fs-5">
                                <td>Year</td>
                                <td>
                                    <?php echo $_SESSION['year']; ?>
                                </td>
                            </tr class="fs-5">
                            <tr>
                                <td>Semester</td>
                                <td>
                                    <?php echo $_SESSION['semester']; ?>
                                </td>
                            </tr class="fs-5">
                            <tr class="fs-5">
                                <td>Email</td>
                                <td>
                                    <?php echo $_SESSION['email']; ?>
                                </td>
                            </tr>
                            <tr class="fs-5">
                                <td>Gender</td>
                                <td>
                                    <?php echo $_SESSION['gender']; ?>
                                </td>
                            </tr>
                            <tr class="fs-5">
                                <td>Address</td>
                                <td>
                                    <?php echo $_SESSION['address']; ?>
                                </td>
                            </tr>
                            <tr class="fs-5">
                                <td>Birthday</td>
                                <td>
                                    <?php echo $_SESSION['bdate']; ?>
                                </td>
                            </tr>
                            <tr class="fs-5">
                                <td>Contact No</td>
                                <td>
                                    <?php echo $_SESSION['cnum']; ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--  Footer -->

        <footer class="footer mt-auto py-3 text-center">
            <div class="container">
                <div class="copyright">
                    &copy; <span><a href="contact.php"><strong>MMC&nbsp;&nbsp;</strong></a></span>All Rights Reserved
                    2023
                </div>
                <div class="credits">

                </div>
            </div>
        </footer><!-- End  Footer -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
    </body>

    </html>
    <?php
} else {
    header("Location: ../user/index.php");
    exit();
}
?>