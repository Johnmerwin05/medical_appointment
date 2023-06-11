<?php
include '../connection/database.php';

$query = "SELECT medicine_name, dosage, frequency FROM medicine";  
$result = mysqli_query($conn, $query);  
$num_rows = mysqli_num_rows($result);

$medicines = [];
if ($num_rows > 0) {
  while ($data = mysqli_fetch_assoc($result)) {
    $medicines[] = [
        "medicine_name" => $data["medicine_name"],
        "dosage" => $data["dosage"],
        "frequency" => $data["frequency"]
    ];
  }
}

echo json_encode($medicines);

mysqli_close($conn);
 
?>