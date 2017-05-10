<?php

// Get employees data and insert into table (HTML format)

include 'request.php';

if($AUTH < 2) {
    header("Location: ../index.php");
    die();
}

$data = request("human_resources", "getAllEmployees", array());

$msg = "";
if($data == 'false') {
    $msg = "failed to get data";
} else {
    $databaseUser = request("general", "getUsers", array());
    $jsonDatabase = json_decode($databaseUser, true);
    $jsonData = json_decode($data, true);
    foreach($jsonData as $key => $value) {
        $userID = $value['USER_ID'];
        for($i = 0; $i < count($jsonDatabase); $i++) {
            if($jsonDatabase[$i]['ID'] == $userID) {
                $newJson = $jsonDatabase[$i];
            }
        }
        $username = $newJson['USERNAME'];
        $fName = $newJson['FIRSTNAME'];
        $lName = $newJson['LASTNAME'];
        $userURL = "?user=" . $username;
        ?>
        <tr>
            <td><?= $userID ?></td>
            <td><?= $username ?></td>
            <td><?= $fName . " " . $lName ?></td>
            <td><a href="viewProfile.php<?= $userURL ?>" role="button" class="btn btn-default">View</a></td>
        </tr>
        <?php
    }
}

?>