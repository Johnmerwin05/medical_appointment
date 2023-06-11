<?php

include '../../connection/database.php';

$id = $_GET['id'];


$query = mysqli_query($conn, "INSERT INTO history Select * FROM active WHERE id = '$id'");
$query = mysqli_query($conn, "DELETE FROM active WHERE id = '$id'");

echo "<script>window.location.href='../approved.php';</script>";
?>