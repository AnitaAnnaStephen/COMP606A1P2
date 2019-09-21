<!-- This page saves the services assigned to employees in to the database after required validations -->
<?php

$message='';
if (isset($_POST['register']))
{
    require 'dbconnect.php';//Establishing connection with database
    $employeeid=$serviceid='';
    //Retreiving values sent by http post method
    $employeeid=$_REQUEST['employee'];
    $serviceid=$_REQUEST['MassageType'];
    $message=assignServices($employeeid,$serviceid);//calling function to check and assign services for employees
         
}
//function to check and assign services for employees
function assignServices($employeeid,$serviceid){
  require 'dbconnect.php';//Establishing connection with database
  //Checking if the entry already exists in the database
  $sql="SELECT * FROM TherapistDetails WHERE EmployeeId=$employeeid AND ServiceId=$serviceid";
  $result=mysqli_query($mysqli,$sql);
  if($row = $result->fetch_row())//If entry already registered
  {
     $message="Entry already exists in database.";
     return $message;
  }
    else//if entry is not already used
    {
      
      $sqlsp = "CALL spAssignService('$employeeid', '$serviceid')";
      if (!$mysqli->query($sqlsp)){//If SP execution failed.
      $message='Failed to Assign Service.';
      return $message;
      echo($mysqli->error);
       } 
      else {
          $message="Service Assigned";
          return $message;
        // header("Location: AssignServices.php");//redirecting to Assign services page                       
          }
    }     
}
    
?>
