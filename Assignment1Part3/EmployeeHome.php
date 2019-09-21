<!-- Employee home page on successful login -->
<html>
<head>
        <title>Employee Home</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <?php require("heading.php"); ?>
        <?php require("admincheck.php"); 
        $message='';?>
        <style>
                .flex-container {
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  align-items: center;
  background-color: silver;
}

.flex-container > div {
  background-color: #f1f1f1;
  width: 260px;
  margin: 10px;
  text-align: center;
  line-height: 75px;
  font-size: 30px;
  border-radius: 10px;
}
</style>
</head>
<body style="background-color:silver;">   
<span style="color:red;"><?php echo $message; ?></span>
<?php

if (isset($_SESSION['firstname']))
{
    $firstname=$_SESSION['firstname'];// Getting the firstname from the session variable.
    //Welcome message for the employee.
     echo '<p1 style="font-size: larger;"><b><i>Hello '.$firstname.',</i></b></p1>';
     echo  '</br>';
     
     echo  '</br>';
                          
}
?>
<div class="flex-container">
  <div><a href="ViewBookings.php">View Bookings</a></div>
   
</div>
<a href="Logout.php" style="font-weight:bold;background-color:Blue;">Logout</a>
</body>
<?php require("footer.php"); ?>
</html>