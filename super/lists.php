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

    <link rel="stylesheet" href="css/list.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>List of Accounts</title>

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
    <main id="list">
    <div class="accordion  m-4 p-1" id="accordionFlushExample">
        <h1 class="m-1">COURSES</h1>
        <div class="accordion-item mt-4">

            <!-- STUDENTS --><?php if (isset($_GET['error'])) { ?>
                            <p style="color:green;  "class="error"><?php echo $_GET['error']; ?></p>
                            <?php } ?>   
            <h2 class="accordion-header">
                <button class="accordion-button collapsed mt-2 p-4 text-bg-danger  fs-2" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            <?php
            // Connect to the database
                $connection = mysqli_connect('localhost', 'root', '', 'db_enroll');

                    // Retrieve the total number of students
                $query = "SELECT COUNT(*) AS total FROM students";
                $result = mysqli_query($connection, $query);

                // Get the total count
                    $row = mysqli_fetch_assoc($result);
                $totalStudents = $row['total'];

                // Close the database connection
                    mysqli_close($connection);
                    ?>
                   STUDENTS&nbsp;=&nbsp;<?php echo $totalStudents; ?>
                </button> 

                <?php
                    // Connect to the database (example assuming MySQL)
                $connection = mysqli_connect('localhost', 'root', '', 'db_enroll');

                      // Delete the row if the faculty ID is provided
                            if (isset($_POST['delete_student_id'])) {
                        $studentId = $_POST['delete_student_id'];
                        $deleteQuery = "DELETE FROM students WHERE id = '$studentId'";
                mysqli_query($connection, $deleteQuery);
                        }

                // Retrieve sorting option from the dropdown menu
                    $sorting = isset($_GET['sort']) ? $_GET['sort'] : 'accountID';

                    // Define the column to use for sorting
                    $sortColumn = '';
                    switch ($sorting) {
                        case 'last_name':
                            $sortColumn = 'lname';
                            break;
                        case 'course':
                            $sortColumn = 'course';
                            break;
                        default:
                                    $sortColumn = 'accountID';
                                    break;
                            }

                            // Retrieve student details and apply sorting
                            $query = "SELECT * FROM students ORDER BY $sortColumn";
                            $result = mysqli_query($connection, $query);

                            // Generate HTML markup
                            $html = '';
                            while ($row = mysqli_fetch_assoc($result)) {
                                $html .= "<tr>";
                                $html .= "<td>{$row['accountID']}</td>";
                                $html .= "<td>{$row['lname']}</td>";
                                $html .= "<td>{$row['middlename']}</td>";
                                $html .= "<td>{$row['fname']}</td>";
                                $html .= "<td>{$row['course']}</td>";
                                $html .= "<td>{$row['year']}</td>";
                                $html .= "<td>{$row['semester']}</td>";
                                $html .= "<td><a href='deleteStud.php?id={$row['id']}' class='btn btn-danger'onclick='return confirmDelete()'>Drop Student</a></td>";
                                $html .= "</tr>";
                            }

                            // Close the database connection
                            mysqli_close($connection);
                            ?>

            </h2><div>
        
            <div id="flush-collapseOne" class="accordion-collapse collapse  " data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
        <table id="students">
        
         <label for="sort">Sort By:</label>
        <select name="sort" id="sort" onchange="this.form.submit()">
            <option value="student_number" <?php if ($sorting === 'accountID') echo 'selected'; ?>>Student Number</option>
            <option value="last_name" <?php if ($sorting === 'lname') echo 'selected'; ?>>Last Name</option>
            <option value="course" <?php if ($sorting === 'course') echo 'selected'; ?>>Course</option>
        </select>
            </div>
                <thead>
                    <tr>
                        <th>Student no.</th>
                        <th>Last Name</th>
                        <th>Middle Name</th>
                        <th>First Name</th>
                        <th>Course</th>
                        <th>Year</th>
                        <th>Semester</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $html; ?>
                </tbody>
            </table>
                </div>
            </div>
        </div>



       <!-- FACULTY -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed mt-2 p-4 text-bg-warning fs-2" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                   <?php
                // Connect to the database (example assuming MySQL)
                $connection = mysqli_connect('localhost', 'root', '', 'db_enroll');

                // Retrieve the total number of students
                    $query = "SELECT COUNT(*) AS total FROM faculty";
                    $result = mysqli_query($connection, $query);

// Get the total count
$row = mysqli_fetch_assoc($result);
$totalfaculty = $row['total'];

// Close the database connection
mysqli_close($connection);
?>
                   FACULTY&nbsp;=&nbsp;<?php echo $totalfaculty; ?>
                </button>
                <?php
// Connect to the database (example assuming MySQL)
$connection = mysqli_connect('localhost', 'root', '', 'db_enroll');

// Delete the row if the faculty ID is provided
if (isset($_POST['delete_faculty_id'])) {
    $facultyId = $_POST['delete_faculty_id'];
    $deleteQuery = "DELETE FROM faculty WHERE faculty_id = '$facultyId'";
    mysqli_query($connection, $deleteQuery);
}

// Retrieve sorting option from the dropdown menu
$sorting = isset($_GET['sort']) ? $_GET['sort'] : 'faculty_id';

// Define the column to use for sorting
$sortColumn = '';
switch ($sorting) {
    case 'lname':
        $sortColumn = 'lname';
        break;
    case 'course':
        $sortColumn = 'course';
        break;
    default:
        $sortColumn = 'faculty_id';
        break;
}

// Retrieve student details and apply sorting
$query = "SELECT * FROM faculty ORDER BY $sortColumn";
$result = mysqli_query($connection, $query);


// Generate HTML markup
$html = '';
while ($row = mysqli_fetch_assoc($result)) {
    $html .= "<tr>";
    $html .= "<td>{$row['faculty_id']}</td>";
    $html .= "<td>{$row['lname']}</td>";
    $html .= "<td>{$row['middlename']}</td>";
    $html .= "<td>{$row['fname']}</td>";
    $html .= "<td>{$row['course']}</td>";
    $html .= "<td>{$row['email']}</td>";
    $html .= "<td>;</td>";
    $html .= "<td>{$row['cnum']}</td>";
    $html .= "<td><button class= 'btn btn-danger' onclick=\"deleteRow({$row['faculty_id']})\">Delete Faculty</button></td>";
    $html .= "</tr>";
}

// Close the database connection
mysqli_close($connection);
?>

            </h2><div>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
            <table id="students">
                <label for="sort">Sort By:</label>
        <select name="sort" id="sort" onchange="this.form.submit()">
            <option value="student_number" <?php if ($sorting === 'faculty_id') echo 'selected'; ?>>Faculty</option>
            <option value="last_name" <?php if ($sorting === 'lname') echo 'selected'; ?>>Last Name</option>
            <option value="course" <?php if ($sorting === 'course') echo 'selected'; ?>>Course</option>
        </select></div>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Last Name</th>
                        <th>Middle Name</th>
                        <th>First Name</th>
                        <th>Department</th>
                        <th>Email</th>
                        <th></th>
                        <th>Contact Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $html; ?>
                </tbody>
            </table>
                </div>
            </div>
        </div>
                </div>
            </div>
        </div>
    </div>

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
                function confirmDelete() {
                    if (confirm("Are you sure you want to drop this student?")) {
                        return true; // Proceed with deletion
                    } else {
                        return false; // Cancel deletion
                    }
                }
            </script>


        <script>
        function deleteRow(facultyId) {
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
        }
    </script>
</body>

</html>
<?php 
}else{
     header("Location: ../super/index.php");
     exit();
}
 ?>