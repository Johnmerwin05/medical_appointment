<?php
require_once '../vendor/autoload.php';

use Twilio\Rest\Client;

include '../connection/database.php';

    $IDmo = $_POST['IDmo'];
    $ticket = $_POST['ticket'];
    $bloodtype = $_POST['bloodtype'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $pulse = $_POST['pulse'];
    $temp = $_POST['temp'];
    $bmi = $_POST['bmi'];
    $bloodpressure = $_POST['bloodpressure'];
    $oxygensaturation = $_POST['oxygensaturation'];
    $info = $_POST['info'];
    
    $recomment1 = $_POST['recomment1']; 
    $name = $_POST['name']; 
    $age = $_POST['age']; 
    $datenow = $_POST['datenow']; 
    $medicine = $_POST['medicine']; 
    $intake = $_POST['intake']; 
    $dosage = $_POST['dosage']; 
    $frequency = $_POST['frequency']; 
    $time_take = $_POST['time_take']; 
    $from_date = $_POST['from_date']; 
    $to_date = $_POST['to_date']; 
    $recomment2 = $_POST['recomment2'];
    $phone = $_POST['phone'];
    $doctor = $_POST['doctor'];  

    $sqll = "SELECT ticket FROM percription WHERE ticket = '$ticket'";
    $result = mysqli_query($conn, $sqll);

    if(mysqli_num_rows($result) > 0){
        
        echo "fail";

    }else {

        $sql = "INSERT INTO percription (ticket,doctor,phone, IDmo, bloodtype, height, weight, bmi, bloodpressure, pulse, temp, oxygensaturation, info, recomment1, name, age, datenow, medicine, intake, dosage, frequency, time_take, from_date, to_date, recomment2  )
        VALUES ('$ticket','$doctor','$phone','$IDmo','$bloodtype', '$height', '$weight','$bmi','$bloodpressure', '$pulse', '$temp','$oxygensaturation', '$info' , '$recomment1' , '$name' , '$age' , '$datenow' , '$medicine' , '$intake' , '$dosage' , '$frequency' , '$time_take' , '$from_date' , '$to_date' , '$recomment2')";
    
        if(mysqli_query($conn, $sql)){

                $account_sid = "ACf63d5ddf506822e8fdf02159570f67e8";
                $auth_token = "04195d3e27ec8a42712c44a497dd9a22";
                $twilio_number = "+12282855472";
                $to = $phone;
                $message = "Dear $name,\n\n\n\n\n\n\n\n
                 Thank you for trusitng us here at Pila Medical Center.\n\n\n\n
                 This message will remind you to take your medicine Every $time_take hours. staring $from_date to $to_date\n\n
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
