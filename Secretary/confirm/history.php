<?php

include '../../connection/database.php';

$id = $_GET['id'];


$query = mysqli_query($conn, "INSERT INTO active Select * FROM history WHERE id = '$id'");
$query = mysqli_query($conn, "DELETE FROM history WHERE id = '$id'");

echo "<script>window.location.href='../history.php';</script>";

?>