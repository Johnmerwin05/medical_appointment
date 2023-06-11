<?php

include '../../connection/database.php';

$id = $_GET['id'];


$query = mysqli_query($conn, "INSERT INTO appointments Select * FROM active WHERE id = '$id'");
$query = mysqli_query($conn, "DELETE FROM active WHERE id = '$id'");
$query = mysqli_query($conn, "DELETE FROM percription WHERE IDmo = '$id'");
$query = mysqli_query($conn, "DELETE FROM referral WHERE IDmo = '$id'");

echo "<script>window.location.href='../approved.php';</script>";


?>