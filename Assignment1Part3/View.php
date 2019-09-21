<?php  
 include('EditDB.php');
 require("usertab.php");
 require 'dbconnect.php';
     $output='';
     $currentDateTime = date('Y-m-d');
     $bookingid=$_GET["id"];
     $query = "SELECT B.MassageType,B.Duration,B.Amount,B.BookingDate,B.BookingTime,B.BookedDate,
     B.BookedTime,B.BookingStatus,E.FirstName,E.LastName FROM Bookings B JOIN EmployeeDetails E ON B.EmployeeId=E.EmployeeId WHERE  BookingId =$bookingid";
     $result = mysqli_query($mysqli, $query);
 ?> 
 <html>
     <head>
     <title>View  Booking</title> 
    </head>
    <body>
    <div id="add_data_Modal" class="modal fade" style="text-align:centre;">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                     <h4 class="modal-title">View Booking Details</h4>  
                </div>  
                <div class="modal-body">  
                    
             <?php 
              $output .= '  
              <div class="table-responsive">  
                   <table class="table table-bordered">';  
              while($row = mysqli_fetch_array($result))  
              {  
                   $output .= '   
                <tr>  
                     <td width="30%"><label>Massage Type</label></td>  
                     <td width="70%">'.$row["MassageType"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Massage Date</label></td>  
                     <td width="70%">'.$row["BookedDate"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Massage Time</label></td>  
                     <td width="70%">'.$row["BookedTime"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Duration</label></td>  
                     <td width="70%">'.$row["Duration"].' minutes</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Amount</label></td>  
                     <td width="70%">$'.$row["Amount"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Therapist</label></td>  
                     <td width="70%">'.$row["FirstName"].' '.$row["LastName"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Booking Date</label></td>  
                     <td width="70%">'.$row["BookingDate"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Booking Time</label></td>  
                     <td width="70%">'.$row["BookingTime"].'</td>  
                </tr>
               ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
      echo '</br>';
                ?>   
                       
                </div>  
                 <div class="modal-footer">  
                 <a href="UserHome.php" >Go back</a>
                      
                </div>   
           </div>  
      </div>  
 </div> 
    </body>
