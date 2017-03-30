<?php

echo "<h1>Unit Test Case #4</h1><p>Click on the delete button to verify that a single user has been deleted</p>";

$usernames = array("ese3633","moa1662", "jxv6445", "jtk7412");

echo "<table border='1' cellpadding='10'>";

echo "<tr> <th>Username</th> <th>Action</th></tr>";

foreach ($usernames as $username) {
    echo "<tr>";
    echo '<td>' . $username . '</td>';
    echo '<td><a href="testcase4.php?username=' . $username . '">Delete</a></td>';
    echo "</tr>";

}

echo "</table>";

?>
