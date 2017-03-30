<?php

 $position = $_POST["position"];
 $salary = $_POST["salary"];

echo "<h1>Results of Unit Test #3</h1>";

echo (strcmp($position, "2") == 0) ? "PASS - position chagned from 2 to 0" : "FAIL - position did not change from 2 to 0";
echo "</p>";

echo (strcmp($salary, "30000") == 0) ? "PASS - salary changed from 60000 to 30000" : "FAIL - salary did not change from 60000 to 30000";
echo "</p>";

 echo "<h1><a href=\"terminate.php\">Proceed to Unit Test #4</a></h1>";

?>
