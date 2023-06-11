<?php

include '../../connection/database.php';

$id = $_GET['id'];


$query = mysqli_query($conn, "INSERT INTO appointments Select * FROM archive WHERE id = '$id'");
$query = mysqli_query($conn, "DELETE FROM archive WHERE id = '$id'");

echo "<script>window.location.href='../archive.php';</script>";


?>