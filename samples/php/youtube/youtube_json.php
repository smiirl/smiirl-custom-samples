<?php

// change this to match your channel and api key
// you also should put these credentials in a safer location (for instance in some environment variables)
//$channelId = "UCKHzE6XF__put_your_real_channel_id";
//$apiKey = "AIzaSyDod3x-Rxx21cbQMvuWoput_your_real_api_key";

$urlToGet = "https://www.googleapis.com/youtube/v3/channels?id=" . $channelId . "&key=" . $apiKey . "&part=statistics";
$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $urlToGet,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET"
]);
$response = curl_exec($ch);
curl_close($ch);
$jsonS = json_decode($response);
$subscribers = $jsonS->items[0]->statistics->subscriberCount;
$data2 = $jsonS->items[0]->statistics->viewCount;
$result = ['number' => $subscribers, 'subscribers' => $subscribers, 'views' => $data2];

echo json_encode($result, JSON_FORCE_OBJECT);

?>