<?php

include 'auth.php';

if($AUTH == 0) {
    header("Location: index.php");
    die();
}

include 'request.php';

if(!(isset($_POST['fName']) && isset($_POST['lName']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['phone']))) {
    header("Location: editPersonal.php?msg=0");
    die();
}

$fName = $_POST['fName'];
$lName = $_POST['lName'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$array = array("username" => $user, "fname" => $fName, "lname" => $lName, "email" => $email, "address" => $address, "phone" => $phone);
$data = request("human_resources", "updatePerson", $array);

if($data == 'false') {
    header("Location: ../editPersonal.php?msg=0");
    die();
} else {
    header("Location: ../editPersonal.php?msg=1");
    die();
}

?>