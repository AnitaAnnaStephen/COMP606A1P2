<!-- Page for the user to change password -->
<?php include('ForgotPasswordDB.php');?>
<html>
    <head>
    <title>Forgot Password</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <?php require("heading.php"); ?>
    </head>
    <body style="background-color:silver;">
    <form action="" method="POST" >
            <div id=header>
                <h2>Change Password</h2>
            </div>
            <p>
                <label id="messagebar" >All fields are mandatory.</label> 
                <span style="color:red;"><?php echo $message; ?></span>
            </p>
            <div id="details">
           
            <p>
                <label> Email Address</label>    
                <input type="email" id="email" name="email" required="true"  placeholder ="Email Address" style="width:50%;border-radius:10px;height: 25px;"/>
               
            </p>
            <p>
                <label> Date of Birth</label>    
                <input type="date" name="dob" id="dob" required="true" min="1900-01-01" title="No future dates." style="width:50%;border-radius:10px;height: 25px;">
           </p>
            <p>
                <label> New Password</label>    
                <input type="password" id="password" name="password" pattern="[A-Za-z0-9]{5,15}" title="Minimum 5 characters" required="true"  placeholder="Password" style="width:50%;border-radius:10px;height: 25px;"/>
            </p>
            <p>
                <label> Confirm Password</label>    
                <input type="password" id="confirmpassword" required="true" name="confirmpassword" placeholder="Repeat Password"  style="width:50%;border-radius:10px;height: 25px;"/>
            </p>
            <p style="padding-left:250px;">
            <button type="submit" id="btn" name="change" style="width: 180px;" > Change Password </button>
                
                <a href="Login.php" style="padding-left: 55px;text-align:right;">Go to Login Page</a>
            </p>
    </body>
    <?php require("footer.php"); ?>
</html>