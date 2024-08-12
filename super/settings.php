<?php

include "db_conn.php";
if (isset($_SESSION['admin_ID'],$_SESSION['full_name'],$_SESSION['role'], $_SESSION['username'])) {
     

 ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/img/logo.png" rel="icon">

    <link rel="stylesheet" href=".css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Change Login Credentials</title>

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
function togglePasswordVisibility() {
  var passwordInput = document.getElementById("password");
  var confirmPasswordInput = document.getElementById("confirm-password");
  var toggleBtn = document.querySelector(".toggle-password");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    confirmPasswordInput.type = "text";
    toggleBtn.innerHTML = "&#128064;"; // Show password icon
  } else {
    passwordInput.type = "password";
    confirmPasswordInput.type = "password";
    toggleBtn.innerHTML = "&#128065;"; // Hide password icon
  }
}
    
</script></head>
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

    <div class="container-lg">
  <div class="row justify-content-center">
    <div class="col-sm-10 col-lg-10 col-md-10">
      <form class="text-dark fs-5 g-3 my-1" id="registrationForm" onsubmit="return validateForm()" action="../super/setting_action.php" method="post" enctype="multipart/form-data">
        <h2 class="fs-1 mt-3 text-center">Change Login Credentials</h2><br>
        <p style="text-align: center; color: red;">
          <?php if (isset($_GET['msg'])): ?>
            <?php echo $_GET['msg']; ?>
          <?php endif ?>
        </p>
        <div class="row justify-content-center">
          <div class="col-sm-10 col-md-10 col-lg-7">
            <div class="mt-3">
              <label for="validationDefaultemail" class="form-label">New Username</label>
              <div class="input-group">
                <span class="input-group-text text-bg-warning" id="inputGroupPrepend2">
                  <i class="bi bi-person-fill"></i>
                </span>
                <input type="text" name="username"aria-describedby="inputGroupPrepend2" value="<?php echo $_SESSION['username']; ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-sm-10 col-md-10 col-lg-7">
            <div class="mt-3">
              <label for="validationDefaultemail" class="form-label">New Password</label>
              <div class="input-group">
                <span class="input-group-text text-bg-warning" id="inputGroupPrepend2">
                  <i class="bi bi-key-fill"></i>
                </span>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" aria-describedby="inputGroupPrepend2" required>
                <div class="input-group-append">
                  <span class="toggle-password input-group-text" onclick="togglePasswordVisibility()">&#128065;</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-sm-10 col-md-10 col-lg-7">
            <div class="mt-3">
              <label for="validationDefaultemail" class="form-label">Confirm password</label>
              <div class="input-group">
                <span class="input-group-text text-bg-warning" id="inputGroupPrepend2">
                  <i class="bi bi-key"></i>
                </span>
                <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm Password" aria-describedby="inputGroupPrepend2" required>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-sm-10 col-md-10 col-lg-7">
            <div class="mt-3 text-center">
              <button style="float: none;" type="submit" class="btn btn-primary" name="submit">Save Changes</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  document.getElementById("registrationForm").onsubmit = function() {
    var name = document.getElementById("fname").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm-password").value;
    var contactNumber = document.getElementById("cnum").value;
    var bdateInput = document.getElementById("bdate").value;

    if (name === "" || email === "" || password === "" || confirmPassword === "") {
      alert("Please fill out all fields.");
      return false;
    }

    

    if (password.length < 8) {
      alert("Password must be at least 8 characters long.");
      return false;
    }

    if (password !== confirmPassword) {
      alert("Passwords do not match.");
      return false;
    }

    return true;
  };
  
      
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"></script>
      <br> <br> <br>
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
                    </footer><!-- End  Footer -->
  </body>

  </html>
  <?php
} else {
  header("Location: ../super/dashboard.php");
  exit();
}
?>