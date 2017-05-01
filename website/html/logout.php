<?php

include 'php/cookie.php';

deleteCookie("AUTH");
header("Location: index.php");
die();

?>