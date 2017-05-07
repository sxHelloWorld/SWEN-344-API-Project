<?php

include 'auth.php';

if($AUTH == 0) {
    header("Location: index.php");
    die();
}

include 'request.php';

if (!(isset($_POST["newPass"]) && isset($_POST["confirmNewPass"]))) {
	header("Location: ../editPassword.php?msg=0");
	die();
}

if (empty($_POST["newPass"]) || empty($_POST["confirmNewPass"])) {
	header("Location: ../editPassword.php?msg=1");
	die();
}

if ($_POST["newPass"] != $_POST["confirmNewPass"]) {
	header("Location: ../editPassword.php?msg=2");
    die();
}

$password = $_POST['newPass'];

$array = array("username" => $user, "password" => $password);
$data = request("human_resources", "updatePassword", $array);

if($data == "false") {
    header("Location: ../editPassword.php?msg=0");
    die();
} else {
    header("Location: ../editPassword.php?msg=3");
    die();
}

?>