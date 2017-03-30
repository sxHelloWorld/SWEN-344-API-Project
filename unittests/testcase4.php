<?php

echo "<h1>Results of Unit Test #4</h1>";

if (isset($_GET['username'])) {

    // get id value
    $username = $_GET['username'];
    if (in_array($username, array("ese3633","moa1662", "jxv6445", "jtk7412"))) {
        echo "<p>PASS - " . $username . " is successfully deleted</p>"; 
    } else {
        echo "<p>FAIL - " . $username . " is not valid</p>";
    }

} else {
    echo "<p>FAIL - no username is received</p>";
}
    
 echo "<h1>END OF UNIT TEST SUITE</h1>";

?>
