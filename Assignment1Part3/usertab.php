<!-- Header for the user pages. -->
<?php
include('UserCheck.php');?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="bootstrap.css"> 
<link rel="stylesheet" href="bootstrap.min.css">  -->
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #333;
  padding: 15px 16px;
    margin:0;
    margin-right: -4px;
}

.navbar a {
  float: right;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 30px 16px;
  text-decoration: none;
}

.dropdown {
  float: right;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 30px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
  width: 160px;
}
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  /* display: none;
  position: absolute;
  background-color: #f9f9f9; */
  display: none;
    position: fixed;
    background-color: #F9F9F9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}

</style>
</head>
<body>

<div class="navbar">
<img src="Logo.jpg" alt="Logo" width="80" height="80">

<div class="dropdown">
    <button class="dropbtn"><?php echo $_SESSION['firstname']; ?> 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <p><?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?></p>
      <!-- <a href="Appointments.php">Appointments</a> -->
      <a href="UserHome.php">Profile</a>
      <a href="Logout.php">Logout</a>
    </div>
  </div> 
  <a href="BookAppointment.php">Book Appointments</a>
  <a href="UserHome.php">Home</a>

  
  
</div>



</body>
</html>
