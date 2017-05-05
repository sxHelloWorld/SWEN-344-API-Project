<?php

include 'auth.php';
include 'request.php';

if($AUTH < 1) {
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

if($editUser != $user && $AUTH <= 1) {
    header("Location: ../index.php");
    die();
}

if(!(isset($_POST['fName']) && isset($_POST['lName']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['phone']))) {
    header("Location: ../editPersonal.php?msg=0" . $addString);
    die();
}

$fName = $_POST['fName'];
$lName = $_POST['lName'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$array = array("username" => $editUser, "fname" => $fName, "lname" => $lName, "email" => $email, "address" => $address, "phone" => $phone);
$data = request("human_resources", "updatePerson", $array);

if($data == 'false') {
    header("Location: ../editPersonal.php?msg=0" . $addString);
    die();
} else {
    header("Location: ../editPersonal.php?msg=1" . $addString);
    die();
}

?>