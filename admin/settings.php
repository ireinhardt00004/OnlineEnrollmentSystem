<?php 
session_start();
include "db_conn.php";
if (isset($_SESSION['accountID'],$_SESSION['img_url'], $_SESSION['fname'], $_SESSION['bdate'],$_SESSION['middlename'],$_SESSION['address'],$_SESSION['cnum'], $_SESSION['lname'],$_SESSION['course'],
               $_SESSION['gender'])) {
     

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Settings</title>
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
        </nav>
     <div class="container-lg">
  <div class="row justify-content-center">
    <div class="col-sm-10 col-lg-10 col-md-10">
      <form class="text-dark fs-5 g-3 my-1" id="registrationForm" onsubmit="return validateForm()" action="../admin/setting_action.php" method="post" enctype="multipart/form-data">
        <h2 class="fs-1 mt-3 text-center">Change Login Credentials</h2><br>
        <p style="text-align: center; color: red;">
          <?php if (isset($_GET['error'])): ?>
            <?php echo $_GET['error']; ?>
          <?php endif ?>
        </p>
        <div class="row justify-content-center">
          <div class="col-sm-10 col-md-10 col-lg-7">
            <div class="mt-3">
              <label for="validationDefaultemail" class="form-label">New Email Address</label>
              <div class="input-group">
                <span class="input-group-text text-bg-warning" id="inputGroupPrepend2">
                  <i class="bi bi-envelope-fill"></i>
                </span>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" aria-describedby="inputGroupPrepend2" value="<?php echo $_SESSION['email']; ?>">
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
              <button style="float: none;" type="Submit" class="btn btn-primary" name="submit">Save Changes</button>
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

    var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!email.match(emailRegex)) {
      alert("Please enter a valid email address.");
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

    if (!contactNumber.startsWith("09") || contactNumber.length !== 11) {
      alert("Please enter a valid contact number starting with '09' and having a length of 11.");
      return false;
    }

    var today = new Date();
    var bdate = new Date(bdateInput);
    var diff = today.getFullYear() - bdate.getFullYear();
    var monthDiff = today.getMonth() - bdate.getMonth();
    var dayDiff = today.getDate() - bdate.getDate();

    if (diff < 10 || (diff === 10 && (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)))) {
      alert("The birth date must be 10 years ago or older.");
      return false;
    }

    return true;
  };
  
      var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    }; 

  $('#output').show();
    reader.readAsDataURL(event.target.files[0]);
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
}else{
     header("Location: ../admin/index.php");
     exit();
}
 ?>