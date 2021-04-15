<?php

// change those lines to fit to your device (check it on my.smiirl) and data
$counterMac = 'e08e3c39c9b3';
$counterToken = '97cbc24fe27233cd746ffb09a45f3755';
$numberToShow = rand(1,9999999);

$urlPushNumber = "http://api.smiirl.com/" . $counterMac . "/set-number/" . $counterToken . "/" . $numberToShow;
$ch = curl_init($urlPushNumber);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
$resultParsed = json_decode($result);

if (is_object($resultParsed) && property_exists($resultParsed, 'status') && $resultParsed->status == 200) {
    // echo "number successfully pushed";
    return 0;
} else {
    // echo "number push failed";
    // var_dump($result);
    return -1;
}
