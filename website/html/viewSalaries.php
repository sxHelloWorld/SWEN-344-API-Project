<?php

if (isset($_POST['Position'])) {

    include 'php/glassdoorAPI.php';

    $data = $result;

    $a_json = json_decode($data, true);

    if($data == 'false') {
        header("Location: index.php");
        die();
    }
    
	$role = $_POST['Position'];
	if ($role === "HR") {
        $sal = $a_json["response"]["employers"][0]["id"];
	} else if ($role === "Specialist") {
		$sal = $a_json["response"]["employers"][1]["id"];
	} else if ($role === "Intern") {
		$sal = $a_json["response"]["employers"][2]["id"];
	} else if ($role === "Manager") {
		$sal = $a_json["response"]["employers"][3]["id"];
	} else if ($role === "CEO") {
		$sal = $a_json["response"]["employers"][4]["id"];
	}
$position = $role;
$salary = $sal;
}




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
                <!-- User is logged in -->
                
                <div class="col-md-12">
                    <h2>View Salary</h2>
                </div>
            <form action="viewSalaries.php" method="post" >
                <div class="col-md-4">
                    <div class="btn-group">
                        <p>Position:</p>
                        
                        <select name="Position">
                            <option value="HR">Human Resources</option>
                            <option value="Specialist">Specialist</option>
                            <option value="Intern">Intern</option>
                            <option value="Manager">Manager</option>
                            <option value="CEO">CEO</option>
                        </select> 
                    </div>
                            
                            
                </div>
            <input type="submit" name="Submit">
            </form>
                <?php if(isset($_POST['Position'])) { ?> 
                <div class="col-md-4">
                    <div class="viewSalary">
                        <h2>Position: </h2><p style="text-align: center;"><?= $position ?></p><br>
                        <h2>Salary: </h2><p style="text-align: center;"><?= $salary ?></p><br>
                    </div>
                </div>
                <?php } ?>
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
