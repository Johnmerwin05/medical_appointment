<?php
session_start();
if (!isset($_SESSION["email"]) || $_SESSION["email"] == false){

    header("Location: login-user.php");
    exit;
}

session_unset();
session_destroy();
header('location: ../index.html');
exit;
?>