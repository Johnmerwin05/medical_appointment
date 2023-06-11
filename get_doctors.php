<?php
include 'connection/database.php';

$query="SELECT doctor_name, doctor_specialization, doctor_location, doctor_phone FROM doctor";  
$connect=mysqli_query($conn,$query);  
$num=mysqli_num_rows($connect);


$doctors = [];
if ($num > 0) {
  while ($data = mysqli_fetch_assoc($connect)) {
    $doctors[] = [
        "name" => $data["doctor_name"],
        "specialization" => $data["doctor_specialization"],
        "location" => $data["doctor_location"],
        "phone" => $data["doctor_phone"],
      ];


  }}
echo json_encode($doctors);
$conn->close();
 
?>