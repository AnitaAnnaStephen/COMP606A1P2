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
$query = "SELECT * FROM Bookings WHERE EmployeeId='$empid'AND BookingStatus<>'Cancelled'";
$query = "select u.FirstName,u.LastName,b.* from bookings b,userdetails u where b.Email=u.Email
and b.EmployeeId='$empid'AND b.BookingStatus<>'Cancelled'
";
$result = mysqli_query($mysqli, $query);
?>
<html>

<head>
     <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->

     <link rel="stylesheet" type="text/css" href="stylesheet.css">
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <title>View Booking</title>
     <style>
          .container-view {
               margin: 15px;
          }
     </style>
</head>


<body>
     <div id="" class="container-view">
          <div class="" style="width:1505px">
               <div class="modal-content">
                    <div class="modal-header">
                         <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>   -->
                         <h4 class="modal-title"><b>View Booking Details</b></h4>
                    </div>
                    <div class="modal-body">
                         <!-- <form id="formdates" method="POST" action="getbookings.php"> -->
                              <div class="row dates" style="margin:5px">
                                   <input type="hidden" name="empid" value="<?php echo $empid; ?>" class="empid" />
                                   <label style="margin-top:5px">From</label>
                                   <input type="date" class="form-control col-md-2 date1" name="date1"  />
                                   <label style="margin-top:5px">To</label>
                                   <input type="date" class="form-control col-md-2 date2" name="date2"  />
                                   <button type="submit" class="btn btn-info search">Go</button>
                              </div>
                         <!-- </form> -->
                         <div class="table-responsive">
                              <table class="table table-bordered">
                                   <tr>
                                        <td><label>Massage Type</label></td>
                                        <td><label>Massage Date</label></td>
                                        <td><label>Massage Time</label></td>
                                        <td><label>Duration</label></td>
                                        <td><label>Amount</label></td>
                                        <td><label>Client</label></td>
                                        <td><label>Client Message</label></td>
                                        <td><label>Booking Date</label></td>
                                        <td><label>Booking Time</label></td>

                                   </tr>
                                   <tbody class="ajaxvalue">
                                        <?php
                                        while ($row = mysqli_fetch_array($result)) {
                                             $output .= '   
                  
                <tr>  
                <td >' . $row["MassageType"] . '</td>  
                     <td >' . date('d-M-Y', strtotime($row['BookedDate'])) . '</td>  
                  
                     <td >' . $row["Bookedtime"] . '</td>  
                       
                     <td >' . $row["Duration"] . ' minutes</td>  
                       
                     <td >$' . $row["Amount"] . '</td>  
                      
                     <td >' . $row["FirstName"] . ' ' . $row["LastName"] . '</td>  

                     <td >' . $row["MessageForTherapist"] .  '</td> 
                       
                     <td >' . $row["BookingDate"] . '</td>  
                      
                     <td >' . $row["BookingTime"] . '</td>  
                </tr>
               ';
                                        }
                                        echo $output;
                                        ?>
                                   </tbody>
                              </table>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <a href="EmployeeHome.php" class="btn btn-info">Go back</a>

                    </div>
               </div>
          </div>
     </div>
</body>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!--jquery validation plugin-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>
     $(document).ready(function() {
          $(document).on('click', '.search', function() {
               debugger;
               var a = $(this).parents('.dates').find('.date1');
               var date1 = $(a).val();
               var b = $(this).parents('.dates').find('.date2');
               var date2 = $(b).val();
               var empid = $(this).parents('.dates').find('.empid').val();
               $.ajax({
                    url: 'getBookings.php',
                    type: 'POST',
                    data: 'sid=' + date1 + "&sid1=" + date2 + "&empid=" + empid,
                    success: function(html) {
                         $('.ajaxvalue').html(html);
                         //     console.log(html); 
                    }
               });
          });
     // });


     // $(document).on('click', '.search', function() {
     //      var a = $(this).parents('.dates').find('.date1');
     //                var date1 = $(a).val();

     //                var b = $(this).parents('.dates').find('.date2');
     //                var date2 = $(b).val();

     //                var empid = $(this).parents('.dates').find('.empid').val();
     //      debugger;
     //      $("#formdates").validate({
     //           rules: {
     //                date1: "required",
     //                date2: "required",
     //           },
     //           messages: {
     //                date1: "required",
     //                date2: "required",
     //           },
     //           submitHandler: function() {
     //                debugger;
     //                e.preventDefault();
     //                $.ajax({
     //                     url: 'getBookings.php',
     //                     type: 'POST',
     //                     data: 'sid=' + date1 + "&sid1=" + date2 + "&empid=" + empid,
     //                     success: function(html) {
     //                          debugger;
     //                          $('.ajaxvalue').html(html);
     //                          //     console.log(html); 
     //                     }
     //                });
     //           }
     //      });
     // });
});
</script>