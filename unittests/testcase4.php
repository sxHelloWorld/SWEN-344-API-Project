<?php include("class_lib.php"); 
?>

<?php session_start(); ?>

<?php

  $username = $_GET['username'];
  $employees = $_SESSION['employees'];
  $orig_size = sizeof($employees->get_arr());
  $employees->remove_employee($username);
  $new_size = sizeof($employees->get_arr());
  $_SESSION["employees"] = $employees;

echo "<h1>Results of Unit Test #4</h1>";

/*
Test case as to whether the selected Employee has been deleted
*/
    if ( strcmp($orig_size, $new_size) != 0 ) {
        echo "<p>PASS - " . $username . " is successfully deleted</p>"; 
    } else {
        echo "<p>FAIL - " . $username . " is not valid</p>";
    }
    
 echo "<h1>END OF UNIT TEST SUITE</h1>";

?>

<?php 
$employees = $_SESSION['employees'];
$employees->echo_results();

echo "<table border='1' cellpadding='10'>";

echo "<tr> <th>Username</th> <th>First Name</th> <th>Last Name</th> <th>Position</th> <th>Salary</th> <th>Action</th></tr>";

/*
For purpose of updating table, display new results
*/
$arr = $employees->get_arr();
foreach ($arr as $employee) {
    echo "<tr>";
    echo '<td>' . $employee->get_username() . '</td>';
    echo '<td>' . $employee->get_fname() . '</td>';
    echo '<td>' . $employee->get_lname() . '</td>';
    echo '<td>' . $employee->get_position() . '</td>';
    echo '<td>' . $employee->get_salary() . '</td>';
    echo '<td><a href="testcase4.php?username=' . $employee->get_username() . '">Delete</a></td>';
    echo "</tr>";

}

echo "</table>";

?>

