<?php
// Database connection
if (getenv('PLATFORM_RELATIONSHIPS')) {
    $relationships = json_decode(base64_decode(getenv('PLATFORM_RELATIONSHIPS')), true);

    if (isset($relationships['database'][0])) {
        $database = $relationships['database'][0];
        $dsn = sprintf(
            'mysql:host=%s;port=%d;dbname=%s',
            $database['host'],
            $database['port'],
            $database['path']
        );
        $username = $database['username'];
        $password = $database['password'];

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}

// Continue with application logic
