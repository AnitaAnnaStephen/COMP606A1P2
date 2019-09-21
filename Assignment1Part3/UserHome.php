<?php  
 require("usertab.php");
 require 'dbconnect.php';
 $fname=$_SESSION['firstname'];
     $lname=$_SESSION['lastname'];
     $email=$_SESSION['username'];
     $currentDateTime = date('Y-m-d');
 $query = "SELECT * FROM Bookings WHERE Email LIKE '$email' AND BookedDate >='$currentDateTime'AND BookingStatus<>'Cancelled'";
 $result = mysqli_query($mysqli, $query);
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>View Edit Bookings</title>  
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           
          <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   -->
      </head>  
      <body style="background-color: silver;">  
           <br /><br />  
           <div class="container" style="width:700px;">  
                <h3 align="center">Your upcoming bookings</h3>  
                <br />  
                <div class="table-responsive">  
                     <div align="right">  
                     <a href="BookAppointment.php" class="btn" style="background-color:#fff;">Book new Appointment</a>  
                     </div>  
                     <br />  
                     <div id="bookings_table">  
                          <table class="table table-bordered">  
                                <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  $id=$row["BookingId"];
                               ?>  
                               <tr>  
                                   
                                    <td><?php echo $row["MassageType"]." on ".$row['BookedDate']; ?></td>  
                                    <td><a href="Edit.php?id=<?php echo $id; ?>"     class="btn">Edit</td>
                                   <td><a href="Delete.php?id=<?php echo $id; ?>" class="btn">Cancel</td>
                                   <td><a href="View.php?id=<?php echo $id; ?>" class="btn">View</td>
                                    <!-- <td><input type="button" name="edit" value="Edit" id="<?php echo $row["BookingId"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  
                                    <td><input type="button" name="edit" value="Cancel" id="<?php echo $row["BookingId"]; ?>" class="btn btn-info btn-xs delete_data" /></td>  
                                    <td><input type="button" name="view" value="View" id="<?php echo $row["BookingId"]; ?>" class="btn btn-info btn-xs view_data" /></td>   -->
                               </tr>  
                               <?php  
                               }  
                               ?>  
                          </table>  
                     </div>  
                </div>  
           </div>  
          
      </body>
      <?php require("footer.php"); ?>
 </html>  