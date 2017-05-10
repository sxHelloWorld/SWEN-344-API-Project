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
        <style>
        .viewProfile p {
            border-style: solid;
            text-align: center;
        }
        </style>
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
                    <li class="navbar-brand"><p class="wrapTxt"><?= $user ?><span class="mask"></span></p></li>
                    <?php } ?>
                </ul>
            </div>
            </div>
        </nav>  

        <div id="main">
            <div id="container-fluid">
                <?php if($AUTH > 0) { ?>
                <!-- User is logged in -->
                <?php include 'php/getProfile.php'; ?>
                <div class="col-md-12">
                <h2>User: <?= $editUser ?></h2>
                </div>
                <div class="col-md-4">
                <div class="viewProfile">
                <h2>First name: </h2><p><?= $fName ?></p><br>
                <h2>Last name: </h2><p><?= $lName ?></p><br>
                <h2>Address: </h2><p><?= $address ?></p><br>
                <h2>Email: </h2><p><?= $email ?></p><br>
                <h2>Phone Number: </h2><p><?= $phone ?></p><br>
                </div>
                <a href="editPersonal.php<?= $includeUser ?>" role="button" class="btn btn-default btn-lg">Edit Profile</a>
                </div>
                <div class="col-md-4">
                <div class="viewProfile">
                <h2>Salary: </h2><p><?= $salary ?></p><br>
                <h2>Position: </h2><p><?= $position ?></p><br>
                </div>
                <?php if(!($editUser != $user && $AUTH < 2) && $AUTH > 1) { ?>
                <a href="editProfessional.php<?= $includeUser ?>" role="button" class="btn btn-default btn-lg">Edit Professional</a>
                <?php } ?>
                </div>
                <div class="col-md-4">
                <br>
                <?php if(!($editUser != $user && $AUTH < 2)) { ?>
                <a href="editPassword.php<?= $includeUser ?>" role="button" class="btn btn-default btn-lg">Edit Password</a>
                <?php } ?>
                <br><br><br><br>
                <?php if($AUTH == 3) { ?>
                <a href="terminate.php<?= $includeUser ?>" role="button" class="btn btn-danger btn-lg">Terminate</a>
                <?php } ?>
                </div>
                <?php } else { ?>
                <!-- User is not logged in -->
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
