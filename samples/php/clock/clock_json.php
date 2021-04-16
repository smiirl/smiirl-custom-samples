<?php

require_once("../../../src/php/SmiirlLibrary.php");
$smiirlLib = new SmiirlLibraryPhp();

function getMyHour($separator = null){
    $format = 'H';
    if(isset($separator)){
        $format = $format . "\\" . $separator;
    }
    $format = $format . "i";
    return date($format);
}

$smiirlLib->jsonUrl(getMyHour(null));
