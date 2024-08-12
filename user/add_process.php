<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $studentId = $_POST['studentId'];
    $courseCode = $_POST['courseCode'];
    $subject_name = $_POST['subject_name'];
    $year = $_POST['year'];
    $course = $_POST['course'];
    $semester = $_POST['semester'];
    $lecture = $_POST['lecture'];
    $lab = $_POST['lab'];

    // Perform necessary validations on the input data

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "db_enroll");

    // Check the database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Build the SQL query to insert the row
    $InsertQuery = "INSERT INTO student_courses (student_id, subject_code, subject_name,subject_year, course,subject_semester, lecture, lab, action) VALUES ('$studentId', '$courseCode','$subject_name','$year','$course','$semester','$lecture','$lab','update')";

    // Execute the query
    if ($conn->query($InsertQuery) === TRUE) {
        // Display success message
       echo '<script>alert("Course added successfully!");</script>';
    header("Location: course.php?msg=Course Added Successfully");
    } else {
        // Display error message
        echo "Error Adding course: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to the appropriate page if accessed directly without form submission
    header("Location: course.php");
    exit();
}
?>
