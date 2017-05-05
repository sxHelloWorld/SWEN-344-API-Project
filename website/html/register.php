<?php 

//session_start();
// $_SESSION["firstname"] = $_POST["firstname"];
// $_SESSION["lastname"] = $_POST["lastname"];
// $_SESSION["email"] = $_POST["email"];

// $arrayData = array("username"=> "vm344b", "password" => "password", "fname" => "Root", "lname"=> "Last", "email"=> "vm344b.se.rit.edu", "role"=> "Admin", "managerID"=> "1", "title"=> "Robot", "address"=> "127.0.0.1", "salary"=> 100000, "phone"=> "1231231234");
// $data = getData("human_resources", "createProf", $arrayData);

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Human Resources</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <?php include "php/auth.php"; ?>
    </head>
    <body style="padding-top:60px;">
        <nav class="navbar navbar-inverse navbar-fixed-top" id="navbar">
            <div class="container-fluid">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">Human Resources</a>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <?php if($AUTH > 0) { ?>
                    <!-- User is logged in -->
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="#">View Employees</a></li>
                    <li><a href="#">blah blah</a></li>
                    <?php } ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if($AUTH > 0) { ?>
                    <!-- User is logged in -->
                    <li><a href='logout.php'>Logout</a></li>
                    <li class="navbar-brand"><p class="wrapTxt"><?php echo $user; ?><span class="mask"></span></p></li>
                    <?php } ?>
                </ul>
            </div>
            </div>
        </nav>  

        <div id="main">
            <!--
            This is an example how auth should be used
            There is two div with php if-statement will show up depending on the auth
            -->
            <div id="container-fluid">
                <?php if($AUTH == 3) { ?>
                <!-- User is logged in -->
                        
                       <div class="content">
                <h2>Enter your personal information:</h2>
                
                <form action="register_confirm.php" method="post">
                    Username:<br>
                    <input type="text" name="username" value="" required>
                    <br>
                    
                    Password:<br>
                    <input type="password" name="password" value="" required>
                    <br>
                        
                    First name:<br>
                    <input type="text" name="fname" value="" required>
                    <br>
                        
                    Last name:<br>
                    <input type="text" name="lname" value="" required>
                    <br>
                        
                    Email:<br>
                    <input type="email" name="email" value="" required>
                    <br>
                    
                    Role:<br>
                    <select name="role" required>
                        <option value="Student">Student</option>
                        <option value="Professor">Professor</option>
                        <option value="Admin">Admin</option>
                    </select>
                    <br>
                        
                    Manager ID:<br>
                    <input type="text" name="managerID" value="0" required>
                    <br>
                        
                    Job title:<br>
                    <select name="title" required>
                        <option value="Admin">Admin</option>
                        <option value="Manager">Manager</option>
                        <option value="Employee">Employee</option>
                    </select>
                    <br>
                    
                        
                    Address:<br>
                    <input type="text" name="address" value="" required>
                    <br>
                        
                    Salary:<br>
                    <input type="text" name="salary" value="" required>
                    <br>
                        
                    Phone Number:<br>
                    <input type="text" name="phone" value="" required>
                    <br>
                    
                    <input type="submit" value="Continue">
                </form>
                
                
                <?php } else { ?>
                <!-- non-user is not supposed to be here. -->
                <?php header("Location: index.php"); die(); ?>
                <?php } ?>
            </div>
        </div>

        <footer>
            <p>Human Resources 2017</p>
        </footer>
    </body>
</html>
