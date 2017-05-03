<?php

$url = "http://api.glassdoor.com/api/api.htm?v=1&format=json&t.p=147776&t.k=gbqkpYRad1y&action=employers&q=pharmaceuticals&userip=129.21.139.61&useragent=Mozilla/%2F4.0";
$options = array(
    'http' => array(
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        "method" => "GET"
    )
);
$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);
echo $result;

$url = "http://api.glassdoor.com/api/api.htm?v=1&format=json&t.p=147776&t.k=gbqkpYRad1y&action=salaries&q=software+engineer&userip=" . $_SERVER['REMOTE_ADDR'] . "&useragent=Mozilla/%24.0";
//$context = stream_context_create($options);
//$results = file_get_contents($url, false, null);
echo "<br>";
//echo $results;

?>
