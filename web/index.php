<?php

use App\EmailDecoder;

require __DIR__ . '/../vendor/autoload.php';

// Get the current request URI path
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Pass the path to the EmailDecoder
EmailDecoder::process($path);
