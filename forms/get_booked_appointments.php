<?php

if (isset($_POST['doctor']) && isset($_POST['date'])) {
    // Get the selected department, doctor, and date
    $selected_doctor = $_POST['doctor'];
    $selected_date = $_POST['date'];

    include '../connection/database.php';

    // Example query to get the booked appointments for the selected department, doctor, and date
    $query1 = "SELECT time FROM appointments WHERE doctor = '$selected_doctor' AND date = '$selected_date'";
    $query2 = "SELECT time FROM active WHERE doctor = '$selected_doctor' AND date = '$selected_date'";
    $result1 = mysqli_query($conn, $query1);
    $result2 = mysqli_query($conn, $query2);

    // Example code to store the booked appointments in an array
    $booked_appointments = array();
    while ($row = mysqli_fetch_assoc($result1)) {
        $booked_appointments[] = $row['time'];
    }
    while ($row = mysqli_fetch_assoc($result2)) {
        $booked_appointments[] = $row['time'];
    }

    // Example code to return the booked appointments as a JSON object
    echo json_encode($booked_appointments);
}

?>