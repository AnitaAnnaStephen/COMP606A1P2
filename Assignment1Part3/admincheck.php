<!-- Page to check if employee username and password is correct -->
<?php
session_start();
$error="";
if (isset($_POST['login']))
{
    require 'dbconnect.php';//Establishing database connection
    
    $email=$_POST['username'];
    $password=$_POST['password'];
    $password = md5($_REQUEST['password']);//To match password with encrypted password
    //Checking if email id and password matches with database values.
    $sql="SELECT * FROM EmployeeDetails WHERE Email LIKE '$email' AND Password LIKE '$password' ";
    $result=mysqli_query($mysqli,$sql);
    if($row=mysqli_fetch_array($result))//if username and password is valid
     {
        // var_dump();
        if($row['IsAdmin']==1){
            $_SESSION['username']=$email;//initialising session
            $_SESSION['firstname']=$row['FirstName'];
            $_SESSION['lastname']=$row['LastName'];
            $_SESSION['empid']=$row['EmployeeId'];
            header("Location: AdminHome.php");//redirecting to admin profile
        }
        else{
            $_SESSION['username']=$email;//initialising session
            $_SESSION['firstname']=$row['FirstName'];
            $_SESSION['lastname']=$row['LastName'];
            $_SESSION['empid']=$row['EmployeeId'];
            header("Location: EmployeeHome.php");//redirecting to employee profile
        }
        
    }
    else{//if username or password is invalid
        $error="Invalid  username or password";
    }
}
?>