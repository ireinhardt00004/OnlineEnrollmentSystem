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
    <title>Message Inbox</title>

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


<br><br>
<h2 style="text-align:center;">MESSAGE INBOX</h2>
<br><?php if (isset($_GET['error'])) { ?>
                            <p style="color:red;  "class="error"><?php echo $_GET['error']; ?></p>
                            <?php } ?>
<br>

<?php
// Connect to the database (replace with your own credentials)
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'db_enroll';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Retrieve the messages from the database
$query = "SELECT *  FROM contact";
$result = $conn->query($query);

// Check if there are any messages
if ($result->num_rows > 0) {
    ?>
    <table class="table table-bordered">
        <thead>
            <tr>

                <th>Timestamp</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Output data of each row
            $html = ''; // Initialize the $html variable
            while ($row = $result->fetch_assoc()) {
                $html .= "<tr>";
                $html .= "<td>" . $row['timestamp'] . "</td>";
               $html .= "<td>" . $row['name'] . "</td>";
				$html .= "<td>" . $row['email'] . "</td>";
				$html .= '<td><button class="btn btn-primary" data-toggle="modal" data-target="#messageModal" onclick="openModal(\'' . $row['contact_id'] . '\')">Read</button></td>';
					$html .= "<td><a href='deleteContact.php?contact_id={$row['contact_id']}' class='btn btn-danger' onclick='return confirmDelete()'>Delete Message</a></td>";
					$html .= "</tr>";


            }
            echo $html;
            ?>
        </tbody>
    </table>
    <?php

    // Close the database connection
    $conn->close();
} else {
    echo "No messages found.";
}
?>
   <script>
    function openModal(contact_id) {
        // Fetch the message details from the server using contact_id
        fetch('get_message.php?contact_id=' + contact_id)
            .then(response => response.json())
            .then(data => {
                // Update the modal content with the fetched data
                document.getElementById('modalName').textContent = data.name;
                document.getElementById('modalEmail').textContent = data.email;
                document.getElementById('modalTimestamp').textContent = data.timestamp;
                document.getElementById('modalSubject').textContent = data.subject;
                document.getElementById('modalMessage').textContent = data.message;
            })
            .catch(error => console.error('Error:', error));
    }
</script>

</body>
</main>

<!-- Modal -->
  <!-- Add a modal HTML structure -->
<div id="messageModal" class="modal modal-centered">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Message</h4>
        <button type="button" class="close" data-dismiss="modal" >&times;</button>
      </div>
      
    <!-- Modal Body -->
<div class="modal-body">
    <div id="messageDetails"><br>
        Sender:<p style="color: black; font-weight: bold;" id="modalName"></p><br>
        Email:<p style="color: black; font-weight: bold;"id="modalEmail"></p><br>
        DateTime:<p id="modalTimestamp"></p><br>
        <hr>
        Subject:<p id="modalSubject"></p><br>
        Message:<p id="modalMessage"></p>
        <hr>
    </div>
</div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

 

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
                    if (confirm("Are you sure you want to delete this message?")) {
                        return true; // Proceed with deletion
                    } else {
                        return false; // Cancel deletion
                    }
                }
            </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
        

    

</html>
<?php 
}else{
     header("Location: ../super/index.php");
     exit();
}
 ?>