<?php
session_start();

if (isset($_POST["book"])) {
    require 'dbconnect.php';

    $serviceid = $_POST["id"];
    $email = $_POST['email'];
    $massagetype = $_POST["massagetype"];
    $duration = $_POST['duration'];
    $amount = $_POST['amount'];
    $bookeddate = $_POST['date'];
    $bookedtime = $_POST['time'];
    $msg = $_POST['message'];
    $employeeid = $_POST['therapist'];
    //Checking if time slot is already booked for the therapist by another user
    $sql = "select * from bookings where BookingStatus<>'Cancelled' and employeeid=" . $employeeid . " and bookedtime='" . $bookedtime . "' and bookeddate='" . $bookeddate . "'";
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_num_rows($result);
    echo $row;
    if ($row == 0) {//Checking if time slot is already booked by the same user
        $sql1 = "select * from bookings where BookingStatus<>'Cancelled' and email='" . $email . "' and serviceid=" . $serviceid . " and bookedtime='" . $bookedtime . "' and bookeddate='" . $bookeddate . "'";
        $result1 = mysqli_query($mysqli, $sql1);
        $row1 = mysqli_num_rows($result1);
        if ($row1 == 0) {
            //Saving data to the database using SP
            //spAddBooking inserts values to Bookings table
            //Have 9 input parameters
            $sqlsp = "CALL spAddBooking('$email', '$massagetype', $duration, $amount, '$msg', $serviceid, $employeeid, '$bookeddate','$bookedtime')"; // 
            if (!$mysqli->query($sqlsp)) { //If SP execution failed.
                $message = 'Failed to book';
                echo ($mysqli->error);
            } else {
                header("Location: UserHome.php"); //redirecting to Home page                       
            }
        } else {
            $_SESSION['message'] = 'Already Booked!!';
            header("Location: BookAppointment.php");
        }
    } else {

        $_SESSION['message'] = 'Therapist unavailable!!';
        header("Location: BookAppointment.php");
    }
}
