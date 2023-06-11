<?php 
include '../../connection/database.php';

$id = $_GET['id'];

 $query = mysqli_query($conn, "DELETE FROM archive WHERE id = '$id'");

 header('location: ../archive.php?=1');

?>