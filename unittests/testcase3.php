<?php include("class_lib.php"); ?>

<?php session_start(); ?>

<?php

 $position = $_POST["position"];
 $salary = $_POST["salary"];

 $employee = $_SESSION['employee'];

echo "<h1>Results of Unit Test #3</h1>";

echo (strcmp($position, "0") == 0) ? "PASS - position changed from " . $employee->get_position() . "to 0" : "FAIL - position did not change to 0";
echo "</p>";

echo (strcmp($salary, "30000") == 0) ? "PASS - salary changed from " . $employee->get_salary() . " to 30000" : "FAIL - salary did not change to 30000";
echo "</p>";

 echo "<h1><a href=\"terminate.php\">Proceed to Unit Test #4</a></h1>";

 $employee->set_prof_info($position, $salary);
 $_SESSION['employees']->pop();
 $_SESSION['employees']->add_employee($_SESSION['employee']);

?>
