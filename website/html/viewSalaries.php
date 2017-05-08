
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
                    <!-- User is logged in -->
                    <?php include 'php/getSalary.php'; ?>
                    <div class="col-md-12">
                        <h2>View Position Salaries</h2>
                    </div>
                    <div class="col-md-4">
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary">Position</button>
                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <select class="dropdown-menu" id="Position">
                                <option class="dropdown-item" value="HR">Human Resources</option>
                                <option class="dropdown-item" value="Specialist">Specialist</option>
                                <option class="dropdown-item" value="Intern">Intern</option>
                                <option class="dropdown-item" value="Manager">Manager</option>
                                <option class="dropdown-item" value="CEO">CEO</option>
                            </select>
                            <button action="php/getSalary.php">Get Salary</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="viewSalary">
                            <h2>Position: </h2><p><?= $position ?></p><br>
                            <h2>Salary: </h2><p><?= $salary ?></p><br>
                        </div>
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
