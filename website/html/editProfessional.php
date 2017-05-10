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
                    <li class="navbar-brand"><p class="wrapTxt"><?= $user ?><span class="mask"></span></p></li>
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
                <?php if($AUTH > 2) { ?>
                <?php if(isset($_GET["msg"])) { ?>
                    <?php if($_GET["msg"] == 0) { ?>
                        <h3>Error! Something went wrong.</h3>
                    <?php } elseif($_GET["msg"] == 1) { ?>
                        <h3>Changed!</h3>
                    <?php } ?>
                <?php } ?>
                <?php include 'php/getProf.php'; ?>
                <form method="POST" action="php/postProf.php?user=<?= $editUser ?>">
                    <div class="form-group">
                        <label for="user">Username</label>
                        <input type="text" id="user" class="form-control" value="<?= $editUser ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="text" name="salary" id="fName" class="form-control" placeholder="Salary" value="<?= $salary ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <select name="position" id="position" required>
                            <option value="Admin" <?php if($position == "Admin") { echo "selected"; } ?>>Admin</option>
                            <option value="Manager" <?php if($position == "Manager") { echo "selected"; } ?>>Manager</option>
                            <option value="Employee" <?php if($position == "Employee") { echo "selected"; } ?>>Employee</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Change</button>
                        <a href="viewProfile.php<?= $includeUser ?>" role="button" class="btn btn-danger">Cancel</a>
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
