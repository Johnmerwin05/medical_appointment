<?php
include '../connection/database.php';

    $id = $_POST['id'];
    $quantity = $_POST['quantity'];

    //insert form data into database
    $sql = "UPDATE medicine 
        SET quantity = quantity + $quantity WHERE id = '$id'";
    if(mysqli_query($conn, $sql)){
        echo "success";
    } else {
        echo "failed";
    }

    mysqli_close($conn);
?>
