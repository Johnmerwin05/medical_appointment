<?php
require_once 'vendor/autoload.php';

use Twilio\Rest\Client;

include 'connection/database.php';

$email = $_GET['email'];

if ($conn) {

    //echo "Connection successfully";  
    }else{  
        echo "Error";  
    }  
    $query="SELECT phone FROM usertable WHERE email = '$email'";  
    $connect=mysqli_query($conn,$query);  
    $num=mysqli_num_rows($connect);



if ($num > 0) {
    while ($data = mysqli_fetch_assoc($connect)) {


    $account_sid = "ACf63d5ddf506822e8fdf02159570f67e8";
    $auth_token = "04195d3e27ec8a42712c44a497dd9a22";
    $twilio_number = "+12282855472";
    $to = $data['phone'];
    $message = "Thank you for registering at Pila Medical Center.\n\n
     We appreciate your trust in us to provide you with quality medical care.
     \n\nYour registration allows us to keep your medical records up-to-date and make the check-in process smoother for you on future visits. If you have any questions or concerns, please don't hesitate to reach out to us.
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

?>