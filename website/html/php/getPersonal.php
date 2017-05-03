<?php

include 'request.php';

$array = array('username' => $user);
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


?>