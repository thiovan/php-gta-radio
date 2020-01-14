<?php
$fopen = fopen("radios.mydb", "r");
$db = fread($fopen, filesize("radios.mydb"));
fclose($fopen);

$lines = explode(PHP_EOL, $db);

$path = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$response = [];
foreach($lines as $key => $line){
    $convert = explode("|", $line);
    $tempObject['id'] = (int)$convert[0];
    $tempObject['name'] = $convert[1];
    $tempObject['image'] = $path . 'image/' . $convert[2];
    $tempObject['url'] = $path . 'image/' . $convert[3];
    $tempObject['desc'] = $convert[4];
    array_push($response, $tempObject);
}

echo json_encode($response);