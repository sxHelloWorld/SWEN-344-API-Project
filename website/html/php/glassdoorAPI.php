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

//find code to convert $results XML string to actual XML object, then can do search there
//do all printing here, combine the code from 2 pages

//make one PHP page to process user input (select 1 from option below), then another page to print results. you will not need to make a unique request every time, you will get the same XML string every time, so don't worry about that. it's like we're cheating. so just make the output look different 

?>