
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
                    <!-- User is manager or admin -->
                    <?php if($AUTH > 1) { ?>
                    <li><a href="viewEmployees.php">View Employees</a></li>
                    <?php } ?>
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
                <div id="buttonLinks" class="btn-group btn-group-lg" role="group" aria-label="Basic example">
                    <a href="viewProfile.php"><button type="button" class="btn btn-info">View Profile Info</button></a>
                    <a href="viewSalaries.php"><button type="button" class="btn btn-info">View Salary</button></a>
                    <?php if($AUTH > 1) { ?>
                    <a href="viewEmployees.php"><button type="button" class="btn btn-info">View Employees</button></a>
                    <?php } if($AUTH > 2) { ?>
                    <a href="register.php"><button type="button" class="btn btn-primary">Register A User</button></a>
                    <?php } ?>
                </div>
                <?php } else { ?>
                <div id="row">
                    <h3>Login</h3>
                    <form method="POST" action="login.php">
                        <div class="form-group">
                            <label for="user">Username</label>
                            <input type="text" name="user" id="user" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" name="password" id="pass" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Login</button>
                        </div>
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>

        <footer>
            <p>Human Resources 2017</p>
        </footer>
    </body>
</html>
