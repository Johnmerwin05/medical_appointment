<?php
session_start();
$phone = $_SESSION['phone'];

require_once 'vendor/autoload.php';

use Twilio\Rest\Client;

include 'connection/database.php';

if ($conn) {

    //echo "Connection successfully";  
    }else{  
        echo "Error";  
    }  
    $query="SELECT name FROM appointments WHERE phone = '$phone'";  
    $connect=mysqli_query($conn,$query);  
    $num=mysqli_num_rows($connect);



if ($num > 0) {
    while ($data = mysqli_fetch_assoc($connect)) {
        $name = $data['name'];


    $account_sid = "ACf63d5ddf506822e8fdf02159570f67e8";
    $auth_token = "04195d3e27ec8a42712c44a497dd9a22";
    $twilio_number = "+12282855472";
    $to = $phone;
    $message = "Dear $name,\n\n\n\n\n\n\n\n
     Thank you for making an appointment with us at Pila Medical Center. We appreciate your trust in us to provide you with quality medical care.\n\n
    Your appointment is an important step towards your well-being and we are committed to ensuring that you have a positive experience at our center. Our team of highly skilled medical professionals will work with you to provide the best possible care.
     \n\nPlease arrive at our center 10 minutes before your scheduled appointment time to allow for a smooth check-in process. If you have any questions or concerns, please don't hesitate to reach out to us.
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

    header("Location: ../appointment.php");

    }
}
