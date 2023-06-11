<?php

// Establish database connection
include '../connection/database.php';

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the ID of the medicine from the POST request
$medicineId = $_POST['id'];

// Update the status of the medicine in the percription table
$update_query = "UPDATE percription SET status = 'Distributed' WHERE id = $medicineId";
$update_result = mysqli_query($conn, $update_query);

// Check if the update was successful
if ($update_result) {
    echo 'Success';
} else {
    echo 'Error: ' . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);

?>
