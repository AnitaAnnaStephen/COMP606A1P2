<!-- Save the bookings to database after necessary validations. -->
<?php
session_start();

if (isset($_POST["book"])) {
    require 'dbconnect.php';

    $serviceid = $_POST["id"];
    $email = $_POST['email'];
    $massagetype = $_POST["massagetype"];
    $duration = $_POST['duration'];
    $amount = $_POST['amount'];
    echo $bookeddate = $_POST['date'];
    $bookedtime = $_POST['time'];
    $msg = $_POST['message'];
    $employeeid = $_POST['therapist'];
    echo $today=date('Y-m-d');//getting current date
    //Checking if time slot is already booked for the therapist by another user
    $sql = "select * from bookings where BookingStatus<>'Cancelled' and employeeid=" . $employeeid . " and bookedtime='" . $bookedtime . "' and bookeddate='" . $bookeddate . "'";
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_num_rows($result);
    
    if ($row == 0) {//Checking if time slot is already booked by the same user
        $sql1 = "select * from bookings where BookingStatus<>'Cancelled' and email='" . $email . "' and bookedtime='" . $bookedtime . "' and bookeddate='" . $bookeddate . "'";
        $result1 = mysqli_query($mysqli, $sql1);
        $row1 = mysqli_num_rows($result1);
        if ($row1 == 0) {
            if($bookeddate=='0000-00-00' ||$bookeddate =='')
                {
                    $_SESSION['message'] = 'Please select a date!!';
                    header("Location: BookAppointment.php");
                }
             else if($bookeddate>=$today )//Checking if booking is a past date
                {
                    //Saving data to the database using SP
                    //spAddBooking inserts values to Bookings table
                    //Have 9 input parameters
                    $sqlsp = "CALL spAddBooking('$email', '$massagetype', $duration, $amount, '$msg', $serviceid, $employeeid, '$bookeddate','$bookedtime')"; // 
                    if (!$mysqli->query($sqlsp)) { //If SP execution failed.
                     $message = 'Failed to book';
                     echo ($mysqli->error);
                    }
                     else {
                        header("Location: BookingConfirm.php"); //redirecting to Home page                       
                        }
                }
           
                else
                {
                    $_SESSION['message'] = 'Cannot book for past dates!!';
                    header("Location: BookAppointment.php");
                }
                   
                
            
        } 
        else {
            $_SESSION['message'] = 'You Already Booked for this time slot!!';
            header("Location: BookAppointment.php");
             }
    } else {

        $_SESSION['message'] = 'Therapist unavailable!!';
        header("Location: BookAppointment.php");
            }
}
?>
