<?php 
include '../../connection/database.php';

$id = $_GET['id'];

 $query = mysqli_query($conn, "DELETE FROM doctor WHERE id = '$id'");

 header('location: ../doctor.php?=1');

?>