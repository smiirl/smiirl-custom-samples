<?php

require_once("../../../src/php/SmiirlLibrary.php");
$smiirlLib = new SmiirlLibraryPhp();

// get the real parameters of your counter on https://my.smiirl.com
$counterCurlUrl = "http://api.smiirl.com/YOUR_COUNTER_MAC/set-number/YOUR_COUNTER_TOKEN/54321";

list($counterMac, $counterToken) = $smiirlLib->listCurlUrlAccessParameters($counterCurlUrl);
$smiirlLib->pushNumberOnCounter($counterMac, $counterToken, "4242");

