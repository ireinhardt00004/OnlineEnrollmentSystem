<?php 
include "db_conn.php";
if (isset($_SESSION['admin_ID'],$_SESSION['full_name'],$_SESSION['role'],$_SESSION['role'], $_SESSION['username'])) {
     

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/img/logo.png" rel="icon">

    <link rel="stylesheet" href="css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Dashboard</title>

    <style type="text/css">
        #logo img {
            display: block;
            margin: 0 auto;
            background-repeat: no-repeat;
            
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
                    id="offcanvasNavbarLabel">Hi!&nbsp;<a href="dashboard.php" style="text-decoration: none;"> <?php echo $_SESSION['full_name'] ; ?></a></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav fs-5 justify-content-start flex-grow-1 ps-1">
                    <li class="nav-item p-2 mt-4">
                         ID:
                        <?php echo $_SESSION['admin_ID'] ; ?>
                    </li>
                    <li class="nav-item p-2 mt-4">
                        <a class="nav-link " aria-current="page" href="../super/lists.php" onclick=" updatePage()"><span
                                class="material-symbols-outlined float-start p-1">
                                person
                            </span> List of Accounts</a>
                    </li>
                    <li class="nav-item p-2 mt-4">
                        <a class="nav-link" href="subject.php"><span class="material-symbols-outlined float-start p-2">
                                school
                            </span>List of Subjects</a>
                    </li>
                   <li class="nav-item p-2 mt-4">
                        <a class="nav-link" href="fee.php"><span class="material-symbols-outlined float-start p-2">
                                show_chart
                            </span>List of School Fees</a>
                    </li>
                  <!--  <li class="nav-item p-2 mt-4">
                        <a class="nav-link" href="#"><span class="material-symbols-outlined float-start p-2">
                                pen_size_4
                            </span>#</a>
                    </li>-->
                     <li class="nav-item p-2 mt-4 ">
                        <a class="nav-link" href="subject_teacher.php"><span class="material-symbols-outlined float-start p-2">
                                calendar_month
                            </span>List of Subject Teacher and Schedules</a>
                    </li>
                    <li class="nav-item p-2 mt-4">
                        <a class="nav-link" href="message.php"><span class="material-symbols-outlined float-start p-2">
                                pen_size_4
                            </span>Message Inbox</a>
                    </li>
                    <li class="nav-item p-2 mt-4 ">
                        <a class="nav-link" href="settings.php"><span class="material-symbols-outlined float-start p-2">
                                settings
                            </span>Change Login Credentials</a>
                    </li>
                </ul>
                <ul class="navbar-nav fs-5 justify-content-start flex-grow-1 ps-1  mt-5">
                    <li class="nav-item p-2 mt-5 pt-10">
                        <a class="nav-link" href="../super/logout.php"><span class="material-symbols-outlined float-start p-2">
                                logout
                            </span>Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <main>
        <br><br><br>
  <h2 style="text-align: center; position: relative; z-index: 1; color: green;">WELCOME! &nbsp; <?php echo $_SESSION['role']; ?></h2>
  <div id="logo">
    <img src="logo.png" style="display: block; margin: 0 auto;">
  </div>
</main>


  <!--  Footer -->
   <footer id="footer" style="text-align:center;">
    <div class="container">
      <div class="copyright">
        &copy;  <span><a href="contact.php"><strong>MMC&nbsp;&nbsp;</strong></a></span>All Rights Reserved 2023
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
}else{
     header("Location: ../super/index.php");
     exit();
}
 ?>