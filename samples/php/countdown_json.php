<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

function getRemaining($difference, $unit)
{
    switch ($unit) {
        case 'week':
            return $difference / 60 / 60 / 24 / 7;
        case 'day':
            return $difference / 60 / 60 / 24;
        case 'hour':
            return $difference / 60 / 60;
        case 'minute':
            return $difference / 60;
        case 'second':
            return $difference;
        default:
            return $difference / 60 / 60 / 24;
    }
}

function getMyNumber($unit = 'day')
{
    // days left until new year
    $targetTime = strtotime('last day of december this year');
    $unit = 'day';

    // todo more cases (known lauch date in hours)

    $todayTime = time();
    $difference = $targetTime - $todayTime;
    if ($difference < 0) {
        $difference = 0;
    }
    return floor(getRemaining($difference, $unit));
}

echo json_encode(array('number' => intval(getMyNumber())));