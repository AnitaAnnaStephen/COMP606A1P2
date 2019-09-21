<!-- This page cancels the booking made by user in to the database -->
<?php
$message='';
if (isset($_POST['delete']))
{
    require 'dbconnect.php';//Establishing connection with database
    $bookingid=$_GET["id"];
    $today=date('Y/m/d H:i:s');//getting current date
    $sql1="SELECT * FROM Bookings WHERE BookingId='$bookingid'";
    $result=mysqli_query($mysqli,$sql1);
    
    while($row = mysqli_fetch_array($result))  
                               {
                                   $time1=$row['BookedDate'].$row['BookedTime'];
                                  
                                  $starttimestamp = strtotime($time1);
                                  $endtimestamp = strtotime($today);
                                  $difference = abs($starttimestamp  - $endtimestamp)/3600;
                                   $email=$row['Email'];
                                   $fineamount=$row['Amount']*10/100;//calculating fine if cancelling within 24 hours
                                
                               }
                               if($difference<=24 && $difference >=0)//check if booking is within 24 hours
                               {
                                $sql="UPDATE Bookings
                                SET BookingStatus='Cancelled' 
                                WHERE Bookingid='$bookingid'";
                                $sqlsp = "CALL spAddFineDetails('$bookingid', '$email','$fineamount','$today')";
                                if (!$mysqli->query($sqlsp)){//If SP execution failed.
                                $message='Failed to Add finedetails';
                                echo($mysqli->error);
                                 } 
                                else {
                                    
                                    $message='finedetails added';
                                    
                               }
                            }
                            else{//if cancelled booking is not within 24 hours
                                $sql="UPDATE Bookings
                                SET BookingStatus='Cancelled' 
                                WHERE Bookingid='$bookingid'"; 
                            }
       
        if ($mysqli->query($sql) === TRUE) {
            echo "Booking cancelled successfully";
            header("Location: UserHome.php");
        } else {
            echo "Error updating record: " . $mysqli->error;
        }
                
          }     
   

?>
</body>

</html>