<?php

// change those lines to fit to your device (check it on https://my.smiirl.com) and your data
$counterMac = 'e08e3c37e387';
$counterToken = 'cb8822a2b6ef2b1391aa1ba55c08c5b2';
$numberToShow = 12345;

$urlPushNumber = "http://api.smiirl.com/" . $counterMac . "/set-number/" . $counterToken . "/" . $numberToShow;
$ch = curl_init($urlPushNumber);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
$resultParsed = json_decode($result);

if (is_object($resultParsed) && property_exists($resultParsed, 'status') && $resultParsed->status == 200) {
    //echo "number successfully pushed";
    return 0;
} else {
    //echo "number push failed";
    //var_dump($result);
    return -1;
}
