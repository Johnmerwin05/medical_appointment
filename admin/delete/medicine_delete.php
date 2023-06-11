<?php 
include '../../connection/database.php';

 $id = $_GET['id'];

 $query = mysqli_query($conn, "DELETE FROM medicine WHERE id = '$id'");

 header('location: ../medicine.php?=1');

?>
