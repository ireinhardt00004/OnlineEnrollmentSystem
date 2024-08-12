
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Contact</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!--link of bootstrap CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>
<style type="text/css">
  form {
    width: 100%;
    height: 100%;
  }
  input {
    width: 300px;
    height: 1400px;
  }
  button {
    background-color:#34b7a7;
  }
</style>
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
        <li><a class="active" href="contact.php">Contact</a></li>
    <li><a href="login.php">Portal</a></li>
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
<main id="main">
  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div>
          
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3866.5066687510125!2d120.86276417176283!3d14.281968354250866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd8041d3247567%3A0xd009e7c4908d85b7!2sTower%20Mall!5e0!3m2!1sen!2sph!4v1685690926543!5m2!1sen!2sph"width="100%" height="270px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>13th floor, Trece Martyrs Tower, Trece Martires City, Cavite 4109</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>admissions@montemayorcollege.edu.ph</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+63 99999999</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>

    <form action="contact1.php" method="post"  onsubmit="return validateForm()">
      <h2>For any concern or suggestion.. Send us a Message!</h2>
        <p style="color: red;"><?php if (isset($error_message)) { echo $error_message; } ?></p>

        <div class="row">
            <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
        </div>
        <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
        </div>
        <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
        </div>
        <div class="text-center">
            <button type="submit" name="submit">SEND MESSAGE</button>
        </div>
    </form>
</div>


      </div>
    </section><!-- End Contact Section -->

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
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

<script type="text/javascript">
    function validateForm() {
  // Retrieve form values
  var name = document.getElementById("email").value;
  

  // Check if required fields are filled out
  if (name === "" || email === "" || password === "" || confirmPassword === "") {
    alert("Please fill out all fields.");
    return false;
  }

  // Validate email format using a regular expression
  var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (!email.match(emailRegex)) {
    alert("Please enter a valid email address.");
    return false;
  }

  

  // If all validations pass, the form can be submitted
  return true;
}

  
     </script>

</body>

</html>