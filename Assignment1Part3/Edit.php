<?php
//include('EditDB.php');
require("usertab.php");
require 'dbconnect.php';
 
$currentDateTime = date('Y-m-d');
$bookingid = $_GET["id"];
$query = "SELECT * FROM Bookings WHERE BookingId=$bookingid";
$result = mysqli_query($mysqli, $query);
$row = mysqli_fetch_array($result);
$s = $row['ServiceId'];
$e = $row['EmployeeId'];
$d = $row['BookedDate'];
$t = $row['Bookedtime'];
$m = $row['MessageForTherapist'];
$_SESSION['Id']=$bookingid;
// var_dump($s);
?>
<html>

<head>
     <title> Edit Booking</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<body style="background-color:silver;">
     <div class="container">
     <div id="add_data_Modal" class="">
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header">
                         <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                         <h4 class="modal-title"><b>Edit Booking</b></h4>
                    </div>
                    <div class="modal-body">
                         <form method="post" id="insert_form" action="EditDB.php">
                              
                              <label>Select Massage Type</label>
                              <select name="MassageType" id="MassageType" class="form-control" >
                                   <!-- <option>Select Massage Type</option> -->
                                   <?php
                                   $sql1 = mysqli_query($mysqli, "SELECT MassageType,ServiceId FROM Services");

                                   while ($row1 = $sql1->fetch_assoc()) {
                                        $service = $row1['MassageType'];
                                        $serviceid = $row1['ServiceId'];
                                        ?>
                                        <option value='<?php echo $serviceid ?>' <?php if ($serviceid == $s) echo 'selected'; ?>><?php echo $service ?></option>
                                   <?php } ?>
                                   <input type="hidden" name="firstMassageType" value="<?php echo $s; ?>" />
                              </select>       
                              <br />
                              <label>Select Date </label>
                              <input type="date" value="<?php echo $d; ?>"  name="BookedDate" id="bookingdate" required="true" min="1900-01-01" title="No past dates." style="border-radius:10px;height: 25px;">
                              <input type="hidden" name="firstDate" value="<?php echo $d; ?>" />
                              <br />
                              <br />
                              <label>Select Time</label>
                              <select name="time" id="time" class="form-control"> 
                                   <option value="08:00:00" <?php if ($t == '08:00:00') echo 'selected'; ?>>8:00 AM</option>
                                   <option value="08:35:00" <?php if ($t == '08:35:00') echo 'selected'; ?>>8:35 AM</option>
                                   <option value="09:10:00" <?php if ($t == '09:10:00') echo 'selected'; ?>>9:10 AM</option>
                                   <option value="09:45:00" <?php if ($t == '09:45:00') echo 'selected'; ?>>9:45 AM</option>
                                   <input type="hidden" name="firstTime" value="<?php echo $t; ?>" />
                              </select>
                              <br />


                              <label>Select Therapist</label>
                              <select name="employee" id="employee" class="form-control">
                                   <option>Select Therapist</option>
                                   <?php
                                   $sql2 = mysqli_query($mysqli, "SELECT concat(FirstName,' ',LastName)FirstName,EmployeeDetails.EmployeeId,ServiceId FROM EmployeeDetails , therapistdetails where employeedetails.EmployeeId=therapistdetails.employeeid and IsAdmin=0 and serviceid=" . $s);

                                   while ($row2 = $sql2->fetch_assoc()) {
                                        $employees = $row2['FirstName'];
                                        $employeeid = $row2['EmployeeId'];
                                        ?>
                                        <option value='<?php echo $employeeid; ?>' <?php if ($e == $employeeid) echo 'selected'; ?>><?php echo $employees; ?></option>
                                        
                                   <?php } ?>
                                   <input type="hidden" name="firstTherapist" value="<?php echo $e; ?>" />
                              </select>
                              
                              <br />
                              <label for="comment">Motivation for making the Appointment:</label>
                          <textarea class="form-control" rows="5" id="message" name="message"value="<?php echo $m;?>"><?php echo $m;?></textarea>
                              <input type="hidden" name="booking_id" id=<?php echo $bookingid; ?> />
                              <div class="col-sd-6">
                                  
                              <button type="submit" id="btn" name="edit" class="btn btn-success"> Confirm</button>
                                  
                              <a href="userhome.php" id="btn" class="btn btn-success"  style="background-color:#de2855;border-color:#de2855;float:right">Cancel</a>
                                   
                                   </div>
                         </form>
                    </div>
                    <!-- <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>   -->
               </div>
          </div>
     </div>
                                   </div>
</body>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

<script type="text/javascript">
     $(document).ready(function() {
          $("#MassageType").change(function() {
               var sid = $(this).val();
               $.ajax({
                    url:'getUsers.php',
                    type: 'POST',
                    data: 'sid='+sid,
                    success: function(html){
                         $('#employee').html(html);
                    //     console.log(html); 
                    }
               });
          });

     });
</script>