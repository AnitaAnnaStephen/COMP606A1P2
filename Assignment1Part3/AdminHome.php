<!-- Home Page of Admin -->
<html>
<head>
        <title>Admin Home</title>
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
  width: 300px;
  margin: 10px;
  border-radius: 10px;
  text-align: center;
  line-height: 75px;
  font-size: 30px;
}
</style>
</head>
<body style="background-color:silver;">   

<?php

if (isset($_SESSION['firstname']))
{
    $firstname=$_SESSION['firstname'];// Getting the firstname from the session variable.
    //Hello message for the Admin.
     echo '<p1 style="font-size: larger;"><b><i>Hello '.$firstname.',</b></i></p1>';
     echo  '</br>';                     
}?>
<div class="flex-container">
  <div><a href="AddEmployees.php">Add new employees</a></div>
  <div><a href="AssignServices.php">Assign Services</a></div>
  <div><a href="ViewAllBookings.php">View All Bookings</a></div>
  
</div>
<!-- <div><a href="Logout.php" style="font-weight:bold;background-color:Blue;">Logout</a></div> -->
</body>
<?php require("footer.php"); ?>
</html>

