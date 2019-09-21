<!-- Page to welcome user on successful registration -->
<html>
<head>
        <title>Welcome User</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <?php require("heading.php"); ?>
</head>
<body style="background-color:silver;">   

<?php
include('RegisterDB.php');
if (isset($_SESSION['firstname']))
{
    $firstname=$_SESSION['firstname'];// Getting the firstname from the session variable.
    //Welcome message for the newly registered user.
     echo '<h2>REGISTRATION SUCCESSFUL.!!</h2>';
     echo '<p1>Hello '.$firstname.',</p1>';
     echo '<p>Thank you for registering with us :).We are sure you will find our website useful.</p>';
     echo  '<a href="EditBooking.php">Click here to continue using the website.</a>';//Redirect to page to see user data
     echo  '</br>';
     echo '<h3> Welcome Aboard!</h3>';                        
}
?>
</body>
<?php require("footer.php"); ?>
</html>