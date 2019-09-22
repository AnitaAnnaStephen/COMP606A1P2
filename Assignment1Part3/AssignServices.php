<!-- Page to assign services for employees -->
<?php include('Assign.php');
//$message='';?>
<!DOCTYPE html>
<html>
    <head>
        <title>Assign Services</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <?php require("heading.php"); ?>
        <?php require("dbconnect.php"); ?>
    </head>
    <body style="background-color:silver;">

        <form method="POST" >
        
            <div id=header>
                <h2>Assign Services</h2>
            </div>
            <p>
                
                 <span style="color:red;"><?php echo $message; ?></span> 
            </p>
            <div id="details" style="text-align:center;">
            <?php
               
             $sql1 = mysqli_query($mysqli, "SELECT MassageType,ServiceId FROM Services");  
             $sql2 = mysqli_query($mysqli, "SELECT FirstName,EmployeeId FROM EmployeeDetails WHERE IsAdmin=0"); ?>         
            <p>
                <label> Select Employee</label>    
                
            <select name="employee">
             <option>Select Employee</option>
             <?php while ($row2 = $sql2->fetch_assoc()){//Display employee names
                 $employees=$row2['FirstName'];
                 $employeeid=$row2['EmployeeId'];
                 echo "<option value='$employeeid'>$employees</option>";
                 }?>
            </select>
            </p>
            <p>
                <label> Select Service</label>
                <select name="MassageType">
             <option>Select Massage Type</option>
             <?php 
                $sql1 = mysqli_query($mysqli, "SELECT MassageType,ServiceId FROM Services"); 

             while ($row1 = $sql1->fetch_assoc()){//Display services
                 $service=$row1['MassageType'];
                 $serviceid=$row1['ServiceId'];
                 echo "<option value='$serviceid'>$service</option>";
                 }?>
            </select> 
           </p>
            
            <p style="padding-left:250px;">
                
                <button type="submit" id="btn" name="register"style="width: 160px;margin-left:-15%;"> Assign Service</button>
                
                
            </p>
            </div>
            <a href="AdminHome.php" style="padding-left: 55px;text-align:right;">Go to Admin Page</a>
        </form>
    </body>
    <?php require("footer.php"); ?>
</html>