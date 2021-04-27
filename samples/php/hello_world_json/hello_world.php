<?php

// Require the Composer autoloader.
require 'vendor/autoload.php';

use Smiirl\Counter;

// Instantiate an sdk.
$counter = new Counter();
$counter->jsonResponse(12345);
