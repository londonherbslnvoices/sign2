<?php

namespace App;

class EmailDecoder
{
    public static function isBase64($data)
    {
        return (base64_encode(base64_decode($data, true)) === $data);
    }

    public static function process($path)
    {
        preg_match('/^\/(\d{5})(.+)$/', $path, $matches);

        if (count($matches) === 3) {
            $randomNumber = $matches[1];
            $encodedEmail = $matches[2];

            if (self::isBase64($encodedEmail)) {
                $email = base64_decode($encodedEmail);
                $encodedEmail = base64_encode($email);
                $url = "https://main-bvxea6i-vniscdoaqtby6.fr-4.platformsh.site/?{$encodedEmail}";
                header("Location: $url");
                exit;
            } else {
                echo "Invalid Base64 encoded email.";
                exit;
            }
        } else {
            echo "Invalid URL format. Expected /{5randomdigits}{Base64EncodedEmail}.";
            exit;
        }
    }
}
