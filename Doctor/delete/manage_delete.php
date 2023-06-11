<?php 
include '../../connection/database.php';

 $ticket = $_GET['ticket'];

 $query = mysqli_query($conn, "INSERT INTO percription_data Select * FROM percription WHERE ticket = '$ticket'");
 $query = mysqli_query($conn, "INSERT INTO referral_data Select * FROM referral WHERE ticket = '$ticket'");
 $query = mysqli_query($conn, "INSERT INTO history Select * FROM active WHERE ticket = '$ticket'");
 $query = mysqli_query($conn, "DELETE FROM percription WHERE ticket = '$ticket'");
 $query = mysqli_query($conn, "DELETE FROM referral WHERE ticket = '$ticket'");
 $query = mysqli_query($conn, "DELETE FROM active WHERE ticket = '$ticket'");

 header('location: ../manage.php?=1');
?>
