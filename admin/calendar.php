<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['accountID'], $_SESSION['img_url'], $_SESSION['fname'], $_SESSION['bdate'], $_SESSION['middlename'], $_SESSION['address'], $_SESSION['cnum'], $_SESSION['lname'], $_SESSION['course'], $_SESSION['gender'])) {


    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=
    , initial-scale=1.0">
        <link rel="stylesheet" href="#">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link href="../assets/img/logo.png" rel="icon">
        <title>Calendar</title>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

        <style type="text/css">

             .active {
      background-color: red;
      color: white;
    }

    .days {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      gap: 10px;
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .days li {
      text-align: center;
    }
    .current-day {
  background-color: green; /* Example: Use a yellow background */
  font-weight: bolder; /* Example: Make the text bold */
  /* Add any other desired styles for the current day */
}
</style>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
                            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
                            crossorigin="anonymous"></script>
                            <h3 style="text-align:center;">**&nbsp; Basic  and Static Design&nbsp;**</h3>
<div class="container">
  <div class="month">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="#">&#10094;</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">&#10095;</a>
      </li>
      <li class="nav-item">
     <h2>   <span class="nav-link disabled" id="currentMonthYear"></span></h2>
      </li>
    </ul>
  </div>

  <table class="table calendar">
    <thead>
      <tr class="weekdays">
        <th>Sunday</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
        <th>Saturday</th>
      </tr>
    </thead>
    <tbody id="calendarBody">
      <!-- Calendar days will be dynamically added here -->
    </tbody>
  </table>
</div>

<!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

<script>
  // Get the current date
  var currentDate = new Date();

  // Get the year and month
  var year = currentDate.getFullYear();
  var month = currentDate.getMonth();

  // Set the current month and year in the HTML
  document.getElementById('currentMonthYear').textContent = new Intl.DateTimeFormat('en-US', { year: 'numeric', month: 'long' }).format(currentDate);

  // Get the number of days in the current month
  var daysInMonth = new Date(year, month + 1, 0).getDate();

  // Get the weekday of the first day of the month (e.g., 0 for Sunday)
  var firstDay = new Date(year, month, 1).getDay();

  // Get the "calendarBody" tbody element
  var calendarBody = document.getElementById('calendarBody');

  // Clear the existing content
  calendarBody.innerHTML = '';

  // Create a variable to keep track of the current day
  var dayCount = 1;

  // Create the calendar grid
  for (var i = 0; i < 6; i++) {
    var row = document.createElement('tr');

    for (var j = 0; j < 7; j++) {
      var cell = document.createElement('td');

      // Add the day number to the cell if within the current month's range
      if ((i === 0 && j >= firstDay) || (i > 0 && dayCount <= daysInMonth)) {
        cell.textContent = dayCount;
// Check if the day is the current day
if (dayCount === currentDate.getDate()) {
  cell.classList.add('active');
  cell.classList.add('current-day');
}

dayCount++;

      }

      row.appendChild(cell);
    }

    calendarBody.appendChild(row);
  }
</script>
    
</body>
</html>

<?php
} else {
  header("Location: ../admin/index.php");
  exit();
}
?>
