<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

function getMyNumber(){
    return date('Hi');
}

echo json_encode(array('number' => intval(getMyNumber())));