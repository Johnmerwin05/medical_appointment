<?php
include '../connection/database.php';

    $pages = range(10000,100000);
    shuffle($pages);
    $page = array_shift($pages);
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $department = $_POST['department'];   
    $doctor = $_POST['doctor'];
    $clinic_loc = $_POST['clinic_loc'];   
    $contact = $_POST['contact'];   
    $date = $_POST['date'];
    $time = $_POST['time'];
    $message = $_POST['message']; 
    $doctor_contact = $_POST['contact']; 
       
    
    $sqll = "SELECT phone FROM active WHERE phone = '$phone'";
    $result = mysqli_query($conn, $sqll);

    if (empty($_POST["doctor"]) || empty($_POST["date"]) || empty($_POST["time"])) {

        echo "error";

    }else if(mysqli_num_rows($result) > 0){
        
        echo "fail";

    }else {
        //insert form data into database
        $sql = "INSERT INTO appointments (doctor_contact, name, ticket, gender, province, city,barangay, age, phone, email, department, doctor, clinic_loc, contact, date, time, message)
        VALUES ('$doctor_contact','$name','$page', '$gender', '$province', '$city', '$barangay', '$age', '$phone', '$email', '$department', '$doctor', '$clinic_loc', '$contact', '$date','$time', '$message')";
    
        if(mysqli_query($conn, $sql)){
            session_start();
            $_SESSION['phone'] = $phone;
            echo "success";
        } else {
            echo "error";
        }
    }
    
    mysqli_close($conn);
?>
