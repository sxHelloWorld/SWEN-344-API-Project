<?php

// Load all data for profile viewing

include 'request.php';

$includeUser = "";

if(!isset($_GET["user"])) {
    $editUser = $user;
} else {
    $editUser = $_GET["user"];
    $includeUser = "?user=" . $editUser;
}

$array = array('username' => $editUser);
$data = request("human_resources", "getPersonalInfo", $array);

if($data == 'false') {
    header("Location: index.php");
    die();
}

$personInfo = json_decode($data, true);

$array2 = array('id' => $personInfo['ID']);
$data2 = request("human_resources", "getProfInfo", $array2);

if($data2 == 'false') {
    header("Location: index.php");
    die();
}

$profInfo = json_decode($data2, true);

$fName = $personInfo['FIRSTNAME'];
$lName = $personInfo['LASTNAME'];
$address = $profInfo['ADDRESS'];
$email = $personInfo['EMAIL'];
$phone = $profInfo['PHONE'];
$position = $profInfo['TITLE'];
$salary = $profInfo['SALARY'];


?>