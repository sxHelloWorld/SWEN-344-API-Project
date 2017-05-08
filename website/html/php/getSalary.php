<?php

if ($_POST('Position')) {
	$role = $_POST['Position'];
	if ($role = "HR") {
		$sal = "55,000";
	} else if ($role = "Specialist") {
		$sal = "85,000";
	} else if ($role = "Intern") {
		$sal = "35,000";
	} else if ($role = "Manager") {
		$sal = "95,000";
	} else if ($role = "CEO") {
		$sal = "350,000";
	}
}


$postion = $role;
$salary = $sal;

?>