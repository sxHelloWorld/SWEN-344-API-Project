<?php

// Checks for auth level and user is in general database and HR database
// then terminate the user

include 'php/auth.php';
include 'php/request.php';

if($AUTH < 3) {
    header("Location: index.php");
    die();
}

if(!isset($_GET['user'])) {
    header("Location: index.php");
    die();
}
$editUser = $_GET['user'];

$result = request("general", "getUsers", array());

if($result == 'false') {
    header("Location: index.php");
    die();
}

$data = json_decode($result, true);
$id = -1;
for($i = 0; $i < count($data); $i++) {
    if($data[$i]['USERNAME'] == $editUser) {
        $id = $data[$i]['ID'];
        break;
    }
}
if($id == -1) {
    header("Location: index.php");
    die();
}

$array = array('id' => $id);
$result = request("human_resources", "getProfInfo", $array);

if($result == 'false') {
    header("Location: index.php");
    die();
}

request("human_resources", "removeEmployee", $array);

if($editUser == $user) {
    deleteCookie("AUTH");
    deleteCookie("USER");
}
header("Location: index.php");
die();

?>