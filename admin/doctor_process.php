<?php
require_once '../vendor/autoload.php';

use Twilio\Rest\Client;
 
include '../connection/database.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_FILES['profile']) && isset($_FILES['logo']) && isset($_FILES['E_signature'])) {
    $profile = $_FILES['profile']['name'];
    $logo = $_FILES['logo']['name'];
    $E_signature = $_FILES['E_signature']['name'];

  
    // Check if file uploads were successful
    if ($_FILES['profile']['error'] !== UPLOAD_ERR_OK || $_FILES['logo']['error'] !== UPLOAD_ERR_OK || $_FILES['E_signature']['error'] !== UPLOAD_ERR_OK) {
        echo "file_upload_error";
        exit;
    }

    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!in_array($_FILES['profile']['type'], $allowedTypes) || !in_array($_FILES['logo']['type'], $allowedTypes) || !in_array($_FILES['E_signature']['type'], $allowedTypes)) {

            echo "file_upload_error";
            exit;
        }

    // Move uploaded files to a desired directory
    $targetDir = 'uploads/';
    if (!move_uploaded_file($_FILES['profile']['tmp_name'], $targetDir . $profile) || !move_uploaded_file($_FILES['logo']['tmp_name'], $targetDir . $logo) || !move_uploaded_file($_FILES['E_signature']['tmp_name'], $targetDir . $E_signature)) {
        echo "file_upload_error";
        exit;
    }


    $doctor_name = $_POST['doctor_name'];
    $doctor_license = $_POST['doctor_license'];
    $doctor_specialization = $_POST['doctor_specialization'];
    $doctor_location = $_POST['doctor_location'];
    $doctor_phone = $_POST['doctor_phone'];
    $doctor_gender = $_POST['doctor_gender'];
    $doctor_email = $_POST['doctor_email'];
    $info = $_POST['info'];    


    $sqll = "SELECT doctor_name FROM doctor WHERE doctor_name = '$doctor_name'";
    $result = mysqli_query($conn, $sqll);

    if(mysqli_num_rows($result) > 0){
        
        echo "fail";

    }else {
        //insert form data into database
        $sql = "INSERT INTO doctor (doctor_license, E_signature, profile, logo, doctor_name, doctor_specialization, doctor_location, doctor_phone, doctor_gender, doctor_email, info)
        VALUES ('$doctor_license','$E_signature','$profile', '$logo', '$doctor_name', '$doctor_specialization', '$doctor_location','$doctor_phone','$doctor_gender','$doctor_email','$info')";
    
        if(mysqli_query($conn, $sql)){
            
            $account_sid = "ACf63d5ddf506822e8fdf02159570f67e8";
            $auth_token = "04195d3e27ec8a42712c44a497dd9a22";
            $twilio_number = "+12282855472";
            $to = $doctor_phone;
            $message = "Dear $doctor_name,\n\n\n\n\n\n\n\n
                Thank you for trusitng us here at Pila Medical Center.\n\n\n\n
                This message will announce that you are now member of Pila Medical Center.\n\n
                \n\nThank you again for choosing Pila Medical Center for your healthcare needs. We look forward to serving you soon.
                \n\n\n\nBest regards,
                \nThe Pila Medical Center Team";
        
            $client = new Client($account_sid, $auth_token);
        
            $message = $client->messages->create(
                $to,
                array(
                    "from" => $twilio_number,
                    "body" => $message
                )
            );
            echo "success";
        } else {
            echo "error";
        }
    }
    
    mysqli_close($conn);
}
}
?>
