<?php
// This script will execute and set variables
// $AUTH is for level of authenication user has
// $user is for username of user
// It will attempt to check for auth and user in cookies

include 'cookie.php';

if(getCookie("AUTH") !== null) {
    // Get values from cookies
    $AUTH = getCookie("AUTH");
    $user = getCookie("USER");
    // Refresh expire time
    createCookie("AUTH", $AUTH);
    createCookie("USER", $user);
} else {
    $AUTH = 0;
}

?>