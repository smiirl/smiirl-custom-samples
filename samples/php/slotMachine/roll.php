<?php

// Require the Composer autoloader.
require 'vendor/autoload.php';

use Smiirl\Counter;

// set the real values from https://my.smiirl.com
$mac = "e08e3c39c9b4";
if (isset($_GET['cId'])) {
    $mac = $_GET['cId'];
}
$token = "97cbc24fe27233cd746ffb09a45f3754";
if (isset($_GET['cT'])) {
    $mac = $_GET['cT'];
}
$counter = new Counter($mac, $token);
$digitNb = 7;
if (isset($_GET['counterSize'])) {
    $digitNb = (int)$_GET['counterSize'];
}
$minDigit = 0;
if (isset($_GET['minDigit'])) {
    $minDigit = (int)$_GET['minDigit'];
}
$maxDigit = 9;
if (isset($_GET['maxDigit'])) {
    $maxDigit = (int)$_GET['maxDigit'];
}
$resStr = "";
for ($i = 0; $i < $digitNb; $i++) {
    $resStr = $resStr . rand($minDigit, $maxDigit);
}
//$randomNumber = rand(1, 9999999);
$randomNumber = (int) $resStr;
$res = $counter->push($randomNumber);
$resObj = json_decode($res);
//var_dump($resObj); die();
if (property_exists($resObj, 'number')) {
    //  var_dump("in response");
    Counter::jsonResponse($resObj->number);
}

//var_dump($res);
//Counter::jsonResponse()

