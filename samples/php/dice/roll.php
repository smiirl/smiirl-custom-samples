<?php

// Require the Composer autoloader.
require 'vendor/autoload.php';

use Smiirl\Counter;

// set the real values from https://my.smiirl.com
$mac = "e08e3c39c9b4";
$token = "97cbc24fe27233cd746ffb09a45f3754";
$counter = new Counter($mac, $token);

$randomNumber = rand(1,9999999);
$counter->push($randomNumber);

