<?php include("class_lib.php"); ?>

<?php session_start(); ?>

<?php

 $firstName = $_POST["fName"];
 $lastName = $_POST["lName"];

echo "<h1>Results of Unit Test #2</h1>";

$employee = $_SESSION['employee'];

/*
Stores original first and last names for comparison
*/
$origFirstName = $employee->get_fname();
$origLastName = $employee->get_lname();

$employee->set_personal_info($firstName, $lastName);
$employees = $_SESSION[employees];
$_SESSION['employees']->pop();
$employees->add_employee($employee);
$_SESSION['employees'] = $employees;

/*
Unit tests as to whether name has been updated to "John Doe"
*/
echo (strcmp($firstName, "John") == 0) ? "PASS - fname changed from " . $origFirstName . " to John " : "FAIL - fname did not change to John";
echo "</p>";

echo (strcmp($lastName, "Doe") == 0) ? "PASS - lname changed from " . $origLastName . " to Doe ": "FAIL - lname did not change to Doe";
echo "</p>";

 echo "<h1><a href=\"updateProfInfo.php\">Proceed to Unit Test #3</a></h1>";

?>
