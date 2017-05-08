<?php
include 'glassdoorAPI.php';

$data = $result;

if($data == 'false') {
    header("Location: index.php");
    die();
}


$employeeP = "employee";
$managerP = "manager";

?>