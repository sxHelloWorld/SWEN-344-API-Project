<?php include("class_lib.php"); ?>

<?php session_start(); ?>

<?php 
$employees = $_SESSION['employees'];
$employees->echo_results();


echo "<h1>Unit Test Case #4</h1><p>Click on the delete button to verify that a single user has been deleted</p>";

echo "<table border='1' cellpadding='10'>";

echo "<tr> <th>Username</th> <th>First Name</th> <th>Last Name</th> <th>Position</th> <th>Salary</th> <th>Action</th></tr>";


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
