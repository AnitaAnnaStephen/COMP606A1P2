<?php
include "dbconnect.php";

$sql = "SELECT concat(FirstName,' ',LastName)FirstName,EmployeeDetails.EmployeeId,ServiceId FROM EmployeeDetails 
, therapistdetails where employeedetails.EmployeeId=therapistdetails.employeeid and IsAdmin=0 and serviceid=".$_POST['sid'];

$result = mysqli_query($mysqli,$sql);

while( $row = $result->fetch_assoc()){
    echo '<option value="'.$row['EmployeeId'].'" >'.$row['FirstName'].'</option>';
}
?>