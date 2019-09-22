<!-- This page saves the data entered by user in to the database after required validations -->
<?php

session_start();

if (isset($_POST['edit'])) {
    require 'dbconnect.php'; //Establishing connection with database
    $bookeddate = $massagetype = $bookedtime = $therapist = $message = '';
    //Retreiving values sent by http post method
    $bookeddate = $_POST['BookedDate'];
    $bookedtime = $_POST['time'];
    $therapist = $_POST['employee'];
    $bookingid = $_SESSION['Id'];
    $today = date('Y/m/d'); //getting current date
    $serviceid = $_POST['MassageType'];
    $message = $_POST['message'];
    $sql1 = "select * from services where serviceid=" . $serviceid;
    $result = mysqli_query($mysqli, $sql1);
    $row = mysqli_fetch_array($result);
    $s = $row['ServiceId'];
    $m = $row['MassageType'];
    $d = $row['Duration'];
    $a = $row['Amount'];
    $e =  $_SESSION['username'];
    $firstTherapist = $_POST['firstTherapist'];
    $firstDate = $_POST['firstDate'];
    $firstTime = $_POST['firstTime'];
    $firstMassageType = $_POST['firstMassageType'];

    $todate = date('Y-m-d'); //getting current date

    //checking if any fields are changed
    if ($firstTherapist == $therapist && $firstDate == $bookeddate && $firstTime == $bookedtime && $firstMassageType == $serviceid) {
        $sqlup = "UPDATE Bookings SET MessageforTherapist='$message'
                     WHERE BookingId='$bookingid'";
        if (!$mysqli->query($sqlup)) { //If query execution failed.
            $_SESSION['messages'] = 'Failed to update';
            echo ($mysqli->error);
        } else {
            $_SESSION['messages'] = 'Record updated successfully!!';
            header("Location: UserHome.php"); //redirecting to Home page                       
        }
    } else {
        //Checking if time slot is already booked for the therapist by another user

        $sql = "select * from bookings where BookingStatus<>'Cancelled' and employeeid=" . $therapist . " and bookedtime='" . $bookedtime . "' and bookeddate='" . $bookeddate . "'";
        $result = mysqli_query($mysqli, $sql);
        $row = mysqli_num_rows($result);

        if ($row == 0) { //Checking if time slot is already booked by the same user
            $sql1 = "select * from bookings where BookingStatus<>'Cancelled' and email='" . $e . "' and serviceid=" . $s . " and bookedtime='" . $bookedtime . "' and bookeddate='" . $bookeddate . "'";
            $result1 = mysqli_query($mysqli, $sql1);
            $row1 = mysqli_num_rows($result1);
            if ($row1 == 0) {
                if ($bookeddate == '0000-00-00' || $bookeddate == '') //Checking if date is selected
                {
                    $_SESSION['message'] = 'Please select a date!!';
                    header("Location: BookAppointment.php");
                } else if ($bookeddate >= $todate) //Checking if booking is a past date
                {
                    $sqlup = "UPDATE Bookings SET MassageType='$m',BookedDate='$bookeddate', Bookedtime='$bookedtime',
                     Duration=$d, Amount=$a, ServiceId=$s, EmployeeId=$therapist,MessageforTherapist='$message'
                     WHERE BookingId='$bookingid'";
                    if (!$mysqli->query($sqlup)) { //If query execution failed.
                        $_SESSION['messages'] = 'Failed to update';
                        echo ($mysqli->error);
                    } else {
                        $_SESSION['messages'] = 'Record updated successfully!!';
                        header("Location: UserHome.php"); //redirecting to Home page                       
                    }
                } else {
                    $_SESSION['messages'] = 'Cannot book for past dates!!';
                    header("Location: UserHome.php");
                }
            } else {
                $_SESSION['messages'] = 'You Already Booked for this time slot!!';
                header("Location: UserHome.php");
            }
        } else {

            $_SESSION['messages'] = 'Therapist unavailable!!';
            header("Location: UserHome.php");
        }
    }
}

?>