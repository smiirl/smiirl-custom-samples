<?php

// Require the Composer autoloader.
require 'vendor/autoload.php';

use Smiirl\Counter;

require_once "CalendarTool.php";


    function getMyNumber($params)
    {
        $cal = new CalendarTool();
        $todayTime = time();
        //$todayTime = DateTime::createFromFormat('Y-m-d H:i:s', '2021-07-05 13:42:00')->getTimestamp();
        $todayDateTime =  new DateTime();
        $todayDateTime->setTimestamp($todayTime);
        $targetTime = DateTime::createFromFormat('Y-m-d H:i:s',
            '2021-07-06 16:42:00')->getTimestamp();
        $targetDateTime = new DateTime();
        $targetDateTime->setTimestamp($targetTime);
        $difference = $targetTime - $todayTime;
        if ($difference < 0) {
            return 0;
        }
        $totalDays = ceil($cal->getRemaining($difference, 'day'));
        $schoolDays = 0;
        $tmpTime = $todayTime;
        for ($i = 0; $i <= ($totalDays); $i++) {
            $tmpDateTime = new DateTime();
            $tmpDateTime->setTimestamp($tmpTime);
            $isSchoolDay = $cal->isSchoolDay($tmpDateTime);
            if ($isSchoolDay && $tmpDateTime < $targetDateTime) {
                $schoolDays++;
            }
            $tmpTime = $tmpTime + (60 * 60 * 24);
        }
        return $schoolDays;
    }


$counter = new Counter();
$counter->jsonResponse(getMyNumber($_GET));
