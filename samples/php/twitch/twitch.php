<?php

require 'vendor/autoload.php';

// change this to match your client Id, secret, and account Id
// you also should put these credentials in a safer location (for instance in some environment variables)
$clientId = 'zt6miwuoxfwv1hac663j7lhnuxtfe1';
$clientSecret = 'mk5a3sdy6deu77mfruej6cbgjotyxn';
$twitchAccountId = '631440671';

$twitch_scopes = '';
$helixGuzzleClient = new \TwitchApi\HelixGuzzleClient($clientId);
$twitchApi = new \TwitchApi\TwitchApi(
    $helixGuzzleClient,
    $clientId,
    $clientSecret
);
$oauth = $twitchApi->getOauthApi();

try {
    $token = $oauth->getAppAccessToken($twitch_scopes ?? '');
    $data = json_decode($token->getBody()->getContents());
    $twitch_access_token = $data->access_token ?? null;
    $urlToGet =
        'https://api.twitch.tv/helix/users/follows?to_id=' . $twitchAccountId;
    $ch = curl_init();
    $bearer = 'Bearer ' . $twitch_access_token;
    curl_setopt_array($ch, [
        CURLOPT_URL => $urlToGet,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => [
            "Client-Id: $clientId",
            "Authorization: $bearer",
        ],
    ]);
    $response = curl_exec($ch);
    curl_close($ch);
    $jsonObject = json_decode($response);
    if (is_object($jsonObject) && property_exists($jsonObject, 'total')) {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        echo json_encode(['number' => $jsonObject->total], JSON_FORCE_OBJECT);
    } else {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        echo json_encode(
            ['number' => 0, 'error' => 'total field was not found'],
            JSON_FORCE_OBJECT
        );
    }
} catch (Exception $e) {
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    echo json_encode(
        ['number' => 0, 'error' => $e->getMessage()],
        JSON_FORCE_OBJECT
    );
}

?>
