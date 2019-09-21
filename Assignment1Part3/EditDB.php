<!-- This page saves the data entered by user in to the database after required validations -->
<?php
$message='';
if (isset($_POST['edit']))
{
    require 'dbconnect.php';//Establishing connection with database
    $bookingdate=$massagetype=$bookingtime=$therapist='';
    //Retreiving values sent by http post method
    $bookingdate=$_POST['BookingDate'];
    $massagetype=$_POST['MassageType'];
    //$bookingtime=$_POST['BookingTime'];
    $therapist=$_POST['employee'];
    $bookingid=$_GET["id"];
    $today=date('Y/m/d');//getting current date
    
        //Checking if the email already exists in the database
      //  $sql="UPDATE Bookings SET MassageType='$massagetype',BookingDate='$bookingdate',BookingTime=$bookingtime,EmployeeId=$therapist
       // WHERE BookingId='$bookingid'";
        $sql="UPDATE Bookings SET MassageType='$massagetype',BookingDate='$bookingdate',EmployeeId=$therapist
        WHERE BookingId='$bookingid'";
        //$result=mysqli_query($mysqli,$sql);
        if ($mysqli->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $mysqli->error;
        }
                
          }     
   

?>
</body>

</html>