<?php 
include '../../connection/database.php';

 $id = $_GET['id'];

 $query = mysqli_query($conn, "DELETE FROM contact1 WHERE id = '$id'");

 header('location: ../contact.php?=1');

?>
