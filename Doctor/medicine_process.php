<?php
include '../connection/database.php';

    $medicine_name = $_POST['medicine_name'];
    $dosage = $_POST['dosage'];
    $quantity = $_POST['intake'];
    $frequency = $_POST['frequency'];
    $duration = $_POST['duration'];   
    
    $sqll = "SELECT medicine_name FROM medicine WHERE medicine_name = '$medicine_name'";
    $result = mysqli_query($conn, $sqll);

    if(mysqli_num_rows($result) > 0){
        
        echo "fail";

    }else {
        //insert form data into database
        $sql = "INSERT INTO medicine (quantity,medicine_name, dosage, frequency, duration)
        VALUES ('$quantity','$medicine_name', '$dosage', '$frequency','$duration')";
    
        if(mysqli_query($conn, $sql)){
            echo "success";
        } else {
            echo "error";
        }
    }
    
    mysqli_close($conn);
?>
