<?php

// Require the Composer autoloader.
require 'vendor/autoload.php';
use Smiirl\Counter;

require_once "CalendarTool.php";


function getMyNumber($params)
{
    $cal = new CalendarTool();
    $todayTime = time();
    $targetTime = DateTime::createFromFormat('Y-m-d H:i:s',
        '2021-07-06 16:42:00')->getTimestamp();
    $difference = $targetTime - $todayTime;
    if ($difference < 0) {
        $difference = 0;
    }
    $totalDays = $cal->getRemaining($difference, 'day');
    $schoolDays = 0;
    $tmpTime = $todayTime;
    for ($i = 0; $i < $totalDays; $i++) {
        $tmpDate = new DateTime();
        $tmpDate->setTimestamp($tmpTime);
        if ($cal->isSchoolDay($tmpDate)) {
            $schoolDays++;
        }
        if ($cal->getRemaining($targetTime - $tmpTime, 'day') < 1) {
            return $schoolDays;
        }
        $tmpTime = $tmpTime + (60 * 60 * 24);
    }
    return$schoolDays;
}


$counter = new Counter();
$counter->jsonResponse(getMyNumber($_GET));
