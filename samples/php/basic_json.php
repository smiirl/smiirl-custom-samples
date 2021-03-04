<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

function getMyNumber($params = []){
    //here do the real thing to get the integer value
    return 12345;
}

echo json_encode(array('number' => intval(getMyNumber())));