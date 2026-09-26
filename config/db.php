Niloy 1133
<?php

define('DB_HOST', '127.0.0.1');
define('DB_PORT', '3306');
define('DB_NAME', 'ikthibar');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

$pdo = null;
$lastException = null;
$portsToTry = [DB_PORT, '3306'];

foreach ($portsToTry as $port) {
    try {
        $pdo = new PDO(
            'mysql:host=' . DB_HOST .
            ';port=' . $port .
            ';dbname=' . DB_NAME .
            ';charset=' . DB_CHARSET,
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        );
        break;
    } catch (PDOException $ex) {
        $lastException = $ex;
    }
}

if (!$pdo) {
    http_response_code(500);

    $code = $lastException ? $lastException->getCode() : 0;

    if (!extension_loaded('pdo_mysql')) {
        $msg = 'PHP-এ PDO MySQL driver ইনস্টল/enable করা নেই। XAMPP এর php.exe ব্যবহার করুন এবং php.ini-তে pdo_mysql enable করুন.';
    } elseif ($code == 1045) {
        $msg = 'MySQL username/password ভুল। config/db.php-এর DB_USER এবং DB_PASS check করুন.';
    } elseif ($code == 1049) {
        $msg = 'Database "' . DB_NAME . '" পাওয়া যাচ্ছে না। phpMyAdmin-এ database তৈরি করুন এবং schema.sql import করুন.';
    } else {
        $msg = 'Database-এ connect হচ্ছে না। XAMPP MySQL চালু আছে কিনা, port 3307/3306 ঠিক আছে কিনা, এবং database তৈরি আছে কিনা check করুন.';
    }

    exit(
        '<h3 style="font-family:sans-serif">' .
        htmlspecialchars($msg) .
        '</h3>'
    );
}