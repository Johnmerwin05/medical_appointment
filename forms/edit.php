<?php
include '../connection/database.php';

    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $statuss = $_POST['statuss'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $region = $_POST['region'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $birthday = $_POST['birthday'];
    $age = $_POST['age'];

    //check connection
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

    $has_errors = false;

    // check if any form fields are empty or contain invalid data
if (empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["middlename"]) || empty($_POST["statuss"]) ||empty($_POST["email"]) ||empty($_POST["phone"]) || empty($_POST["region"]) ||empty($_POST["province"]) ||empty($_POST["city"]) ||empty($_POST["barangay"]) ||empty($_POST["birthday"]) ||empty($_POST["age"])) {
        $has_errors = true;
    }

    if ($has_errors) {
        echo "error";
        exit();
    }

    //insert form data into database
    $sql = "UPDATE usertable 
        SET firstname = '$firstname',
            lastname = '$lastname',
            middlename = '$middlename',
            statuss = '$statuss',
            email = '$email',
            phone = '$phone',
            region = '$region',
            province = '$province',
            city = '$city',
            barangay = '$barangay',
            birthday = '$birthday',
            age = '$age'
        WHERE id = '$id'";
    if(mysqli_query($conn, $sql)){
        echo "success";
    } else {
        echo "failed";
    }

    mysqli_close($conn);
?>
