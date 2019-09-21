<!-- Page to check if username and password is correct -->
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
    $sql="SELECT * FROM UserDetails WHERE Email LIKE '$email' AND Password LIKE '$password'";
    $result=mysqli_query($mysqli,$sql);
    
   
     if($row=mysqli_fetch_array($result))//if username and password is valid
     {
         var_dump();
         $_SESSION['username']=$email;//initialising session
         $_SESSION['firstname']=$row['FirstName'];
         $_SESSION['lastname']=$row['LastName'];
         header("Location: UserHome.php");//redirecting to user profile
    }
    else{//if username or password is invalid
        $error="Invalid username or password";
    }
}
?>