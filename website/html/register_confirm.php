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

function getData($team, $function, $data)
{
	$url = "http://vm344f.se.rit.edu/API/API.php";
	$url .= "?team=$team&function=$function";
	$options = array(
		'http' => array(
			'header' => "Content-type: application/x-www-form-urlencoded\r\n",
			'method' => 'POST',
			'content' => http_build_query($data)
		)
	);
	$content = stream_context_create($options);
	$result = file_get_contents($url, false, $content);
	return $result;
}

        $arrayData = array("username"=> $_SESSION["username"], "password" => $_SESSION["password"], "fname" => $_SESSION["fname"], "lname"=> $_SESSION["lname"], "email"=> $_SESSION["email"], "role"=> $_SESSION["role"], "managerID"=> $_SESSION["managerID"], "title"=> $_SESSION["title"], "address"=> $_SESSION["address"], "salary"=> $_SESSION["salary"], "phone"=> $_SESSION["phone"]);
        $data = getData("human_resources", "createProf", $arrayData);
        
        header("Location: index.php");
        die();
    
?>