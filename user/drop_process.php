<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $studentId = $_POST['studentId'];
    $courseCode = $_POST['courseCode'];
   $dropped = ($_POST['dropped']);

    $course = $_POST['course'];

    // Perform necessary validations on the input data

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "db_enroll");

    // Check the database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $updateQuery = "UPDATE student_courses SET action = 'dropped' WHERE student_id = '$studentId' AND subject_code = '$courseCode' AND course = '$course'";
    // Execute the query
    if ($conn->query($updateQuery) === TRUE) {
        // Display success message
       echo '<script>alert("Course added successfully!");</script>';
    header("Location: course.php?msg=Course Dropped Successfully");
    } else {
        // Display error message
        echo "Error dropping course: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to the appropriate page if accessed directly without form submission
    header("Location: course.php");
    exit();
}
?>
