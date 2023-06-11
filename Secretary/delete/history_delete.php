<?php 
include '../../connection/database.php';

$id = $_GET['id'];

 $query = mysqli_query($conn, "DELETE FROM history WHERE id = '$id'");

 header('location: ../history.php?=1');

?>