<?php
session_start();
$user_name = $_SESSION['user_name'];

if ($_SESSION["status"] != true){
    header("Location: t/login.php");
}

include '../../connection/database.php';

//check if user is still logged in
$sql = "SELECT logouttime 
        FROM logs 
        WHERE user_name = '$user_name'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($row["logouttime"] === NULL) {
        $status = NULL;
    } else {
        $status = "Logged out";
    }
} else {
    $status = "User not found";
}

//update logouttime in logs table
$sql = "UPDATE logs 
        SET logouttime = " . ($status === NULL ? "NULL" : "NOW()") . "
        WHERE user_name = '$user_name'";

if(mysqli_query($conn, $sql)){
    session_unset();
    session_destroy();
    mysqli_close($conn);
    header("Location: index.php");
} else {
    echo "failed";
}


?>