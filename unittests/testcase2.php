<?php

 $firstName = $_POST["fName"];
 $lastName = $_POST["lName"];

echo "<h1>Results of Unit Test #2</h1>";

echo (strcmp($firstName, "Erik") == 0) ? "PASS - fname changed from Eric to Erik" : "FAIL - fname did not change from Eric to Erik";
echo "</p>";

echo (strcmp($lastName, "Lars") == 0) ? "PASS - lname changed from Epstein to Lars" : "FAIL - lname did not change from Epstein to lars";
echo "</p>";

 echo "<h1><a href=\"updateProfInfo.php\">Proceed to Unit Test #3</a></h1>";

?>
