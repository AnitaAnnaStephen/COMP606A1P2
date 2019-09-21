<?php  
 include('EditDB.php');
 require("usertab.php");
 require 'dbconnect.php';
 
     $currentDateTime = date('Y-m-d');
     $bookingid=$_GET["id"];
 $query = "SELECT * FROM Bookings WHERE BookingId=$bookingid";
 $result = mysqli_query($mysqli, $query); 
 ?> 
 <html>
     <head>
     <title> Edit Booking</title> 
    </head>
    <body>
    <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                     <h4 class="modal-title">Edit Booking</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Select Massage Type</label> 
                          <select name="MassageType">
             <option>Select Massage Type</option>
             <?php 
                $sql1 = mysqli_query($mysqli, "SELECT MassageType,ServiceId FROM Services"); 

             while ($row1 = $sql1->fetch_assoc()){
                 $service=$row1['MassageType'];
                 $serviceid=$row1['ServiceId'];
                 echo "<option value='$service'>$service</option>";
                 }?>
            </select> 
                          
                          <br />  
                          <label>Select Date    </label>    
                          <input type="date" name="BookingDate" id="bookingdate" required="true" min="1900-01-01" title="No past dates." style="width:50%;border-radius:10px;height: 25px;">
                          <br />  
                          <label>Select Time</label>  
                          <br />  
                              
                          
                          <label>Select Therapist</label>    
            <select name="employee">
             <option>Select Therapist</option>
             <?php 
                $sql2 = mysqli_query($mysqli, "SELECT FirstName,EmployeeId FROM EmployeeDetails WHERE IsAdmin=0"); 

             while ($row2 = $sql2->fetch_assoc()){
                 $employees=$row2['FirstName'];
                 $employeeid=$row2['EmployeeId'];
                 echo "<option value='$employeeid'>$employees</option>";
                 }?>
            </select>
            
                          <br />  
                          <input type="hidden" name="booking_id" id=<?php echo $bookingid; ?> />  
                          <button type="submit" id="btn" name="edit"> Edit Booking</button>  
                     </form>  
                </div>  
                <!-- <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>   -->
           </div>  
      </div>  
 </div> 
    </body>
    <?php require("footer.php"); ?>
    </html>
