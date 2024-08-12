<?php
include "db_conn.php";

// Retrieve the updated data from the database
$query = "SELECT * FROM useraccounts";
$result = $conn->query($query);

if ($result->num_rows > 0) {
  // Create an empty array to store the user data
  $data = array();

  // Fetch the data row by row
  while ($row = $result->fetch_assoc()) {
    // Add each row to the data array
    $data[] = $row;
  }

  // Convert the data array to JSON format
  $json_data = json_encode($data);

  // Return the JSON data as the AJAX response
  echo $json_data;
}

// Close the database connection
$conn->close();
?>
