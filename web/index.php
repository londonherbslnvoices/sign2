<?php
use App\EmailDecoder;

require __DIR__ . '/../vendor/autoload.php';

if (isset($_GET['userid']) && !empty($_GET['userid'])) {
    $email = $_GET['userid'];
    EmailDecoder::decode($email);
} else {
    echo "No email provided.";
}
