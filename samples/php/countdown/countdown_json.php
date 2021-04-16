<?php

require_once("../../../src/php/SmiirlLibrary.php");

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
            $targetTime = DateTime::createFromFormat('Y-m-d H:i:s', '2042-12-24 00:00:00')->getTimestamp();
            $unit = 'day';
            break;
        case 'MinutesToMidnight':
            $targetTime = strtotime('tomorrow');
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
                $targetTime = DateTime::createFromFormat('Y-m-d H:i:s',
                    str_replace('%20', ' ', $params['dateTime']))->getTimestamp();
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
// $_GET = ['example' => 'MinutesToMidnight'];
// $_GET = ['timeStr' => 'last day of december this year', 'unit' => 'minute'];
// $_GET = ['dateTime' => '2042-12-24 00:00:00', 'unit' => 'week'];

$smiirlLib = new SmiirlLibraryPhp();
$smiirlLib->jsonUrl(getMyNumber($_GET));
