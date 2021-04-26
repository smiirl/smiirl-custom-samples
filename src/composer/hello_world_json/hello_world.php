<?php

// Require the Composer autoloader.
require 'vendor/autoload.php';

use Smiirl\SmiirlSdkPhp;

// Instantiate an sdk.
$smiirlSdk = new SmiirlSdkPhp();
$smiirlSdk->jsonUrl(12345);
