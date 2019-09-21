<!-- Page for new user to register -->
<?php include('RegisterDB.php');?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration Page</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <?php require("heading.php"); ?>
    </head>
    <body style="background-color:silver;">

        <form action="" method="POST" >
            <div id=header>
                <h2>Register Here!</h2>
            </div>
            <p>
                <label id="messagebar" >Enter your details.All fields are mandatory.</label>
                <span style="color:red;"><?php echo $message; ?></span>
            </p>
            <div id="details">
           
            <p>
                <label> First Name </label>    
                <input type="text" id="firstname" name="firstname" pattern="[A-Za-z\s]{3,15}" title="Minimum 3 letters.No digits." required="true" placeholder ="First Name" style="width:50%;border-radius:10px;height: 25px;"/>
            </p>
            <p>
                <label> Last Name</label>    
                <input type="text" id="lastname" name="lastname" pattern="[A-Za-z\s]{3,15}" title="Minimum 3 letters.No digits." required="true" placeholder ="Last Name" style="width:50%;border-radius:10px;height: 25px;"/>
            </p>
            <p>
                <label>Gender</label>
                <select name="gender"  required="true">
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                    <option value="Other">Other</option>
                 </select>
            </p> 
            <p>
                <label> Email Address</label>    
                <input type="email" id="email" name="email" required="true"  placeholder ="Email Address" style="width:50%;border-radius:10px;height: 25px;"/>
               
            </p>
            <p>
                <label> Address</label>    
                <input type="text" id="address" name="address" required="true" placeholder ="Address" style="width:50%;border-radius:10px;height: 25px;"/>
            </p>
            <p>
                <label> Street</label>    
                <input type="text" id="street" name="street" required="true" placeholder ="Street" style="width:50%;border-radius:10px;height: 25px;"/>
            </p>
            <p>
                <label> Suburb</label>    
                <input type="text" id="suburb" name="suburb" required="true" placeholder ="Suburb" style="width:50%;border-radius:10px;height: 25px;"/>
            </p>
            <p>
                <label> City</label>    
                <input type="text" id="city" name="city" required="true" placeholder ="City" style="width:50%;border-radius:10px;height: 25px;"/>
            </p>
            <p>
                <label> PO</label>    
                <input type="number" id="po" name="po" required="true" placeholder ="PO" style="width:50%;border-radius:10px;height: 25px;"/>
            </p>
            <p>
                <label> Mobile Number</label>    
                <input type="number" id="mobile" name="mobile" required="true"  placeholder ="Mobile Number" style="width:50%;border-radius:10px;height: 25px;"/>
            </p>   
            <p>
                <label> Date of Birth</label>    
                <input type="date" name="dob" id="dob" required="true" min="1900-01-01" title="No future dates." style="width:50%;border-radius:10px;height: 25px;">
           </p>
            <p>
                <label> Password</label>    
                <input type="password" id="password" name="password" pattern="[A-Za-z0-9]{5,15}" title="Minimum 5 characters" required="true"  placeholder="Password" style="width:50%;border-radius:10px;height: 25px;"/>
            </p>
            <p>
                <label> Confirm Password</label>    
                <input type="password" id="confirmpassword" required="true" name="confirmpassword" placeholder="Repeat Password"  style="width:50%;border-radius:10px;height: 25px;"/>
            </p>
            <p style="padding-left:250px;">
                
                <button type="submit" id="btn" name="register"> Register </button>
                
                <a href="Login.php" style="padding-left: 55px;text-align:right;">Go to Login Page</a>
            </p>
            </div>
        </form>
    </body>
    <?php require("footer.php"); ?>
</html>