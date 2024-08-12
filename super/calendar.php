<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['accountID'], $_SESSION['img_url'], $_SESSION['fname'], $_SESSION['bdate'], $_SESSION['middlename'], $_SESSION['address'], $_SESSION['cnum'], $_SESSION['lname'], $_SESSION['course'], $_SESSION['year'], $_SESSION['gender'], $_SESSION['category'])) {
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Calendar</title>
   <link rel="stylesheet" type="text/css" href="../assets/css/calendar.css">
   <link href="../assets/img/alphabet-m-icon.png" rel="icon">
   <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

   <!--link of bootstrap CDN -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.8/fullcalendar.min.css" />

   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

</head>
<body>
  <div class="sidebar">
    <header>FacultyID: <?php echo $_SESSION['accountID']; ?></header>
    <ul>
      <li><a href="../admin/index.php" onclick="updatePage()"><i class="fas fa-qrcode"></i>Overview</a></li>
      <li><a href="../admin/edit.php"><i class="fas fa-sliders-h"></i>Edit Information</a></li>
      <li><a href="#"><i class="fas fa-stream"></i>Courses</a></li>
      <li><a href="../admin/calendar.php"><i class="fas fa-calendar-week"></i>Calendar</a></li>
      <li><a href="#"><i class="fas fa-question-circle"></i>Grades</a></li>
      <li><a href="../admin/settings.php"><i class="fas fa-link"></i>Settings</a></li>
      li><a href="../admin/contact.php"><i class="fas fa-envelope"></i>Contact Us</a></li>
      <li class="nic"><a href="../database/logout.php"><span class="material-symbols-outlined">logout</span>Logout</a></li>
    </ul>
  </div>
<h3 style="text-align:center;">**&nbsp; Basic  and Simple Design Only &nbsp;**</h3>
  <div class="con">
    <div id="calendar"></div>
    <textarea id="notes"></textarea>
  </div>
  <script src="https://cdn.tiny.cloud/1/kno0asxryk6vpzgv7jpthslqd672mt0p4lr1yswp04yka339/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: [
          {
            title: 'Event 1',
            start: '2023-06-01',
            end: '2023-06-02'
          },
          {
            title: 'Event 2',
            start: '2023-06-05'
          }
        ]
      });

      calendar.render();
    });

    tinymce.init({
      selector: '#notes',
      plugins: 'advlist autolink lists link image',
      toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image'
    });
  </script>
</body>
</html>

<?php
} else {
  header("Location: ../admin/index.php");
  exit();
}
?>
