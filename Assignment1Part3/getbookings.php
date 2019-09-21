<?php
include "dbconnect.php";
//  echo $_POST['sid'];
//  echo $_POST['sid1'];
//  echo $_POST['empid'];
 $output='';
$sql = "select distinct u.FirstName,u.LastName,b.* from bookings b,userdetails u where b.Email=u.Email
and b.EmployeeId=".$_POST['empid']." AND b.BookingStatus<>'Cancelled' and BookedDate between '".$_POST['sid']."' and '".$_POST['sid1']."'";
$result = mysqli_query($mysqli,$sql);

while( $row = $result->fetch_assoc()){
    
    $output .= '   
                  
                <tr>  
                <td >' . $row["MassageType"] . '</td>  
                     <td >' . date('d-M-Y',strtotime($row['BookedDate'])) . '</td>  
                  
                     <td >' . $row["Bookedtime"] . '</td>  
                       
                     <td >' . $row["Duration"] . ' minutes</td>  
                       
                     <td >$' . $row["Amount"] . '</td>  
                      
                     <td >' . $row["FirstName"] . ' ' . $row["LastName"] . '</td> 
                     
                     <td >' . $row["MessageForTherapist"] .  '</td> 
                       
                     <td >' . $row["BookingDate"] . '</td>  
                      
                     <td >' . $row["BookingTime"] . '</td>  
                </tr>
               ';
        echo $output;
}
?>