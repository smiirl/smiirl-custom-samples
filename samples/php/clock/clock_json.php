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

// replace null by '0' if youy want to add a '0' between hours and minutes
echo json_encode(array('number' => intval(getMyNumber(null))));
