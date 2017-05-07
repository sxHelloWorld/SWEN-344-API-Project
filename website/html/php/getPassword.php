<?php

$includeUser = "";
if(!isset($_GET["user"])) {
    $editUser = $user;
} else {
    $editUser = $_GET["user"];
    $includeUser = "?user=" . $editUser;
    if($editUser != $user && $AUTH <= 2) {
        header("location: index.php");
        die();
    }
}

?>