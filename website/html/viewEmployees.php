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
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
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
                <?php if($AUTH > 1) { ?>
                <!-- User is logged in -->
                
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Name of Employee</th>
                        <th>Profile</th>
                    </tr>
                    <?php include 'php/getEmployees.php'; ?>
                    <!--<tr>
                        <td>1</td>
                        <td>a</td>
                        <td>Maria Anders</td>
                        <td><button type="button" >Employee's Profile</button></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>a</td>
                        <td>Francisco Chang</td>
                        <td><button type="button" >Employee's Profile</button></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>a</td>
                        <td>Roland Mendel</td>
                        <td><button type="button">Employee's Profile</button></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>a</td>
                        <td>Helen Bennett</td>
                        <td><button type="button">Employee's Profile</button></td>
                    </tr>-->
                </table>
                <?php } else { ?>
                <!-- User is not logged in -->
                <?php header("Location: index.php"); die(); ?>
                <?php } ?>
            </div>
        </div>

        <footer>
            <p>Human Resources 2017</p>
        </footer>
    </body>
</html>
