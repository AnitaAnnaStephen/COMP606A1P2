<?php
$message="";
if (isset($_POST['change']))
{
    require 'dbconnect.php';//to establish database coonection
    
    $email=$_POST['email'];
    $dob=$_POST['dob'];
    $password=$_POST['password'];
    $repassword=$_POST['confirmpassword'];
    //Checking if email id and password matches with database values.
    $sql="SELECT * FROM UserDetails WHERE Email LIKE '$email' AND DOB = '$dob'";
    $result=mysqli_query($mysqli,$sql);
     if($row = $result->fetch_row())//if username and dob is valid
     {  //Checking if passwords match
         if($password !== $repassword)
         { 
             $message="Passwords not matching";
         }
         else
         {
            $password=md5($password);//Password encryption
            //Updating data to the database using query
            $sqlupdate= "UPDATE UserDetails SET Password='$password' WHERE Email LIKE '$email'";
            if (!$mysqli->query($sqlupdate)){
                $message='Failed to update password';
                echo($mysqli->error);
             } 
            else {
                //Message to user on update success
                $message="Password Updated.";                     
            }
         }        
      }
     else{//if username or dob is invalid
        //Message for user
        $message="Invalid username or dob";
    }
}
?>