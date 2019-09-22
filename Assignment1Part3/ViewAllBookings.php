<!-- View all bookings for admin. -->
<?php
require("heading.php");
require 'dbconnect.php';
require("admincheck.php");
$output = '';
$fname = $_SESSION['firstname'];
$lname = $_SESSION['lastname'];
$email = $_SESSION['username'];
$empid = $_SESSION['empid'];
$currentDateTime = date('Y-m-d');
//$query = "SELECT * FROM Bookings WHERE BookingStatus<>'Cancelled'";
$query = "select u.FirstName,u.LastName,e.FirstName AS 'EFName',e.LastName AS 'ELName',b.* from bookings b JOIN userdetails u ON b.Email=u.Email JOIN EmployeeDetails e
ON e.EmployeeId= b.EmployeeId
WHERE  b.BookingStatus<>'Cancelled'";
$result = mysqli_query($mysqli, $query);
?>
<html>

<head>
     <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
     <link rel="stylesheet" type="text/css" href="stylesheet.css">
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <title>View Booking</title>
     <style>
          .container-view{
               margin:15px;
          }
     </style>
</head>

<body style="background-color:silver;">
     <div id="" class="container-view">
          <div class="" style="width:1505px">
               <div class="modal-content" style="align-items: center;">
                    <div class="modal-header">
                         <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                         <h4 class="modal-title">View Booking Details</h4>
                    </div>
                    <div class="modal-body">
                         
                         <div class="table-responsive">
                              <table class="table table-bordered">
                                   <tr>
                                        <td><label>Massage Type</label></td>
                                        <td><label>Massage Date</label></td>
                                        <td><label>Massage Time</label></td>
                                        <td><label>Duration</label></td>
                                        <td><label>Amount</label></td>
                                        <td><label>Client</label></td>
                                        <td><label>Therapist</label></td>
                                        <td><label>Booking Date</label></td>
                                        <td><label>Booking Time</label></td>

                                   </tr>
                                   <?php
                                   while ($row = mysqli_fetch_array($result)) {
                                        $output .= '   
                  
                <tr>  
                <td >' . $row["MassageType"] . '</td>  
                     <td >' . date('d-M-Y',strtotime($row['BookedDate'])) . '</td>  
                  
                     <td >' . $row["Bookedtime"] . '</td>  
                       
                     <td >' . $row["Duration"] . ' minutes</td>  
                       
                     <td >$' . $row["Amount"] . '</td>  
                      
                     <td >' . $row["FirstName"] . ' ' . $row["LastName"] . '</td>  

                     <td >' . $row["EFName"] . ' ' . $row["ELName"] . '</td>  
                       
                     <td >' . $row["BookingDate"] . '</td>  
                      
                     <td >' . $row["BookingTime"] . '</td>  
                </tr>
               ';
                                   }
                                   echo $output;
                                   ?>
                              </table>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <a href="AdminHome.php" class="btn btn-info">Go back</a>

                    </div>
               </div>
          </div>
     </div>
</body>