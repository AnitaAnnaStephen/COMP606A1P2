<!-- Page to cancel massages by users -->
<?php  
 include('DeleteDB.php');
 require("usertab.php");
 require 'dbconnect.php';
 
     $currentDateTime = date('Y-m-d');
     $bookingid=$_GET["id"];
 $query = "SELECT * FROM Bookings WHERE BookingId=$bookingid";
 $result = mysqli_query($mysqli, $query); 
 ?> 
 <html>
     <head>
     <title>Delete Bookings</title> 
    </head>
    <body>
    <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                     <h4 class="modal-title">Delete Booking</h4>  
               </div>   
                <div class="modal-body" style="text-align:center;">  
                     <form method="post" id="insert_form">  
                          <label>Are you sure you want to cancel the booking?</label> 
                          
                          
  
                           
                          <button type="submit" id="btn" name="delete"> Cancel Booking</button>  
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