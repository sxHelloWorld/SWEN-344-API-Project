<?php
// Functionality for cookies

// Creates new cookie with name and value
function createCookie($name, $value) {
    setcookie($name, $value, time() + 3600);
}

// Get value from cookie by name
function getCookie($name) {
    if(isset($_COOKIE[$name])) {
        return $_COOKIE[$name];
    }
    return null;
}

// Deletes cookie by its name
function deleteCookie($name) {
    setcookie($name, "", -1);
}

?>