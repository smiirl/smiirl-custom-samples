<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

function getMyNumber($separator = null){
    $format = 'H';
    if(isset($separator)){
        $format = $format . "\\" . $separator;
    }
    $format = $format . "i";
    return date($format);
}

// replace '0' by null if necessary
echo json_encode(array('number' => intval(getMyNumber('0'))));
