<?php 
session_start();
include "db_conn.php";
if (isset($_SESSION['accountID'],$_SESSION['img_url'], $_SESSION['fname'], $_SESSION['bdate'],$_SESSION['middlename'],$_SESSION['address'],$_SESSION['cnum'], $_SESSION['lname'],$_SESSION['course'],
               $_SESSION['gender'])) {
     

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Information</title>

  <link rel="stylesheet" type="text/css" href="../assets/css/edit.css">
     <link href="assets/img/alphabet-m-icon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />


  <script>
  function updatePage() {
    // Send an AJAX request to fetch updated data
    $.ajax({
      url: 'fetch_data.php',
      method: 'GET',
      success: function(response) {
        // Update the relevant parts of your HTML page with the new data
        $('#dataContainer').html(response);
      }
    });
  }

</script>
</head>
<body>
  <div class="sidebar">
    <header>FacultyID: <?php echo $_SESSION['accountID']; ?></header>
    <ul>
      <li><a href="../admin/index.php" onclick="updatePage()"><i class="fas fa-qrcode"></i>Overview</a></li>
      <li><a href="../admin/edit.php"><i class="fas fa-sliders-h"></i>Edit Information</a></li>
      <li><a href="#"><i class="fas fa-stream"></i>Subjects</a></li>
      <li><a href="../admin/calendar.php"><i class="fas fa-calendar-week"></i>Notes</a></li>
      <li><a href="#"><i class="fas fa-question-circle"></i>Grading</a></li>
      <li><a href="../admin/settings.php"><i class="fas fa-link"></i>Settings</a></li>
      li><a href="../admin/contact.php"><i class="fas fa-envelope"></i>Contact Us</a></li>
      <li class="nic"><a href="../database/logout.php"><span class="material-symbols-outlined">logout</span>Logout</a></li>
    </ul>
  </div>
     <div>
         <form action="../admin/personal_info.php" method="post"  enctype="multipart/form-data">
              <div class="row">
                <?php if (isset($_GET['error'])): ?>
    <p><?php echo $_GET['error']; ?></p>
  <?php endif ?>
                <h2>Edit Personal Information</h2>
                <div class="col-md-6 form-group">
                  <label>Upload Profile Picture</label>
                    <input type="file" name="my_image" id= my_image> 

                  <input type="text" name="fname" class="form-control" value="<?php echo $_SESSION['fname'] ; ?>" placeholder="First Name" >
                </div>
                <div class="col-md-6 form-group">

                  <input type="text" name="middlename" class="form-control"value="<?php echo $_SESSION['middlename'] ; ?>" placeholder="Middle Name" >
                </div>
                <div class="col-md-6 form-group">

                  <input type="text" name="lname" class="form-control" value="<?php echo $_SESSION['lname'] ; ?>" placeholder="Last Name" >
                </div>
        
                <div class="col-md-6 form-group">
                    <div class="col-md-6 form-group">

                  <input type="text" name="address" class="form-control" value="<?php echo $_SESSION['address'] ; ?>" placeholder="Complete Address" >
                </div>
                    
                  <label>Gender</label>
                <select name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option selected value="none">Prefer not to say</option>
                    </select><br>
                
                <div class="col-md-6 form-group">

                  <input type="tel" name="cnum" class="form-control" value="<?php echo $_SESSION['cnum'] ; ?>" maxlength="11"placeholder="Contact Number" >
                </div>
                
                <div class="col-md-6 form-group">

                  <input type="date" name="bdate" class="form-control" value="<?php echo $_SESSION['bdate'] ; ?>" placeholder="Birth Date" >
                </div>
                
              <div class="text-center"><input type="submit" name="submit" value="Save"></div>
            </form>
     </div>
        
</body>
</html>
<?php 
}else{
     header("Location: ../index.php");
     exit();
}
 ?>