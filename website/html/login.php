<?php
// Attempt to login with username and password then redirect
// user to index.php when this script is processed

include 'php/request.php';
include 'php/cookie.php';

// Check if there is username with password in the general database
$user = $_POST["user"];
$pass = $_POST["password"];
// Pack data into POST form and pass to request
$array = array('username' => $user, 'password' => $pass);
// Get result from API
$result = request("general", "login", $array);


if($result == 'false') {
    header("Location: index.php");
    die();
}

// Next is to get Title from Human Resources database if user exists in the database

// decode the string from SQL query json to array
$data = json_decode($result,true);

// Pack and send request to API again
$userID = $data["ID"];
$array = array('id' => $userID);
$result = request("human_resources", "getProfInfo", $array);

// Check if user exist or not then set variable
if($result != 'false') {
    $dataHR = json_decode($result, true);
    $userRole = $dataHR['TITLE'];
} else {
    $userRole = "None";
}

switch($userRole) {
    case "Employee":
        createCookie("AUTH", 1);
        createCookie("USER", $user);
        break;
    case "Admin":
        createCookie("AUTH", 3);
        createCookie("USER", $user);
        break;
    case "Manager":
        createCookie("AUTH", 2);
        createCookie("USER", $user);
        break;
    default:
        // By default, the user doesn't exist in our database and prevent login occurs
        deleteCookie("AUTH");
        deleteCookie("USER", $user);
        break;
}

// Redirect user to main page
header("Location: index.php");
die();

?>