<?php 
    session_start();
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
        <?php include "php/request.php"; ?>
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
                    <li><a href="viewProfile.php">View Profile</a></li>
                    <?php } ?>
                    <!-- User is manager or admin -->
                    <?php if($AUTH > 1) { ?>
                    <li><a href="#">View Employees</a></li>
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
            <div id="container-fluid">
                <!-- User is logged in -->
                <?php if($AUTH > 0) { 
                    if (isset($_POST["password"])) {
                        if (!empty($_POST["newPass"]) && $_POST["newPass"] == $_POST["confirmNewPass"]) {
                            $data = array("username" => $_SESSION["username"], "password" => $_POST["newPass"]);
                            $result = request("human_resources, updatePassword", $data);

                            if ($result == true) {
                                echo "<h3>Your password has been changed.</h3>";
                            }

                            else {
                                echo "<h3>Error updating password.</h3>";
                            }
                        }

                        else {
                            echo "<h3>Please reenter new password. Ensure that new passwords match.</h3>";       
                        }
                    }
                ?>
                    <div id="passDiv">
                        <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                            <div class="form-group">
                                <label for="newPass">Enter New Password:</label>
                                <input id="newPass" name="newPass" class="form-control" type="password">
                            </div>
                            
                            <div class="form-group">
                                <label for="confirmNewPass">Reenter New Password:</label>
                                <input id="confirmNewPass" name="confirmNewPass" class="form-control" type="password">
                            </div>
                            <div class="form-group">
                                <button name= "password" class="btn btn-default" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                
                <?php } else { ?>
                <!-- User is not logged in -->
                <p>User not logged.</p>
                <?php } ?>
            </div>
        </div>
        
    <footer>
        <p>HumanResources 2017</p>
    </footer>
    </body>
</html>