<?php

// Require the Composer autoloader.
require "vendor/autoload.php";

use Smiirl\Counter;

function getMyNumber($params = [])
{
    $asset = "bitcoin";
    if (isset($params["asset"])) {
        $asset = $params["asset"];
    }
    $currency = "usd";
    if (isset($params["currency"])) {
        $currency = $params["currency"];
    }
    $getUrl = "https://api.coingecko.com/api/v3/simple/price?ids=" . $asset . "&vs_currencies=" . $currency;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $getUrl);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    $api_response = curl_exec($ch);
    curl_close($ch);
    $api_response_obj = json_decode($api_response);
    return $api_response_obj->$asset->$currency;
}

$counter = new Counter();
$counter->jsonResponse(getMyNumber($_GET));
