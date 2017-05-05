<?php 

session_start();
$_SESSION["username"] = $_POST["username"];
$_SESSION["password"] = $_POST["password"];
$_SESSION["fname"] = $_POST["fname"];
$_SESSION["lname"] = $_POST["lname"];
$_SESSION["email"] = $_POST["email"];
$_SESSION["role"] = $_POST["role"];
$_SESSION["managerID"] = $_POST["managerID"];
$_SESSION["title"] = $_POST["title"];
$_SESSION["address"] = $_POST["address"];
$_SESSION["salary"] = $_POST["salary"];
$_SESSION["phone"] = $_POST["phone"];

include 'php/request.php';
include 'php/auth.php';

if($AUTH < 3) {
	header("Location: index.php");
	die();
} else {
	$arrayData = array("username"=> $_SESSION["username"], "password" => $_SESSION["password"], "fname" => $_SESSION["fname"], "lname"=> $_SESSION["lname"], "email"=> $_SESSION["email"], "role"=> $_SESSION["role"], "managerID"=> $_SESSION["managerID"], "title"=> $_SESSION["title"], "address"=> $_SESSION["address"], "salary"=> $_SESSION["salary"], "phone"=> $_SESSION["phone"]);
	$data = getData("human_resources", "createProf", $arrayData);

	header("Location: index.php");
	die();
}

?>