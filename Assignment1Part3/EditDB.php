<!-- This page saves the data entered by user in to the database after required validations -->
<?php
$message='';
if (isset($_POST['edit']))
{
    require 'dbconnect.php';//Establishing connection with database
    $bookeddate=$massagetype=$bookedtime=$therapist='';
    //Retreiving values sent by http post method
    $bookeddate=$_POST['BookedDate'];
    $bookedtime=$_POST['time'];
    // $massagetype=$_POST['MassageType'];
    //$bookingtime=$_POST['BookingTime'];
    $therapist=$_POST['employee'];
    $bookingid=$_GET["id"];
    $today=date('Y/m/d');//getting current date
    $serviceid = $_POST['MassageType'];

    $sql1 = "select * from services where serviceid=".$serviceid;
    $result = mysqli_query($mysqli, $sql1);
    $row = mysqli_fetch_array($result);
    $s = $row['ServiceId'];
    $m = $row['MassageType'];
    $d = $row['Duration'];
    $a = $row['Amount'];
    
        //Checking if the email already exists in the database
      //  $sql="UPDATE Bookings SET MassageType='$massagetype',BookingDate='$bookingdate',BookingTime=$bookingtime,EmployeeId=$therapist
       // WHERE BookingId='$bookingid'";
        $sql="UPDATE Bookings SET MassageType='$m',BookedDate='$bookeddate', Bookedtime='$bookedtime',
        Duration=$d, Amount=$a, ServiceId=$s, EmployeeId=$therapist

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