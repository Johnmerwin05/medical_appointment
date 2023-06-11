<?php

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "medical_clinic";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}