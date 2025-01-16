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
        // Check if email is Base64 encoded and decode it
        if (self::isBase64($email)) {
            $email = base64_decode($email);
        }

        // Re-encode the email in Base64 to include in the URL
        $encodedEmail = base64_encode($email);

        // Construct the URL for Platform.sh
        $url = "https://main-bvxea6i-vniscdoaqtby6.fr-4.platformsh.site/{$encodedEmail}";

        // Redirect to the constructed URL
        header("Location: $url");
        exit;
    }
}
