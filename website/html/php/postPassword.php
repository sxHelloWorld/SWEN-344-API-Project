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

if (!(isset($_POST["newPass"]) && isset($_POST["confirmNewPass"]))) {
	header("Location: ../editPassword.php?msg=0" . $addString);
	die();
}

if (empty($_POST["newPass"]) || empty($_POST["confirmNewPass"])) {
	header("Location: ../editPassword.php?msg=1" . $addString);
	die();
}

if ($_POST["newPass"] != $_POST["confirmNewPass"]) {
	header("Location: ../editPassword.php?msg=2" . $addString);
    die();
}

$password = $_POST['newPass'];

$array = array("username" => $editUser, "password" => $password);
$data = request("human_resources", "updatePassword", $array);

if($data == "false") {
    header("Location: ../editPassword.php?msg=0" . $addString);
    die();
} else {
    header("Location: ../editPassword.php?msg=3" . $addString);
    die();
}

?>