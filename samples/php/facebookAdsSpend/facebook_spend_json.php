<?php

// Require the Composer autoloader.
require 'vendor/autoload.php';

use Smiirl\Counter;

const GRAPH_API_VERSION = "10.0";

// see README for detailed setup

$myMainToken = "aVeryLongTokenFromYourFacebookAppZDZD";
$accountsAccess = [
    'xxBusinessManagerAccountId' => $myMainToken
];

$counter = new Counter();

function getTotalSpent($accountsAccess)
{
    $totalSpend = 0;
    foreach ($accountsAccess as $accountId => $accessToken) {
        $url = "https://graph.facebook.com/v" . GRAPH_API_VERSION
            . "/act_" . $accountId
            . "/insights?date_preset=this_month&limit=400&access_token="
            . $accessToken;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $resultObj = json_decode($result);
        if (is_object($resultObj)
            && property_exists($resultObj, 'data')
            && is_array($resultObj->data)
        ) {
            if (isset($resultObj->data[0])
                && property_exists($resultObj->data[0], 'spend')) {
                $accountSpend = $resultObj->data[0]->spend;
                if (is_numeric($accountSpend)) {
                    $totalSpend = $totalSpend + $accountSpend;
                }
            }
            /* else{
                 var_dump($result); die();
             }*/
        } else {
            var_dump("query failed", $result);
            die();
        }

    }
    return round($totalSpend);
}


$counter->jsonResponse(getTotalSpent($accountsAccess));



