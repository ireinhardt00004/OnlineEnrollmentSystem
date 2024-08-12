<?php 
include "db_conn.php";
if (isset($_SESSION['admin_ID'],$_SESSION['full_name'], $_SESSION['username'])) {
     

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/img/logo.png" rel="icon">

    <link rel="stylesheet" href="css/subject.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>List of Subject and Teacher Schedule</title>

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

    <main id="subject">
        <h2>List of Subject and Teacher Schedule </h2><br>


 <!--       
<div id="myModal" class="modal modal-centered">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h4 class="modal-title">Insert Subject</h4>
        <button type="button" class="close" data-dismiss="modal" >&times;</button>
      </div>
      
       
      <div class="modal-body-centered">
       
        <form id="insert-subject"  method="post" action="insertsubject.php" enctype="multipart/form-data">
        
          <div class="form-group">
            <label for="subjectdepartment">Department:</label>
            <select name ="subject_department" >
            <option class="form-control" selected value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
            <option class="form-control" value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>
            <option class="form-control" value="Bachelor of Science in Business Management">Bachelor of Science in Business Management</option>
            <option class="form-control" value="">Select Department</option>
            </select>
          </div>
          <div class="form-group">
            <label for="subjectYear">Subject Year:</label>
            <select name="subject_year" required>
            <option class="form-control" value="First">First</option>
            <option class="form-control" value="Second">Second</option>
            <option class="form-control" value="Third">Third</option>
            <option class="form-control" value="Fourth">Fourth</option>
            <option class="form-control" value="MidYear">Mid-Year</option>
            <option class="form-control"  selected value="">Select Year</option></select>
          </div>
          <div class="form-group">
            <label for="subjectSemester">Semester:</label>
            <select name="subject_semester" required>
            <option class="form-control" value="First">First</option>
            <option class="form-control" value="Second">Second</option>
            <option class="form-control" value="MidYear">Mid-Year</option>
            <option class="form-control" selected value="">Select Semester</option></select>
          </div>
          <div class="form-group">
            <label for="subjectCode">Subject Code:</label>
            <input type="text" class="form-control" name ="subject_code" placeholder="Enter subject code">
          </div>
          <div class="form-group">
            <label for="subjectName">Subject Name:</label>
            <input type="text" class="form-control" name="subject_name" placeholder="Enter subject name">
          </div>
          <div class="form-group">
            <label for="subjectName">Description:</label>
            <input type="text" class="form-control" name="subject_description" placeholder="Enter Description">
          </div>
          <div class="form-group">
            <label for="lecture">Lecture (UNITS):</label>
            <input type="number" maxlength="3" class="form-control" name="lecture" placeholder="Lecture Units">
          </div>
          <div class="form-group">
            <label for="lab">Laboratory (UNITS):</label>
            <input type="number" maxlength="3" class="form-control" name="lab" placeholder="Laboratory Units">
          </div>
          
          <button type="submit" class="btn btn-primary">Save</button>
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
          More form inputs... 
        </form>
      </div>
      
      
        
    </div>
  </div>
</div></div>-->
        
       <!-- IT -->
<div>
    <!--<button class="btn btn-primary" id="insert-btn" data-toggle="modal" data-target="#myModal"style="float:right;">INSERT SUBJECT</button></div><br><hr>-->
    <div>
         <?php

                    // Retrieve the total number of Subject BM
            $query = "SELECT COUNT(*) AS total FROM tblschedule WHERE course = 'Bachelor of Science in Information Technology'";
            $stmt = $db->prepare($query);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $totalIT = $row['total'];

                    ?>
<?php if (isset($_GET['msg'])) { ?>
                            <p style="color:green;  "class="error"><?php echo $_GET['msg']; ?></p>
                            <?php } ?>   
    <table class="table">
        <h2>INFORMATION TECHNOLOGY&nbsp;&nbsp;(Total Number=&nbsp;<?php echo $totalIT; ?>)</h2><br>
              
        
        <?php
        // Retrieve subject details and apply sorting
        $query = "SELECT * FROM tblschedule WHERE course ='Bachelor of Science in Information Technology'";
        $result = $db->query($query);

        // Generate HTML markup
        $html = '';
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $html .= "<tr>";
             $html .= "<td>{$row['schedID']}</td>";
            $html .= "<td>{$row['subject_code']}</td>";
            $html .= "<td>{$row['facultyname']}</td>";
            $html .= "<td>{$row['schedFrom']}</td>";
            $html .= "<td>{$row['schedTo']}</td>";
            $html .= "<td>{$row['schedDay']}</td>";
           $html .= "<td><a href='deleteSched.php?schedID={$row['schedID']}' class='btn btn-danger'onclick='return confirmDelete()'>Delete Schedule</a></td>";
            $html .= "</tr>";
        }
        ?>
        <thead>
        <tr>
            
            <th scope="col">Schedule ID</th>
            <th scope="col">Subject Code</th>
            <th scope="col">Name</th>
           
            <th scope="col">Schedule From</th>
            <th scope="col">Schedule To</th>
            <th scope="col">Day</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php echo $html; ?>
        </tbody>
    </table>
</div>
<hr>



<!-- BM -->
<div>
               <?php

                    // Retrieve the total number of Subject BM
            $query = "SELECT COUNT(*) AS total FROM tblschedule WHERE course = 'Bachelor of Science in Business Management'";
            $stmt = $db->prepare($query);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $totalBM = $row['total'];

                    ?>

    <table class="table">
        <h2>BUSINESS MANAGEMENT &nbsp;&nbsp;(Total Number=&nbsp;<?php echo $totalBM; ?>)</h2><br>  
        
        <?php

        // Retrieve subject details and apply sorting
        $query = "SELECT * FROM tblschedule WHERE course ='Bachelor of Science in Business Management'";
        $result = $db->query($query);

        // Generate HTML markup
        $html = '';
         while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $html .= "<tr>";
             $html .= "<td>{$row['schedID']}</td>";
            $html .= "<td>{$row['subject_code']}</td>";
            $html .= "<td>{$row['facultyname']}</td>";
            $html .= "<td>{$row['schedFrom']}</td>";
            $html .= "<td>{$row['schedTo']}</td>";
            $html .= "<td>{$row['schedDay']}</td>";
           
           $html .= "<td><a href='deleteSched.php?schedID={$row['schedID']}' class='btn btn-danger'onclick='return confirmDelete()'>Delete Schedule</a></td>"; 
            $html .= "</tr>";
        }
        ?>
        <thead>
        <tr>
            
            <th scope="col">Schedule ID</th>
            <th scope="col">Subject Code</th>
            <th scope="col">Name</th>
            
            <th scope="col">Schedule From</th>
            <th scope="col">Schedule To</th>
            <th scope="col">Day</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php echo $html; ?>
        </tbody>
    </table>

</div>
<hr>

<!-- HM -->
<div>           <?php

                    // Retrieve the total number of Subject HM
            $query = "SELECT COUNT(*) AS total FROM tblschedule WHERE course = 'Bachelor of Science in Hospitality Management'";
            $stmt = $db->prepare($query);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $totalHM = $row['total'];

                    ?>

    <table class="table">
        <h2>Hospitality MANAGEMENT &nbsp;&nbsp;(Total Number=&nbsp;<?php echo $totalHM; ?>)</h2><br>  
        <?php
        // Retrieve subject details and apply sorting
        $query = "SELECT * FROM tblschedule WHERE course ='Bachelor of Science in Hospitality Management'";
        $result = $db->query($query);

        // Generate HTML markup
        $html = '';
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $html .= "<tr>";
             $html .= "<td>{$row['schedID']}</td>";
            $html .= "<td>{$row['subject_code']}</td>";
            $html .= "<td>{$row['facultyname']}</td>";
            $html .= "<td>{$row['schedFrom']}</td>";
            $html .= "<td>{$row['schedTo']}</td>";
            $html .= "<td>{$row['schedDay']}</td>";
           
            $html .= "<td><a href='deleteSched.php?schedID={$row['schedID']}' class='btn btn-danger'onclick='return confirmDelete()'>Delete Schedule</a></td>";
            $html .= "</tr>";
        }
        ?>
        <thead>
        <tr>
            
            <th scope="col">Schedule ID</th>
            <th scope="col">Subject Code</th>
            <th scope="col">Name</th>
           
            <th scope="col">Schedule From</th>
            <th scope="col">Schedule To</th>
            <th scope="col">Day</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php echo $html; ?>
        </tbody>
    </table>
</div>
<hr>


</main>
<br>
  <!--  Footer -->
   <footer id="footer" style="text-align:center;">
    <div class="container">
      <div class="copyright">
        &copy;  <span><a href="#"><strong>MMC&nbsp;&nbsp;</strong></a></span>All Rights Reserved 2023
      </div>
      <div class="credits">
        
      </div>
    </div>
  </footer><!-- End  Footer -->


  
        <script>
                function confirmDelete() {
                    if (confirm("Are you sure you want to delete this schedule of faculty?")) {
                        return true; // Proceed with deletion
                    } else {
                        return false; // Cancel deletion
                    }
                }
            </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
        
        <script>
        function deleteRow(Id) {
            var confirmation = confirm("Are you sure you want to delete this student?");
            if (confirmation) {
                $.ajax({
                    url: "lists.php", // Replace with your server-side script URL
                    method: "POST",
                    data: { delete_student_id: Id },
                    success: function(response) {
                        // Refresh the table or update the page after successful deletion
                        // For example, you can reload the page to reflect the changes
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            }
        }
    </script>
        <script>
       /* function deleteRow(facultyId) {
            var confirmation = confirm("Are you sure you want to delete this faculty?");
            if (confirmation) {
                $.ajax({
                    url: "lists.php", // Replace with your server-side script URL
                    method: "POST",
                    data: { delete_faculty_id: facultyId },
                    success: function(response) {
                        // Refresh the table or update the page after successful deletion
                        // For example, you can reload the page to reflect the changes
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            }
        }*/
    </script>
</body>

</html>
<?php 
}else{
     header("Location: ../super/index.php");
     exit();
}
 ?>