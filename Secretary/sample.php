<?php

require_once '../vendor/autoload.php';

use Twilio\Rest\Client;

include '../connection/database.php';

$id = $_GET['id'];

if ($conn) {

    //echo "Connection successfully";  
    }else{  
        echo "Error";  
    }  
    $query="SELECT name,phone,time_take FROM percription WHERE id = '$id'";  
    $connect=mysqli_query($conn,$query);  
    $num=mysqli_num_rows($connect);



if ($num > 0) {
    while ($data = mysqli_fetch_assoc($connect)) {
        $name = $data['name'];
        $phone = $data['phone'];
        $time_take = $data['time_take'];

        $hours = floor($time_take);
        $minutes = ($time_take - $hours) * 60;

        $time_format = date('H:i', strtotime("$hours:$minutes"));

        echo $time_format;
    }

    if (date('H:i') == $time_format) {
        $account_sid = "AC42f5c7b26ab5944af7591f5c5080fa10";
        $auth_token = "ee786d1d6a40f5e81f0df289f3aaf23f";
        $twilio_number = "+13205372280";
        $to = $phone;
        $message = "Dear $name,\n\n\n\n\n\n\n\n
         Thank you for trusitng us here at Pila Medical Center.\n\n\n\n
         This message will remind you to take your medicine now.\n\n
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
    }
}

?>