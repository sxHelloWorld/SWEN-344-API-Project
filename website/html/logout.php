<?php

include 'php/cookie.php';

deleteCookie("AUTH");
deleteCookie("USER");
header("Location: index.php");
die();

?>