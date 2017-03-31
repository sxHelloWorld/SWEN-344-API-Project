<?php 
 session_start();
?>

<?php include("class_lib.php"); ?>

<?php

$employees = new employee_collection();

$an_employee = new employee("moo2", "lol", "baa", "sa", "3000", "2");
$employees->add_employee($an_employee);

 $username = $_POST["user"];
 $password = $_POST["password"];
 $firstName = $_POST["fName"];
 $lastName = $_POST["lName"];
 $position = $_POST["position"];
 $salary = $_POST["salary"];

echo "<h1>Results of Unit Test #1</h1>";

$new_employee = new employee($username, $password, $firstName, $lastName, $salary, $position);

echo "<p>" . (strcmp($username, "ese3633") == 0) ? "PASS - username is ese3633" : "FAIL - username not ese3633";
echo "</p>";

echo (strcmp($password, "lala") == 0) ? "PASS - password is lala" : "FAIL - password not lala";
echo "</p>";

echo (strcmp($firstName, "Eric") == 0) ? "PASS - fname is Eric" : "FAIL - fname not Eric";
echo "</p>";

echo (strcmp($lastName, "Epstein") == 0) ? "PASS - lname is Epstein" : "FAIL - lname not Epstein";
echo "</p>";

echo (strcmp($position, "2") == 0) ? "PASS - position is 2" : "FAIL - position not 2";
echo "</p>";

echo (strcmp($salary, "60000") == 0) ? "PASS - salary is 60000" : "FAIL - salary not 6000";
echo "</p>";

echo "<p>New employee created and added to stack:</p>";
$employees->add_employee($new_employee);
$employees->echo_results();
$_SESSION['employees'] = $employees;

//echo strcmp($username, "lala");
echo "<h1><a href=\"updatePersonalInfo.php\">Proceed to Unit Test #2</a></h1>";


?>
