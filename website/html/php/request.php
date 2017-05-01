<?php

function request($team, $function, $data) {
    $url = "http://vm344f.se.rit.edu/API/API.php" . "?team=" . $team . "&function=" . $function;
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return $result;
}

?>