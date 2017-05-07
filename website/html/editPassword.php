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
                <?php if($AUTH > 0) { ?>
                <?php if(isset($_GET["msg"])) { ?>
                    <?php if($_GET["msg"] == 0) { ?>
                        <h3>Error! Something went wrong.</h3>
                    <?php } elseif($_GET["msg"] == 1) { ?>
                        <h3>Please fill in all fields.</h3>
                    <?php } elseif($_GET["msg"] == 2) { ?>
                        <h3>Make sure both password fields match first.</h3>
                        <?php } else { ?>
                        <h3>Changed!</h3>
                        <?php } ?> 
                    <?php } ?> 
                      
                        <form method="POST" action="php/postPassword.php?user=<?= $editUser ?>">
                            <div class="form-group">
                                <label for="newPass">Enter New Password:</label>
                                <input id="newPass" name="newPass" class="form-control" type="password">
                            </div>
                            
                            <div class="form-group">
                                <label for="confirmNewPass">Reenter New Password:</label>
                                <input id="confirmNewPass" name="confirmNewPass" class="form-control" type="password">
                            </div>
                            <div class="form-group">
                                <button name="password" class="btn btn-default" type="submit">Submit</button>
                            </div>
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