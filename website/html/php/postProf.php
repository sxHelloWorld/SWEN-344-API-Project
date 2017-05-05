<?php

include 'auth.php';
include 'request.php';

if($AUTH < 3) {
    header("Location: ../index.php");
    die();
}

$addString = "";
if(isset($_GET['user'])) {
    $editUser = $_GET['user'];
    if($editUser != $user) {
        $addString = "&user=" . $editUser;
    }
} else {
    $editUser = $user;
}


if(!(isset($_POST['salary']) && isset($_POST['position']))) {
    header("Location: ../editProfessional.php?msg=0" . $addString);
    die();
}

$array = array('username' => $editUser);
$data = request("human_resources", "getPersonalInfo", $array);

if($data == 'false') {
    header("Location: ../index.php");
    die();
}

$personInfo = json_decode($data, true);

$id = $personInfo['ID'];
$salary = $_POST['salary'];
$position = $_POST['position'];

$array = array("id" => $id, "salary" => $salary, "title" => $position);
$data = request("human_resources", "updateProf", $array);


if($data == 'false') {
    header("Location: ../editProfessional.php?msg=0" . $addString);
    die();
} else {
    header("Location: ../editProfessional.php?msg=1" . $addString);
    die();
}

?>