
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portal</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!--link of bootstrap CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- icon -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- import Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- import the css file-->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- import Google Fonts  API-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
 <style type="text/css">
form {
   text-align: center;
  position: relative;
  justify-content: center;
  align-items: center;
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 600px;
  border: 2px solid #ccc;
  padding: 15px;
  background: #fff;
  border-radius: 15px;
  margin: 0 auto; 
}


input {
  display: block;
  border: 2px solid #ccc;
  width: 120%;
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

  font-weight: bold;
  color: #888;
  font-size: 18px;
  padding: 10px;
}

button {

  float: right;
  background: #555;
  padding: 10px 15px;
  color: #fff;
  border-radius: 5px;
  margin-right: 10px;
  border: none;
  width: 100px; 
  height: 50px;
  font-size: 15px;
}
button:hover{
  opacity: .7;
    }
.password-input {
      position: relative;
    }
.toggle-password {
      position: absolute;
      top: 80%;
      right: 25% !important;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 25px;
    }
.image-container {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: flex-end; /* Align image to the right */
}

.image-container img {
  max-width: 100%; /* Adjust the image size as needed */
  height: auto;
</style>

</head>

<body>
<!-- ======= Header ======= -->
   <header id="header" class="fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center"><br>
      <h1 class="logo me-auto me-lg-0"><a href="index.php"><img src="assets/img/logo.svg" alt="college logo" class="img-fluid" style="width:110px; height:250px;">&nbsp;MONTEMAYOR COLLEGE</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a class="active" href="login.php">Portal</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Admission
            </a>
            <ul class="dropdown-menu">
              <li><a href="student_admission.php">Student Enrollment</a></li>
              <li><a href="faculty_admission.php">Teacher Registration</a></li>
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


<!-- HTML code for the login form -->
<!-- Previous HTML code -->

<!-- HTML code for the login form -->
<main id="main">
    <!-- ======= Portal Section ======= -->
    <section id="portal" class="portal">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>PORTAL</h2>
                <p></p>
            </div>
            <div class="login-container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-delay="100">
                        <form id="portal" action="database/logon.php" method="post">
                            <h3 class="portal-title" style="text-align:center">LOGIN</h3>
                            <?php if (isset($_GET['error'])) { ?>
                            <p style="color:red;  "class="error"><?php echo $_GET['error']; ?></p>
                            <?php } ?>
                            <div class="row">
                                <div class="form-group mt-3">
                                    <label>Email Address</label>
                                    <input type="email" id="email" name="email" placeholder="Enter Email Address" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <div class="password-input">
                                    <label>Password</label>
                                    <input type="password" id="password" name="password" placeholder=" Enter Password"
                                        required><span class="toggle-password" onclick="togglePasswordVisibility()">&#128065;</span>
                                </div>
                               
                                
                            </div>
                            <h3>Not yet register?<a href="student_admission.php"> Sign Up</h3></a><br><br>
                            <br>
                            <button type="submit">LOGIN</button>
                        </form>
                    </div>
                    <div class="image-container">
                        <img src="assets/img/R2.png" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Portal Section -->
</main><!-- End #main -->
<!-- Previous HTML code -->
<!-- End #main -->


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
<!-- Link to Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- import the javascript -->
  <script src="assets/js/main.js"></script>
   <script type="text/javascript">
function togglePasswordVisibility() {
      var passwordInput = document.getElementById("password");
      var toggleBtn = document.querySelector(".toggle-password");

      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleBtn.innerHTML = "&#128064;"; // Show password icon
      } else {
        passwordInput.type = "password";
        toggleBtn.innerHTML = "&#128065;"; // Hide password icon
      }
      }

     </script>

</body>

</html>