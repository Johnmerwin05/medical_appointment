<?php
require_once '../vendor/autoload.php';

use Twilio\Rest\Client;
include '../connection/database.php';

    $name = $_POST['name'];
    $ticket = $_POST['ticket'];
    $IDmo = $_POST['IDmo'];
    $phone = $_POST['phone'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $ref_doctorname = $_POST['ref_doctorname'];
    $ref_clinic = $_POST['ref_clinic'];
    $ref_phone = $_POST['ref_phone'];
    $ref_email = $_POST['ref_email'];   
    $ref_reason = $_POST['ref_reason'];
    $doctor = $_POST['doctor']; 
    
    $sqll = "SELECT ticket FROM referral WHERE ticket = '$ticket'";
    $result = mysqli_query($conn, $sqll);

    if(mysqli_num_rows($result) > 0){
        
        echo "fail";

    }else {
        //insert form data into database
        $sql = "INSERT INTO referral (ticket, doctor, IDmo,name, phone, province, city, barangay,  ref_doctorname, ref_clinic, ref_phone, ref_email, ref_reason)
        VALUES ('$ticket','$doctor','$IDmo','$name', '$phone', '$province', '$city', '$barangay','$ref_doctorname', '$ref_clinic', '$ref_phone','$ref_email','$ref_reason')";
    
        if(mysqli_query($conn, $sql)){
            
            $account_sid = "ACf63d5ddf506822e8fdf02159570f67e8";
            $auth_token = "04195d3e27ec8a42712c44a497dd9a22";
            $twilio_number = "+12282855472";
            $to = $ref_phone;
            $message = "Dear $ref_doctorname,\n\n\n\n\n\n\n\n
            Thank you for trusitng us here at Pila Medical Center.\n\n\n\n
            The purpose of this message is to inform you that $doctor referring you the patient name $name for further evaluation of $doctor\n\n
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
?>
