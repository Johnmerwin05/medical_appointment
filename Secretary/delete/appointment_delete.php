<?php

include '../../connection/database.php';

$id = $_GET['id'];


$query = mysqli_query($conn, "INSERT INTO archive Select * FROM appointments WHERE id = '$id'");
$query = mysqli_query($conn, "DELETE FROM appointments WHERE id = '$id'");

echo "<script>window.location.href='../appointment.php';</script>";
?>