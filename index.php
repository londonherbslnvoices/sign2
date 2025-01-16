<?php

use App\EmailDecoder;

require __DIR__ . '/../vendor/autoload.php';

// Extract the path from the request URI
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Process the request
App\EmailDecoder::process($path);
