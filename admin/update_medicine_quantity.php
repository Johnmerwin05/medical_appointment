<?php

// Connect to the database
include '../connection/database.php';

// Get the medicine ID and intake from the POST data
$medicineId = $_POST['id'];
$intake = $_POST['intake'];

// Get the medicine name based on the ID
$medicine_query = "SELECT medicine from percription WHERE id = $medicineId";
$medicine_result = mysqli_query($conn, $medicine_query);
$medicine_data = mysqli_fetch_assoc($medicine_result);
$medicine_name = $medicine_data['medicine'];


// Update the quantity of the medicine based on the medicine name
$sql = "UPDATE medicine SET quantity = quantity - $intake  WHERE medicine_name = '$medicine_name'";
$result = mysqli_query($conn, $sql);

// Check if the update was successful
if ($result) {
  // Get the updated quantity
  $quantity_query = "SELECT quantity from medicine WHERE medicine_name = '$medicine_name'";
  $quantity_result = mysqli_query($conn, $quantity_query);
  $quantity_data = mysqli_fetch_assoc($quantity_result);
  $quantity = $quantity_data['quantity'];

  // Return the updated quantity
  echo $quantity;
} else {
  echo "Error updating the quantity of the medicine.";
}

// Close the database connection
mysqli_close($conn);

?>