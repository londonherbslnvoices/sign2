<?php

use App\EmailDecoder;

require __DIR__ . '/../vendor/autoload.php';

// Extract the path from the URL (excluding the query string)
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Remove leading slash
$input = ltrim($path, '/');

// Process the input
if (!empty($input)) {
    App\EmailDecoder::process($input);
} else {
    echo "No data provided.";
}
