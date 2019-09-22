<!-- This page saves the employee information in to the database after required validations -->
<?php
session_start();
$message='';
if (isset($_POST['register']))
{
    require 'dbconnect.php';//Establishing connection with database
    $dob=$lastname=$firstname=$email=$mobile=$password=$repassword=$isadmin='';
    //Retreiving values sent by http post method
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $dob=$_POST['dob'];
    $password=$_POST['password'];
    $repassword=$_POST['confirmpassword'];
    $isadmin=$_POST['isadmin'];
    $today=date('Y/m/d');//getting current date
    if($password !== $repassword)//Checking if passwords match
    {
        $message="Passwords not matching";
    }
    else if($dob>$today)//Checking if dob is a future date
    {
        $message='Date of birth cannot be a future date';
    }
    else
    {
        //Checking if the email already exists in the database
        $sql="SELECT * FROM EmployeeDetails WHERE Email LIKE '$email'";
        $result=mysqli_query($mysqli,$sql);
        if($row = $result->fetch_row())//If email already registered
        {
           $message="Email already exists in database.";
        }
          else//if email is not already used
          {
            $password=md5($password);//Password encryption
            //Saving data to the database using SP
            //spAddEmployee inserts values to EmployeeDetails table
            //Have 7 input parameters
            $sqlsp = "CALL spAddEmployee('$firstname', '$lastname','$email',$mobile ,'$dob','$password','$isadmin')";
            if (!$mysqli->query($sqlsp)){//If SP execution failed.
            $message='Failed to Add Employee';
            echo($mysqli->error);
             } 
            else {
                
                $message='Employee added';
               
            }
          }     
    }     
}
?>
</body>

</html>