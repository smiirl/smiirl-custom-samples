<?php

/*
Usage url examples:
https://adrien-v.com/smiirl/custom-api-samples/samples/php/countdown_json.php?example=hoursBeforeNewYearsEve

*/

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

/**
 * @param $difference
 * @param $unit
 * @return float|int
 */

function getRemaining($difference, $unit)
{
    switch ($unit) {
        case 'year':
            return $difference / (60 * 60 * 24 * 365.25);
        case 'week':
            return $difference / (60 * 60 * 24 * 7);
        case 'day':
            return $difference / (60 * 60 * 24);
        case 'hour':
            return $difference / (60 * 60);
        case 'minute':
            return $difference / 60;
        case 'second':
            return $difference;
        default:
            return $difference / (60 * 60);
    }
}

/**
 * @param string $exampleId
 * @return array
 */
function getExemple($exampleId = 'hoursBeforeNewYearsEve')
{
    switch ($exampleId) {
        case 'daysUntilLaunch':
            $targetTime = DateTime::createFromFormat('d-m-Y H:i:s', '24-12-2042 00:00:00')->getTimestamp();
            $unit = 'day';
            break;
        case 'MinutesToMidnight':
            $targetTime = strtotime('last day of december this year');
            $unit = 'minute';
            break;
        case 'hoursBeforeNewYearsEve':
        default:
            $targetTime = strtotime('last day of december this year');
            $unit = 'hour';
            break;
    }
    return [$targetTime, $unit];
}

/**
 * @param $params
 * @return float
 */
function getMyNumber($params)
{
    if (isset($params['example'])) {
        list($targetTime, $unit) = getExemple($params['example']);
    } else {
        if (isset($params['timeStr'])) {

            $targetTime = strtotime($params['timeStr']);
        } else {
            if (isset($params['dateTime'])) {
                $targetTime = DateTime::createFromFormat('d-m-Y H:i:s', $params['dateTime'])->getTimestamp();
            } else {
                $targetTime = strtotime('last day of december this year');
            }
        }
        if (isset($params['unit'])) {
            $unit = $params['unit'];
        } else {
            $unit = 'hour';
        }
    }
    $todayTime = time();
    $difference = $targetTime - $todayTime;
    if ($difference < 0) {
        $difference = 0;
    }
    return floor(getRemaining($difference, $unit));
}

/* param examples */
// $get = ['example'=>'MinutesToMidnight'];
// $get = ['timeStr'=>'last day of december this year', 'unit'=>'minute'];
// $get = ['dateTime'=>'24-12-2042 00:00:00', 'unit'=>'week'];
// echo json_encode(array('number' => intval(getMyNumber($get))));

echo json_encode(array('number' => intval(getMyNumber($_GET))));