<!DOCTYPE html>
<html lang="en">

<head>
  
  
  <title>Faculty Registration</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!--link of bootstrap CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- import Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- import the css file-->
  <link href="assets/css/signup.css" rel="stylesheet">
  <!-- import Google Fonts  API-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<style>
    .success-message {
        color: green;
        text-align: center;
        background-color: skyblue;
      font-size: 20px;

    }
    .error-message {
        color: red;
        text-align: center;
         background-color: skyblue;
      font-size: 20px;

    }
</style>

<script>
  

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

  <!-- ======= Header ======= -->
   <header id="header" class="fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center"><br>
      <h1 class="logo me-auto me-lg-0"><a href="index.php"><img src="assets/img/logo.svg" alt="college logo" class="img-fluid" style="width:110px; height:250px;">&nbsp;MONTEMAYOR COLLEGE</a></h1>
     <h1 class="logo me-auto me-lg-0"><a href="about.php"><img src="assets/" alt="" class="img-circle"></a></h1>


      
      <nav id="navbar" class="navbar order-last order-lg-0">
    <ul>
    <li><a  href="index.php">Home</a></li>
    <li><a href="about.php">About Us</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="contact.php">Contact</a></li>
    <li><a href="login.php">Portal</a></li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Admission 
      </a>
      <ul class="dropdown-menu">
        <li><a href="student_admission.php">Student Enrollment</a></li>
        <li><a  href="faculty_admission.php">Teacher Registration</a></li>
      </ul>
    </li>

  </ul>
  <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->

      <div class="header-social-links">
        <a href="https://www.twitter.com/" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://www.facebook.com/" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/" class="instagram"><i class="bi bi-instagram"></i></a>
      </div>

    </div>

  </header><!-- End Header -->
  <main id="main">

    <!-- ======= Admission Section ======= -->
    <section id="signup" class="signup">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>FACULTY ADMISSION</h2>
          <p></p>
        </div>

            <h3 class="signup-title" style="text-align:center;">FACULTY REGISTRATION FORM</h3>
              

              <form id="registrationForm" onsubmit="return validateForm()" method="post" action="database/a=registration.php" enctype="multipart/form-data">
                 
               <?php
                  if (isset($_GET['msg'])) {
                      echo '<p class="success-message">' . $_GET['msg'] . '</p>';
                  } elseif (isset($_GET['error'])) {
                      echo '<p class="error-message">' . $_GET['error'] . '</p>';
                  }
              ?></div></div>

              <div style="display: flex; flex-direction: column; align-items: center;">
             <label class="lable" style="text-align:center;"> Photo </label>
   <div style="border: 1px solid black; height: 150px; width: 150px;  background: #F5FAFF;">
      <img id="output"  width="150" height="150" / style="display:block; align-content: center;">
  </div></div>

    <input type="file" name="my_image" id="image" onchange="loadFile(event)" class="form-control" required accept="image/*" / style="width:150px; display: flex;" required>

               <input type="hidden" name="admin" value="admin">
             </div>
                <label>Last Name</label>
                <input type="text" id="lname"name="lname" placeholder="Enter Last Name"  required>
                <label>Middle Name</label>
                <input type="text" id="middlename"name="middlename" placeholder="Enter Middle Name" >
                <label>First Name</label>
                <input type="text" id="fname"name="fname" placeholder="Enter First Name"  required>
                
                <label>Department</label>
                <select name="course">
                    <option value="Department of Information Technology">Department of Information Technology</option>
                    <option value="Department of Hospitality Management">Department of Hospitality Management</option>
                    <option value="Department of Business Management">Department of Business Management </option>
                    <option value="Department of General Education">Department of General Education </option>
                    <option  selected>Select Department</option>
                    </select><br>
                    
                <label>Birthdate</label>
                <input type="date" name="bdate" id="bdate" required>

                <label>Address</label>
                <input type="text" name="address" required>

                <label>Contact Number</label>
                <input type="tel" name="cnum" maxlength="11"  id="cnum"placeholder="Enter Contact Number" required>
                <label>Gender</label>
                <select name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option selected value="N/A">Prefer not to say</option>
                    </select><br>

               <label>Email Address</label>
                <input type="email" id="email"name="email" placeholder="Enter Email Address" required>
                
                <div class="password-input">
                  <label>Password</label>
                <input type="password" id="password" name="password" placeholder=" Enter Password" required><span class="toggle-password" onclick="togglePasswordVisibility()">&#128065;</span>
                </div>
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
                 <br>
                <label>By clicking the Sign Up, you are agree to the<a href="privacy_policy.php" target="_blank"> Privacy Policy of the Institution</a></label>
                <button type="submit"name="submit" value="upload">Sign Up</button>
              </form>
           </div>

            </div>
      </div><br><br><br><br><br><br>
    </section><!-- End Admission Section -->

  </main><!-- End #main -->

  <!--  Footer -->
   <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy;  <span><a href="contact.php"><strong>MMC&nbsp;&nbsp;</strong></a></span>All Rights Reserved 2023
      </div>
      <div class="credits">
        
      </div>
    </div>
  </footer><!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
 <!-- <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>-->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

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

</body>

</html>