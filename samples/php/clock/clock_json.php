<?php

// Require the Composer autoloader.
require 'vendor/autoload.php';

use Smiirl\Counter;

function getMyHour($separator = null){
    $format = 'H';
    if(isset($separator)){
        $format = $format . "\\" . $separator;
    }
    $format = $format . "i";
    return date($format);
}

$counter = new Counter();
$counter->jsonResponse(getMyHour(null));



