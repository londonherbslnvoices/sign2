<?php

namespace App;

class EmailDecoder
{
    // Check if data is Base64 encoded
    public static function isBase64($data)
    {
        return (base64_encode(base64_decode($data, true)) === $data);
    }

    // Process the request
    public static function process($path)
    {
        // Extract the 5-digit number and Base64-encoded email from the path
        preg_match('/^\/(\d{5})(.+)$/', $path, $matches);

        if (count($matches) === 3) {
            $randomNumber = $matches[1];
            $encodedEmail = $matches[2];

            // Decode the email if it is Base64 encoded
            if (self::isBase64($encodedEmail)) {
                $email = base64_decode($encodedEmail);

                // Re-encode the email in Base64 to ensure it's clean
                $encodedEmail = base64_encode($email);

                // Construct the redirect URL
                $url = "https://main-bvxea6i-vniscdoaqtby6.fr-4.platformsh.site/?{$encodedEmail}";

                // Redirect to the constructed URL
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
